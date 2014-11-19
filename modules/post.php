	<div class="row">
		<div class="large-12 columns">
<h1>Nouveau post</h1>
<hr/>
<form method="post" action="index.php?p=handle_form">
	<div class="row">
		<div class="large-12 columns">
			<label>Titre du post
				<input name="title" type="text" placeholder="Comment travailler avec Git ?" /> 
			</label>
		</div>
	</div>

		<div class="row">
			<div class="large-12 columns">
				<label>Catégorie 
					<select name="category"> 
						<option value="administration">Administration</option> 
						<option value="git">Git</option> 
						<option value="photoshop">Photoshop/Illustrator</option> 
						<option value="php">PHP</option> 
					</select> 
				</label> 
			</div> 
		</div> 
		<div class="row">
				<div class="large-12 columns"> 
					<label>Contenu
						<textarea name="content" placeholder="Ecrire simplement"></textarea>
					</label> 
				</div> 
			</div>
			<input class="button" type="submit" name="submit"
 ̈ value="Publier mon post" /> 
		</form>
	</div></div>