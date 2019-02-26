<?php
/* Smarty version 3.1.33, created on 2019-02-26 14:51:26
  from 'C:\xampp\htdocs\mvc\app\templates\gamelistjson.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c75445e962c97_85296536',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4936a536a835f08c28bfdf37b4a56ee99bc5404' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc\\app\\templates\\gamelistjson.tpl',
      1 => 1551189081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c75445e962c97_85296536 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titre de la partie</th>
      <th scope="col"></th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody id="tbodypartie">
  </tbody>
  </table>

<?php echo '<script'; ?>
>

  function RefreshList() {
  		//console.log("RefreshList");
  		$.ajax(
  			{
  				type:'POST',
  				url:'/game/json',
  				dataType:'json',
  				success: function(data) {
  					//console.log(data['partie']);
  					let parties=data['partie'];
  					var html="";
  					$.each( parties,
  						function( key, value ) {
  							html += "<tr>";
                html += "<td>"+value.id_partie+"</td>";
                html += "<td>"+value.libelle_partie+"</td>";
  							html += "<td><a class='btn btn-primary' href='\\game\\create\\"+value.id_partie+"'>Modifier</a>&nbsp;";
                html += " <a class='btn btn-danger' href='\\game\\delete\\"+value.id_partie+"'>Supprimer</a></td>";
  							html+="</tr>";
  						}
  					);
  					$('#tbodypartie').html(html);
  				},
  				error: function(xhr, status, error) {
  					console.log(error);
  				}
  			}
  		);
  	}

  	$(document).ready( function() {

  		RefreshList();
  		setInterval(RefreshList,1000*5); //Toutes les 5 secondes
  	});
<?php echo '</script'; ?>
>

<?php }
}
