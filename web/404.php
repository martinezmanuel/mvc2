<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/brand.jpg">

    <title>Wargamme Medieval</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/custom.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#"><img src="/img/brand.jpg"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if ( strpos(\App\Kernel::getUrl(),'home') === 0 ) echo 'active';?>">
            <a class="nav-link" href="/home">Accueil</a>
          </li>
          <li class="nav-item dropdown <?php if ( strpos(\App\Kernel::getUrl(),'game') === 0 ) echo 'active';?>">
            <a class="nav-link dropdown-toggle" href="/game" id="dropdownGame" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Parties</a>
            <div class="dropdown-menu" aria-labelledby="dropdownGame">
              <a class="dropdown-item" href="/game/list">En cours</a>
              <a class="dropdown-item" href="/game/create">Nouvelle partie</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
		<div class="starter-template">
		<h1>Bienvenue sur notre espace Jeux</h1>
		<p class="lead">La page demandée n'est pas disponible</p>
		</div>
    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
	<h1>Il ya un problème</h1>
	<p class="lead">Cette page n'est pas disponible</p>
</div>
