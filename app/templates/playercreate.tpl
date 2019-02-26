<div class="card">
	<div class="card-body">
		<h5 class="card-title">Nouveau Joueur</h5>
		<form id="playerForm" action="/player/save" method="post" enctype="multipart/form-data">
			<input type="hidden" id="playerFormid" name="playerFormid" value="{$joueur->id_joueur}">
			<div class="form-group">
				<label for="playerFormPseudo">Quel est le pseudo du joueur ?</label>
				<input type="text" class="form-control" name="playerFormPseudo" id="playerFormPseudo" value="{$player->pseudo_user}">
				<label for="playerFormPseudo">Quel est le nom du joueur ?</label>
				<input type="text" class="form-control" name="playerFormNom" id="playerFormNom" value="{$player->nom_user}">
			</div>
			<p>
				<button type="submit" class="btn btn-primary">{if $joueur->id_joueur == 0}Créer{else}Mettre à jour{/if}</button>
			</p>
		</form>
	</div>
</div>
