<?php
	$template=$this->template->base_template;
?><!doctype html>
<html>
	<head>
		<base href="<?=$this->getBase();?>">
		<link rel="stylesheet" href="<?=$template;?>/css/style.css">
		<script src="<?=$template;?>/js/demoapp.js"></script>
	</head>
	<body>
		<h1>Shopping List</h1>
		<table class="list_table">
			<thead>
				<tr>
					<th>Number</th><th>Item</th><th>Quantity</th><th>Price</th><th>Total</th>
				</tr>
			</thead>
			<tbody>
<?php
	$counter=1;
	$total=0;
	$shopping_list_items=$shopping_list->getListItems();
	while($shopping_list_item=$shopping_list_items->next())
	{
		$name=__($shopping_list_item->name);
		$quantity=__(number_format($shopping_list_item->quantity,2));
		$price=__(number_format($shopping_list_item->price,2));
		$line_total_number=$shopping_list_item->price*$shopping_list_item->quantity;
		$line_total=__(number_format($line_total_number,2));
		?>
			<tr>
				<td><?=$counter;?>.</td>
				<td><?=$name;?></td>
				<td><?=$quantity;?></td>
				<td><?=$price?></td>
				<td><?=$line_total?></td>
			</tr>
		<?php
		$total+=$line_total_number;
		$counter++;
	}
?>
			</tbody>
			<tfoot>
					<tr>
						<td colspan="4">Total:</td><td><?=__(number_format($total,2));?></td>
					</tr>
			</tfoot>
	</body>
</html>
