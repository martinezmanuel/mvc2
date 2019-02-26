<table class="table">
<thead class="thead-dark">
<tr>
  <th scope="col">Id</th>
  <th scope="col">Titre</th>
</tr>
</thead>
<tbody>
<?php
foreach ($parties as $partie) {
	echo "<tr><th scope='col'>".$partie->id_partie."</th><td>".$partie->libelle_partie."</td></tr>";
}
?>
</tbody>
</table>
