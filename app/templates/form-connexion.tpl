<div class="card">
	<div class="card-body">
		<h5 class="card-title">Connexion</h5>
		<form id="connecform" action="form/connecter" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="connecformname">nom</label>
				<input type="text" class="form-control" name="connecformname" id="connecformname" aria-describedby="nameHelp" placeholder="Entrer votre nom">
			</div>
			<div class="form-group">
				<label for="connecformpass">Mot de passe</label>
				<input type="password" class="form-control" name="connecformpass" id="connecformpass" placeholder="votre mot de passe">
			</div>
			<p>
				<button type="submit" id="connexion" class="btn btn-primary">Se connecter</button>
			</p>
		</form>
	</div>
</div>
