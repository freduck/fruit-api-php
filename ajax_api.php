<table>
			<tr>
				<th>ID</th>
				<th>Fruit Name</th>
				<th>Fruit Family</th>
				<th>Order</th>
				<th>Genus</th>
			</tr>
		<?php 
if(isset($_GET['fruit_name'])){



$fruit=$_GET['fruit_name'];
$url=file_get_contents("https://www.fruityvice.com/api/fruit/".$fruit);

$result=json_decode($url,true);
$error="";

if($result==null){
	$error="No Result Found";
}
else{
	// for ($i=0;$i<count($result);++$i) {
	// 	echo $result[$i]['name']."<br/>";
	// }

	?>
	<tr>
		<td>
				<?php echo $result['id'];?>;
		</td>
		<td>
			
	<?php echo $result['name'];?>;
		</td>
		<td>
				<?php echo $result['family'];?>;
		</td>
		<td>
				<?php echo $result['order'];?>;
		</td>
		<td>
				<?php echo $result['genus'];?>;
		</td>
		
	</tr>

	<?php
}
}
		 ?>
		</table>