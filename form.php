<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>	
		<title>Validation Example</title>
<!--		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		
		<script type="text/javascript" src="jquery.js"></script>  
		<script type="text/javascript" src="validate.js"></script>  
	-->	
		<script type="text/javascript">

		</script>

		<style type="text/css">
			body { font-family: Arial; font-size: 12px; }
			fieldset { border:0; }
			label { display: block; width: 180px; float:left; clear:both; margin-top: 10px; }
			label em { display: block; float:right; padding-right:8px; color:red; }
			textarea, input, select { float:left; width: 220px; padding: 2px; }
			textarea { height: 180px; }
			#submit { margin-left:180px; clear:both; width:100px; }
			
			label.error { float: left; color: red; clear:none; width:200px; padding-left: 10px; font-size: 11px; }
			.required_msg { padding-left: 180px; clear:both; float:left; color:red; }
		</style>
	</head>
	<body>
<?php        
		$conn = new mysqli('localhost','root','','nyeltudas');
  if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());}
        //    if ($conn->connect_error) {die("Connection failed: ".$conn->connect_error)};
         $conn->query('set names utf8');
$q = "select * from nyelv";
$result = $conn->query( $q );
        ?>
   <form action="beszur.php" method="post" id="form">
			<fieldset>
			
                 <label for="name">Name: <em>*</em></label>
				<input type="text" name="nev" id="nev">
				
				<label for="phone">Kor : <em>*</em></label>
				<input type="text" name="kor" id="kor" placeholder="+36-00-000-0000">
				
				<label for="fax">Fax (000-000-0000):</label>
				<input type="text" name="fax" id="fax">
				
				<label for="nyelv">Nyelvtudás<em>*</em></label>
				<select id="ny" name="ny">
             <?php       while ($sor = $result->fetch_assoc()) {
                    echo "<option value=".$sor["ny_azon"].">".$sor["nyelv"]."</option>";} ?>
                 </select><br />
				<label for="comments">Comments:</label>
				<textarea name="comments" id="comments"></textarea>
				
				<p class="required_msg">* required fields</p>
				
				<input type="submit" name="submit" id="submit">
			
			</fieldset>
		</form>

<?php 
$result->free();
$conn->close();

?>
	</body>
</html>