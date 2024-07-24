

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<style>
		*{padding: 0;margin:0;}
		.api{
			/*padding: 50px;*/
			/*width: 1000px;*/
			border:1px solid whitesmoke;
			padding-bottom: 30px;
		}
		table tr,td{
padding: 20px;

		}
		table{
			width: 500px;
			margin: 0 auto;
			box-shadow: rgba(99,99,99,.5)2px 3px 20px 2px;
			padding: 50px;
		}form{
			width: 400px;
			margin: 0 auto;
			margin-bottom: 10px;
			padding: 20px;
		} select,button{
			padding: 10px;
		}
		button{
			background-color: coral;
			color: white;
			text-align: center;
			border:1px solid whitesmoke;
		}
		.top-bar{
			padding: 50px;
			background-color: coral;

		}.top-bar h1{
			text-align: center;
			color: white;
		}
	</style>
	<div class="api">
		<div class="top-bar">
			<h1>FRUIT API APLICATION IN PHP</h1>
		</div>
		<form >
			<select name="fruit_name" id="fruit_name">
				<option value="">Select Fruit</option>
<?php 

$url=file_get_contents("https://www.fruityvice.com/api/fruit/all");
$result_1=json_decode($url,true);
for ($i=0;$i<count($result_1);++$i) {
	// 	echo $result[$i]['name']."<br/>";
	// 
?>
		<option value="<?php echo $result_1[$i]['name'] ?>"><?php echo $result_1[$i]['name'] ?></option>


				<?php 
}
				?>
			</select>
			<button type="button" class="btn" name="get_fruit_name">Refresh</button>
		</form>
		
		<img src="loader.gif" alt="" style="display: none; margin-left: 600px;" id="img">
	</div>
	<script>
		const fruit_name= document.querySelector("#fruit_name");
		fruit_name.onchange=function(){
			// alert(this.value);
				document.querySelector("#img").style.display="block";
			const request =  new XMLHttpRequest();
			param="fruit_name="+this.value;
			request.open("GET","ajax_api.php?fruit_name="+this.value);
			request.onload=function(){
				// console.log(request.responseText);
				setTimeout(function(){

				document.querySelector(".api").insertAdjacentHTML("afterend",request.responseText);
document.querySelector("#img").style.display="none";
				},3000);
			}
			request.send(param);
		}
	</script>
</body>
</html>
