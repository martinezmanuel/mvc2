<?php
/* Smarty version 3.1.33, created on 2019-02-26 11:09:05
  from 'C:\xampp\htdocs\mvc\app\templates\gamelist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7510413b4283_73273763',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'b5ab81dfa6e7b5aa452ae0a37a355d1cf9c14bea' =>
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\gamelist.tpl',
      1 => 1551175375,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_5c7510413b4283_73273763 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titre de la partie</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partie']->value, 'partie');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partie']->value) {
?>
    <tr>
      <th scope='col'><?php echo $_smarty_tpl->tpl_vars['partie']->value->id_partie;?>
</th>
      <td><?php echo $_smarty_tpl->tpl_vars['partie']->value->libelle_partie;?>
</td>
      <td>
        <a class="btn btn-primary" href="\game\create\<?php echo $_smarty_tpl->tpl_vars['partie']->value->id_partie;?>
">Modifier</a>&nbsp;
        <a class="btn btn-danger" href="\game\delete\<?php echo $_smarty_tpl->tpl_vars['partie']->value->id_partie;?>
">Supprimer</a>
      </td>
    </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>
<?php }
}
