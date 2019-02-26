<?php
namespace App;
use \Smarty;

Class Kernel{

	static private $url="";
	static private $autocommit="";
	static private $database;
	static private $smarty;
	static private $connexion="mysql:host=localhost;dbname=wargame;charset=utf8";
	static private $dbUser="root";
	static private $dbPassword="";

	public function __construct() {
	}

	public function getUrl() {
		return self::$url;
	}

	public function setUrl($url) {
		self::$url=$url;
		return $this;
	}

	static public function getDatabase() {
		if ( self::$database == null ) {
			self::$database = new \PDO(self::$connexion,self::$dbUser,self::$dbPassword);
			if (self::$autocommit == 0){
				self::$database=>beginTransaction();
			};
			self::$database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}
		return self::$database;
	}

	static function autoload($class){
		$directory=str_replace(__NAMESPACE__.'\\','',$class);
		$tabStr=explode("\\",$class);
		$classStr=end($tabStr);
		$directory=strtolower(str_replace($classStr,'',$directory));
		if ( file_exists(__DIR__."\\".$directory.$classStr.".php") )
			require (__DIR__."\\".$directory.$classStr.".php");
		else {
			switch ($class) {
				case "Smarty":
					define('SMARTY_SPL_AUTOLOAD',1);
					require __DIR__.'/../vendors/smarty-3.1.33/Smarty.class.php';
					break;
				// default:
					// throw new \Exception('Impossible de charger la classe:'.$class);
			}
		}
	}

	static function router(){
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
		self::$url=$controllerParam."/".$actionParam;
		//var_dump(self::$url);
		spl_autoload_register(__CLASS__."::autoload");
		ob_start();
		self::$autocommit = 0;
		switch ( self::$url ) {
			case "form/default":
				$controllerCall = new Controllers\Form();
				$controllerCall->defaultAction();
				break;
			case "home/default":
				$controllerCall = new Controllers\Home();
				$controllerCall->defaultAction();
				break;
			case "player/default":
				$controllerCall = new Controllers\Player();
				$controllerCall->defaultAction();
				break;
			case "player/create":
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
				$controllerCall = new Controllers\Player();
				$controllerCall->listAllAction();
				break;
			case "player/show":
				$controllerCall = new Controllers\Player();
				$controllerCall->showAction($idParam);
				break;
			case "game/default":
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
				$controllerCall = new Controllers\Game();
				$controllerCall->listAllAction();
				break;
		/*	case "game/json":
				self::$url="json";
				$controllerCall = new Controllers\Game();
				$controllerCall->listAllAction();
					break;*/
			case "jeu/grille":
				$controllerCall = new Controllers\Grille();
				$controllerCall->defaultAction();
						break;
			case "game/show":
				$controllerCall = new Controllers\Game();
				$controllerCall->showAction($idParam);
				break;
			default:
				$controllerCall = new Controllers\Home();
				$controllerCall->defaultAction();
				break;
		}
					$content=ob_get_clean();
		if (self::$url !="json"){
			require("../app/views/base.php");
		} else echo $content;
			// code...


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

	static function viewerSmarty($view,$variables=array()){
			$smarty=new Smarty();
			$smarty->template_dir=__DIR__."\\templates\\";
			$smarty->compile_dir=SMARTY_DIR."compile";
			$smarty->config_dir=SMARTY_DIR."config";
			$smarty->cache_dir=SMARTY_DIR."cache";
			foreach ( $variables as $key=>$element) {
				$smarty->assign($key,$element);
			}
			$smarty->display($view);
	}

}
