<?php
/* Smarty version 3.1.33, created on 2019-02-26 10:43:56
  from 'C:\xampp\htdocs\mvc\app\templates\playerlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c750a5c1d65c9_00023795',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'bdac79be8d53ae98c4c9448295ebad2454d55461' =>
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\playerlist.tpl',
      1 => 1551173893,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_5c750a5c1d65c9_00023795 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table">
<thead class="thead-dark">
<tr>
  <th scope="col">Id</th>
  <th scope="col">Pseudo</th>
  <th scope="col">Nom</th>
  <th scope="col"></th>
</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['joueur']->value, 'joueur');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['joueur']->value) {
?>
<tr>
  <th scope='col'><?php echo $_smarty_tpl->tpl_vars['joueur']->value->id_joueur;?>
</th>
    <td><?php echo $_smarty_tpl->tpl_vars['joueur']->value->pseudo_user;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['joueur']->value->nom_user;?>
</td>
    <td>
      <a class="btn btn-primary" href="\player\create\<?php echo $_smarty_tpl->tpl_vars['joueur']->value->id_joueur;?>
">Modifier</a>&nbsp;
      <a class="btn btn-danger" href="\player\delete\<?php echo $_smarty_tpl->tpl_vars['joueur']->value->id_joueur;?>
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
