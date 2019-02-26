<?php
/* Smarty version 3.1.33, created on 2019-01-30 13:35:32
  from 'C:\xampp\htdocs\mvc\app\templates\playercreate.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c519a14f24af7_64760460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd83a4c522af2b0dcf9ea4b59908f0c4fb566eb50' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\playercreate.tpl',
      1 => 1548851730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c519a14f24af7_64760460 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
	<div class="card-body">
		<h5 class="card-title">Nouveau Joueur</h5>
		<form id="playerForm" action="/player/save" method="post" enctype="multipart/form-data">
			<input type="hidden" id="playerFormid" name="playerFormid" value="<?php echo $_smarty_tpl->tpl_vars['joueur']->value->id_joueur;?>
">
			<div class="form-group">
				<label for="playerFormPseudo">Quel est le pseudo du joueur ?</label>
				<input type="text" class="form-control" name="playerFormPseudo" id="playerFormPseudo" value="<?php echo $_smarty_tpl->tpl_vars['player']->value->pseudo_user;?>
">
				<label for="playerFormPseudo">Quel est le nom du joueur ?</label>
				<input type="text" class="form-control" name="playerFormNom" id="playerFormNom" value="<?php echo $_smarty_tpl->tpl_vars['player']->value->nom_user;?>
">
			</div>
			<p>
				<button type="submit" class="btn btn-primary"><?php if ($_smarty_tpl->tpl_vars['joueur']->value->id_joueur == 0) {?>Créer<?php } else { ?>Mettre à jour<?php }?></button>
			</p>
		</form>
	</div>
</div>
<?php }
}
