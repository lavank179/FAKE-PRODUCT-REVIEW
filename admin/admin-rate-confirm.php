<?php 
	$pid = $_GET['pid'];
	$treview = $_GET['treview'];

	$myfile = fopen("userReview.txt", "w") or die("Unable to open file!");
	$txt = $treview;

	fwrite($myfile, $txt."\n");
	fclose($myfile);
	
    $output = [];
	$output = exec("C:/Users/ram-lavan/PycharmProjects/sam1/venv/Scripts/python.exe C:/xampp/htdocs/DP/admin/rate.py");
		$output1 = explode(",", $output);

		$result1  = preg_replace('/[^a-zA-Z0-9_ -\.]/s','',$output1[0]);
		$result2  = preg_replace('/[^a-zA-Z0-9_ -\.]/s','',$output1[1]);


		$polarity = $result1*100;
		$sub = $result2*100;
		
		$sql = "update products set polarity='$polarity',subjectivity='$sub' where pid='$pid'";
		$conn = mysqli_connect("localhost","root","lavan801","admin");
		mysqli_select_db($conn,"admin");
		
		if($conn->query($sql)){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Product rating updated!!')
					window.location.href='admin-rate-product.php'
					</SCRIPT>");
		}
	
?>