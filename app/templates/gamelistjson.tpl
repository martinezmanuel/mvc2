<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Titre de la partie</th>

    </tr>
  </thead>
  <tbody id="tbodypartie">
  </tbody>
  </table>
{literal}
<script>

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
  							html += "<tr><td>"+value.id_partie+"</td><td>"+value.libelle_partie+"</td>";
  							html += "<td><a class='btn btn-primary' href='\\game\\create\\"+value.id_partie+"'>Modifier</a>&nbsp;<a class='btn btn-danger' href='\\game\\delete\\"+value.id_partie+"'>Supprimer</a></td>";
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
</script>
{/literal}
