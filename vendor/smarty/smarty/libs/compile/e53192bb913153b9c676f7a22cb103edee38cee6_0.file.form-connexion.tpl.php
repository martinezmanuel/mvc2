<?php
/* Smarty version 3.1.33, created on 2019-03-01 13:10:17
  from 'C:\xampp\htdocs\mvc\app\templates\form-connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c792129abb445_74593139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e53192bb913153b9c676f7a22cb103edee38cee6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\form-connexion.tpl',
      1 => 1551437776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c792129abb445_74593139 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
	<div class="card-body">
		<h5 class="card-title">Connexion</h5>
		<form action="/home" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="fieldEmail">Email address</label>
				<input type="email" class="form-control" name="fieldEmail" id="fieldEmail" aria-describedby="emailHelp" placeholder="Entrer votre email">
			</div>
			<div class="form-group">
				<label for="fieldPassword">Mot de passe</label>
				<input type="password" class="form-control" name="fieldPassword" id="fieldPassword" placeholder="votre mot de passe">
			</div>
			<p>
				<button type="submit" id="connexion" class="btn btn-primary">Se connecter</button>
			</p>
		</form>
	</div>
</div>
<?php }
}
