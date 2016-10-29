<?php 
if(!session_id()){
    session_start();
}
?>

<form method="post" action="index.php">
	<fieldset>
		<legend>Payment Options</legend>
		<div class="radiogroup">
			<div class="radioline">
				<input type="radio" name="poption" value="tigopesa" id="tigopesa" required="true"/><label for="tigopesa"><img src="img/logo_tigopesa.png"/></label>
			</div>		
		</div>
		<input type="hidden" name="name" value="<?php echo $post_data['name']?>"/>
		<input type="hidden" name="price" value="<?php echo $post_data['price']?>"/>
		<button class="cmd" type="submit" name="cmd" value="poption">Proceed</button>
	</fieldset>
</form>

