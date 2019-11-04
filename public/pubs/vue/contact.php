<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
 
//var_dump($_POST);

?>
<div>
	<div class="panel panel-danger">
	<div class="panel-body">
	 <h4 class="text-center text-danger">Ecrivez-nous</h4>
		<form method="post">
			<div class="form-group">
			<div class="row">
					<div class="col-sm-3">
						<label>Nom Complet:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" name="nom" class="form-control" placeholder="Prenom Nom" required="">
					</div>
				</div>
			</div>
			<div class="form-group">
			<div class="row">
					<div class="col-sm-3">
						<label>email:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" name="email" class="form-control" placeholder="Adresse E-mail" required="">
					</div>
				</div>
			</div>
		    <div class="form-group">
			<div class="row">
					<div class="col-sm-3">
						<label>Sujet:</label>
					</div>
					<div class="col-sm-9">
						<input type="text" name="objet" class="form-control" placeholder="Sujet" required="">
					</div>
				</div>
			</div>
		 <div class="form-group">
			<div class="row">
					<div class="col-sm-3">
						<label class="text-diarra">Message:</label>
					</div>
					<div class="col-sm-9">
					<textarea name="message" rows="3"  class="form-control" placeholder="Message"></textarea>
					</div>
				</div>
			</div>
		 <div class="form-group">
		 	<div class="row">
		 	    <div class="col-sm-3"></div>
		 		<div class="col-sm-9">
		 		  <div class="g-recaptcha" data-sitekey="6LcXlSMTAAAAACSNxraYCXTpbjEDe88UcT_VyuFO"></div>
		 		</div>
		 	</div>
		 </div>	
		  <div class="form-group">
		 	<div class="row">
		 	    <div class="col-sm-3"></div>
		 		<div class="col-sm-9">
		 		<button type="submit" class="btn btn-sm btn-danger">Envoyer</button>
		 		</div>
		 	</div>
		 </div>	
		</form>
	</div>	
	</div>
</div>