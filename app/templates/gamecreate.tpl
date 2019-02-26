<div class="card">
	<div class="card-body">
		<h5 class="card-title">Nouvelle partie</h5>
		<form id="gameForm" action="/game/save" method="post" enctype="multipart/form-data">
			<input type="hidden" id="gameFormid" name="gameFormid" value="{$partie->id_partie}">
			<div class="form-group">
				<label for="gameFormTitle">Quel est le titre de votre partie ?</label>
				<input type="text" class="form-control" name="gameFormTitle" id="gameFormTitle" value="{$partie->libelle_partie}">
			</div>
			<p>
				<button type="submit" class="btn btn-primary">{if $partie->id_partie == 0}Créer{else}Mettre à jour{/if}</button>
			</p>
		</form>
	</div>
</div>
