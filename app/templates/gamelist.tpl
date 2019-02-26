<table class="table">
<thead class="thead-dark">
<tr>
  <th scope="col">Id</th>
  <th scope="col">Titre de la partie</th>
  <th scope="col"></th>
</tr>
</thead>
<tbody>
{foreach $parties as $partie}
<tr><th scope='col'>{$partie->id_partie}</th><td>{$partie->libelle_partie}</td><td><a class="btn btn-primary" href="\game\create\{$partie->id_partie}">Modifier</a>&nbsp;<a class="btn btn-danger" href="\game\delete\{$partie->id_partie}">Supprimer</a></td></tr>
{/foreach}
</tbody>
</table>
