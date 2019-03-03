<?php
/* Smarty version 3.1.33, created on 2019-03-01 11:33:23
  from 'C:\xampp\htdocs\mvc\app\templates\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c790a731c47a9_78431843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee99176d0848b305783684059e1b9fde8b168f4d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\form.tpl',
      1 => 1551436401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c790a731c47a9_78431843 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
	<div class="card-body">
		<h5 class="card-title">Formulaire d'inscription</h5>
		<form action="/home" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="fieldEmail">Nom</label>
				<input type="text" class="form-control" name="fieldName" id="fieldName" aria-describedby="emailHelp" placeholder="Entrer votre nom">
			</div>
			<div class="form-group">
				<label for="fieldEmail">Email address</label>
				<input type="email" class="form-control" name="fieldEmail" id="fieldEmail" aria-describedby="emailHelp" placeholder="Entrer votre email">
			</div>
			<div class="form-group">
				<label for="fieldPassword">Mot de passe</label>
				<input type="password" class="form-control" name="fieldPassword" id="fieldPassword" placeholder="votre mot de passe">
			</div>
			<div class="form-group">
				<label for="fieldPasswordVerif">Mot de passe</label>
				<input type="password" class="form-control" name="fieldPasswordVerif" id="fieldPasswordVerif" placeholder="verification de votre mot de passe">
			</div>
			<p>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</p>
		</form>
	</div>
</div>
<?php }
}
