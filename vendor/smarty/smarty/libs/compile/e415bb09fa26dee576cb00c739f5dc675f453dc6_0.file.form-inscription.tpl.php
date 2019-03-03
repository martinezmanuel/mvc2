<?php
/* Smarty version 3.1.33, created on 2019-03-01 13:27:47
  from 'C:\xampp\htdocs\mvc\app\templates\form-inscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c792543203476_94993330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e415bb09fa26dee576cb00c739f5dc675f453dc6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\form-inscription.tpl',
      1 => 1551442795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c792543203476_94993330 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
	<div class="card-body">
		<h5 class="card-title">Formulaire d'inscription</h5>
		<form action="/home" method="post" enctype="multipart/form-data">
				<input type="hidden" id="gameformid" name="gameformid" value="<?php echo $_smarty_tpl->tpl_vars['connexion']->value->id_membre;?>
">
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
				<button type="submit" id="inscription" class="btn btn-primary">Envoyer</button>
			</p>
		</form>
	</div>
</div>
<?php }
}
