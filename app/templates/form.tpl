<div class="card">
	<div class="card-body">
		<h5 class="card-title">Champs de formulaire</h5>
		<form action="/home" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="fieldEmail">Email address</label>
				<input type="email" class="form-control" name="fieldEmail" id="fieldEmail" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="fieldPassword">Password</label>
				<input type="password" class="form-control" name="fieldPassword" id="fieldPassword" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="fieldText">Text</label>
				<input type="text" class="form-control" name="fieldText" id="fieldText">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" name="fieldCheckbox" id="fieldCheckbox">
				<label class="form-check-label" for="fieldCheckbox">Check me out</label>
			</div>
			<div class="form-group">
				<label for="fieldSelectSimple">Example select</label>
				<select class="form-control" name="fieldSelectSimple" id="fieldSelectSimple">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="fieldSelectMultiple">Example multiple select</label>
				<select multiple class="form-control" name="fieldSelectMultiple[]" id="fieldSelectMultiple">
				  <option value="fieldSelectMultiple1">1</option>
				  <option value="fieldSelectMultiple2">2</option>
				  <option value="fieldSelectMultiple3">3</option>
				  <option value="fieldSelectMultiple4">4</option>
				  <option value="fieldSelectMultiple5">5</option>
				</select>
			</div>
			<div class="form-group">
				<label for="fieldTextarea">Example textarea</label>
				<textarea class="form-control" name="fieldTextarea" id="fieldTextarea" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="fieldFile">Example file input</label>
				<input type="file" class="form-control-file" name="fieldFile" id="fieldFile">
			</div>
			<div class="form-group">
				<label for="fieldRange">Example Range input</label>
				<input type="range" class="form-control-range" name="fieldRange" id="fieldRange">
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="fieldRadios" id="fieldRadios1" value="option1" checked>
				<label class="form-check-label" for="fieldRadios1">
				Default radio
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="fieldRadios" id="fieldRadios2" value="option2">
				<label class="form-check-label" for="fieldRadios2">
				Second default radio
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="fieldRadios" id="fieldRadios3" value="option3">
				<label class="form-check-label" for="fieldRadios3">
				Third default radio
				</label>
			</div>
			<p>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</p>
		</form>
	</div>
</div>