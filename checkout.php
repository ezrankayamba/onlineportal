<?php 
$items = array('item1'=>array('name'=>'Item #1', 'price'=>200),
'item2'=>array('name'=>'Item #2', 'price'=>400),
'item3'=>array('name'=>'Item #3', 'price'=>1000));

$theItem= $items[$post_data['item']];
?>

<form method="post" action="index.php?page=payment">
	<fieldset>
		<legend>Summary</legend>
		<section>
			You are purchasing <b> <?php echo $theItem['name']?></b> <br/>
			Which will cost you <b><?php echo $theItem['price']?></b> <br/>
		<section>
		<input type="hidden" name="name" value="<?php echo $theItem['name']?>"/>
		<input type="hidden" name="price" value="<?php echo $theItem['price']?>"/>
		<button class="cmd" type="submit" name="cmd" value="checkout">Confirm</button>
	</fieldset>
</form>

