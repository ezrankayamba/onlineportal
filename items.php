<?php 
if(!session_id()){
    session_start();
}
?>

<form method="post" action="index.php?page=checkout">
	<fieldset>
		<legend>Select Item you want to purchase!</legend>
		<div class="radiogroup">
			<div class="radioline">
				<input type="radio" name="item" value="item1" id="item1" required="true"/><label for="item1">Item #1</label>
			</div>
			<div class="radioline">
				<input type="radio" name="item" value="item2" id="item2" required="true"/><label for="item2">Item #2</label>
			</div>
			<div class="radioline">
				<input type="radio" name="item" value="item3" id="item3" required="true"/><label for="item3">Item #3</label>
			</div>			
		</div>
		
		<button class="cmd" type="submit" name="cmd" value="sel_item">Submit</button>
	</fieldset>
</form>

