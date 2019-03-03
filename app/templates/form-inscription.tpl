<div class="card">
	<div class="card-body">
		<h5 class="card-title">Formulaire d'inscription</h5>
		<form id="inscriform" action="/form/create" method="post" enctype="multipart/form-data">
				<input type="hidden" id="inscriformid" name="inscriformid" value="{$membre->id_membre}">
			<div class="form-group">
				<label for="inscriformname">Nom</label>
				<input type="text" class="form-control" name="inscriformname" id="inscriformname" aria-describedby="emailHelp" value="{$membre->nom_membre}" placeholder="Entrer votre nom">
			</div>
			<div class="form-group">
				<label for="inscriformemail">Email address</label>
				<input type="email" class="form-control" name="inscriformemail" id="inscriformemail" aria-describedby="emailHelp" value="{$membre->email_membre}" placeholder="Entrer votre email">
			</div>
			<div class="form-group">
				<label for="inscriformpass">Mot de passe</label>
				<input type="password" class="form-control" name="inscriformpass" id="inscriformpass" value="{$membre->pass_membre}" placeholder="votre mot de passe">
			</div>
			<p>
				<button type="submit" id="inscription" class="btn btn-primary">Envoyer</button>
			</p>
		</form>
	</div>
</div>
