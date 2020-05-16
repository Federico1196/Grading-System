<?php 

	include ('config/db_connect.php');

	if(isset($_POST['s']))////checking whether the input element is set or not
	{
    	$a=$_POST['t1']; //name
    	$a1=$_POST['t2']; //group


    	$a2=$_POST['t3']; //accessing value from 3rd text field
    	$a3=$_POST['t4']; //accessing value from 4th text field
		$a4=$_POST['t5']; //accessing value from 5th text field
		$a5=$_POST['t6']; //accessing value from 5th text field

		$a6=$_POST['t7a'];//name
		$a8=$_POST['t9a'];
		$a9=$_POST['t10a'];
		$a10=$_POST['t11a'];
		$a11=$_POST['t12a'];

		$a12=$_POST['t13b'];//name
		$a14=$_POST['t15b'];
		$a15=$_POST['t16b'];
		$a16=$_POST['t17b'];
		$a17=$_POST['t18b'];

    	$sum=$a2+$a3+$a4+$a5; 
    	$sum1=$a8+$a9+$a10+$a11;
    	$sum2=$a14+$a15+$a16+$a17;

    	$avg=$sum/4;
    	$avg1=$sum1/4;
    	$avg2=$sum2/4;

    	$finalAvg = ($avg + $avg1 + $avg2)/3;
    	$percent2= $finalAvg*100/10;

		print "<font size=4><center>This project was graded by Judge ".$a.",  ".$a6." and ".$a12." </center><br>";
		print "<font size=4><center>The Average Grade for Group ".$a1." is: ".$finalAvg." out of 10 </center><br>";
    	if($percent2>=0 && $percent2<=50)
        	$grade="Fail";
    	if($percent2>50 && $percent2<70)
        	$grade="D";
    	if($percent2>=70 && $percent2<80)
        	$grade="C";
    	if($percent2>=80 && $percent2<90)
        	$grade="B";
    	if($percent2>90)
        	$grade="A";

    	echo "<font size=4><center> Overall percent for Group".$a1." is a: ".$grade."</center>";


    	// connect to database
    		//$ = mysqli_real_escape_string($conn, $_POST['email']);
			//$title = mysqli_real_escape_string($conn, $_POST['title']);
			//$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

    		$id = mysqli_real_escape_string($conn, $_POST['t2']);
			$Judge1 = mysqli_real_escape_string($conn, $_POST['t1']);
			$Judge2 = mysqli_real_escape_string($conn, $_POST['t7a']);
			$Judge3 = mysqli_real_escape_string($conn, $_POST['t13b']);
			$FinalAvg = mysqli_real_escape_string($conn, $finalAvg);
			$LetterGrade = mysqli_real_escape_string($conn, $grade);
			$Percent2 = mysqli_real_escape_string($conn, $percent2);


			$sql = "INSERT INTO gradestab(id,Judge1,Judge2,Judge3,finalAvg,letterGrade,percent) VALUES('$id','$Judge1
			','$Judge2','$Judge3','$FinalAvg','$LetterGrade','$Percent2')";

			//save to database and check
			if (mysqli_query($conn, $sql)){

			header('location: index.php');
			} else {
				echo 'error on query '.mysqli_error($conn);

			}
    	



	}

	/*
	grades gradestab

	group
	Judge1
	Judge2
	Judge3
	finalAvg
	letterGrade
	percent
	created_at
	*/
      

 ?>



 <!DOCTYPE html>
 <html>
 <body>
 	<?php include('template/Header.php'); ?>
 	<body>
 		<h4 class="center">Add a Group's grade</h4>
 		<form action="add.php" method="post">
            <center>
                <table border=0>
					<tr>
                        <td>
                            Judges Name:
                        </td>
                        <td>
                            <input type=text name="t1"> <td> <input type=text name="t7a"> </td>   <td> <input type=text name="t13b"> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Group Number:
                        </td>
                        <td>
                            <input type=text name="t2">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Score for design (0 to 10)
                        </td>
                        <td>
                            <input type=text name="t3">  <td> <input type=text name="t9a"> </td>  <td> <input type=text name="t15b"> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Score for Delivery (0 to 10)
                        </td>
                        <td>
                            <input type=text name="t4">  <td> <input type=text name="t10a"> </td>  <td> <input type=text name="t16b"> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Score for information Provided (0 to 10)
                        </td>
                        <td>
                            <input type=text name="t5">  <td> <input type=text name="t11a"> </td>  <td> <input type=text name="t17b"> </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Scores for overall team work (0 to 10)
                        </td>
                        <td>
                            <input type=text name="t6">   <td> <input type=text name="t12a"> </td>  <td> <input type=text name="t18b"> </td>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <input type="submit" name="s" value="Calculate Results" class="btn brand z-depth-0">
            </center>
            
        </form>
    </body>

 	<?php include('template/Footer.php'); ?>

 </html>