<?php
namespace App;
use \Smarty;

Class Kernel{

	static private $url="";
	static private $title="Application";
	static private $autocommit=0;
	static private $database;
	static private $smarty;
	static private $connexion="mysql:host=localhost;dbname=wargame;charset=utf8";
	static private $dbUser="root";
	static private $dbPassword="";

	public function __construct() {
	}

	public function getTitle() {
		return self::$title;
	}

	public function setTitle($title) {
		self::$title=$title;
		return self::$title;
	}

	public function getUrl() {
		return self::$url;
	}

	public function setUrl($url) {
		self::$url=$url;
		return $this;
	}

	static public function getDatabase() {
		if ( self::$database === null || get_class(self::$database) != "PDO" ) {
			self::$database = new \PDO(self::$connexion,self::$dbUser,self::$dbPassword);
			self::$database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			// Démarrage d'une transaction si demandée par la route (ou par défaut)
			if ( self::$autocommit == 0 ) $status=self::$database->beginTransaction();
		}
		return self::$database;
	}

	static public function flushDatabase() {
		if ( self::$database === null ) {
			throw new \Exception ("Aucune connexion n'est active !");
		}
		if (self::$autocommit==1) return true;
		self::$database->commit();
		self::$database->beginTransaction();
		return true;
	}

	static public function rollbackDatabase() {
		if ( self::$database === null || get_class(self::$database) != "PDO" ) {
			throw new \Exception ("Aucune connexion n'est active !");
		}
		if (self::autocommit==1) return true;
		self::$database->rollback();
		self::$database->beginTransaction();
		return true;
	}

	static function autoload($class){
		if ( substr($class,0,4) == "App\\" ) {
			$directory=str_replace(__NAMESPACE__.'\\','',$class);
			$tabStr=explode("\\",$class);
			$classStr=end($tabStr);
			$directory=strtolower(str_replace($classStr,'',$directory));
			if ( file_exists(__DIR__."\\".$directory.$classStr.".php") )
				require (__DIR__."\\".$directory.$classStr.".php");
			else throw new \Exception('Impossible de charger la classe:'.$class);
		}
	}

	static function router(){

		// Sélection de la route par les variables GET controller, action et id
		// Rewritin effectué par .htaccess
		$controllerParam="home";
		$actionParam="default";
		$idParam=0;
		if ( isset( $_GET['controller'] ) )
		{
			$controllerParam=strtolower($_GET['controller']);
			if ( isset( $_GET['action'] ) ) {
				$actionParam=strtolower($_GET['action']);
				if ( isset( $_GET['id'] ) ) $idParam=intval($_GET['id']);
			}
		}

		//Conservation de l'url courante et titre par défaut
		self::$url=$controllerParam."/".$actionParam;
		self::$title="Application";

		//On référence la fonction autoload de la classe pour l'autoloading App
		spl_autoload_register(__CLASS__."::autoload");

		//Tamporisation de l'affichage
		ob_start();

		//par défaut un Traitement utilise la base dans le cadre d'une transaction
		//qu'il faudra valider par la fonction flushDatabase de la classe
		self::$autocommit=0;

		//Appel du controller désigné par l'Url
				switch ( self::$url ) {
					case "form/default":
						//Ce traitement de fait pas de mise à jour, inutile de traiter
						//une transaction, on passe en autocommit
						self::$autocommit=1;
						$controllerCall = new Controllers\Form();
						$controllerCall->defaultAction();
						break;
					case "home/default":
						self::$autocommit=1;
						$controllerCall = new Controllers\Home();
						$controllerCall->defaultAction();
						break;
					case "player/default":
						self::$autocommit=1;
						$controllerCall = new Controllers\Player();
						$controllerCall->defaultAction();
						break;
					case "player/create":
						self::$autocommit=1;
						$controllerCall = new Controllers\Player();
						$controllerCall->createAction($idParam);
						break;
					case "player/save":
						$controllerCall = new Controllers\Player();
						$controllerCall->setParameters($_POST);
						$controllerCall->saveAction();
						break;
					case "player/delete":
						$controllerCall = new Controllers\Player();
						$controllerCall->deleteAction($idParam);
						break;
					case "player/list":
						self::$autocommit=1;
						$controllerCall = new Controllers\Player();
						$controllerCall->listAllAction();
						break;
					case "player/show":
						self::$autocommit=1;
						$controllerCall = new Controllers\Player();
						$controllerCall->showAction($idParam);
						break;
					case "game/default":
						self::$autocommit=1;
						$controllerCall = new Controllers\Game();
						$controllerCall->defaultAction();
						break;
					case "game/create":
						$controllerCall = new Controllers\Game();
						$controllerCall->createAction($idParam);
						break;
					case "game/save":
						$controllerCall = new Controllers\Game();
						$controllerCall->setParameters($_POST);
						$controllerCall->saveAction();
						break;
					case "game/delete":
						$controllerCall = new Controllers\Game();
						$controllerCall->deleteAction($idParam);
						break;
					case "game/list":
						self::$autocommit=1;
						$controllerCall = new Controllers\Game();
						$controllerCall->listAllAction();
						break;
					case "game/json":
						self::$autocommit=1;
						self::$url="json";
						$controllerCall = new Controllers\Game();
						$controllerCall->listAllJsonAction();
						break;
					case "game/show":
						self::$autocommit=1;
						$controllerCall = new Controllers\Game();
						$controllerCall->showAction($idParam);
						break;
					case "grille/default":
						self::$autocommit=1;
						$controllerCall = new Controllers\Grille();
						$controllerCall->defaultAction();
						break;
					default:
						self::$autocommit=1;
						$controllerCall = new Controllers\Home();
						$controllerCall->defaultAction();
						break;
				}
			}

	static function viewer($view,$variables=array()){
			extract($variables);
			// foreach ( $variables as $key=>$element) {
				// ${$key}=$element;
			// }
			// var_dump($games);
			if ( file_exists(__DIR__."\\views\\".strtolower($view)) ) {
				require __DIR__."\\views\\".strtolower($view);
			} else throw new \Exception
			("Désolé, La vue $view n'existe pas");
	}

	static function viewerSmarty($title,$view,$variables=array()){
			self::$title=$title;
			$smarty=new Smarty();
			$smarty->template_dir=__DIR__."\\templates\\";
			$smarty->compile_dir=SMARTY_DIR."compile";
			$smarty->config_dir=SMARTY_DIR."config";
			$smarty->cache_dir=SMARTY_DIR."cache";
			foreach ( $variables as $key=>$element) {
				$smarty->assign($key,$element);
			}
			$smarty->display($view);
			$content=ob_get_clean();
			require("../app/views/base.php");
	}

}
