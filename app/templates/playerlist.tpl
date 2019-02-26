<table class="table">
<thead class="thead-dark">
<tr>
  <th scope="col">Id</th>
  <th scope="col">Pseudo</th>
  <th scope="col">Nom</th>
  <th scope="col"></th>
</tr>
</thead>
<tbody>
{foreach $joueurs as $joueur}
<tr>
  <th scope='col'>{$joueur->id_joueur}</th>
    <td>{$joueur->pseudo_user}</td>
    <td>{$joueur->nom_user}</td>
    <td>
      <a class="btn btn-primary" href="\player\create\{$joueur->id_joueur}">Modifier</a>&nbsp;
      <a class="btn btn-danger" href="\player\delete\{$joueur->id_joueur}">Supprimer</a>
    </td>
  </tr>
{/foreach}
</tbody>
</table>
