<?php 
	include('config/db_connect.php');

	$sql = "SELECT * FROM gradestab "; 
	$queryResult = mysqli_query($conn, $sql);


   if ($queryResult) {
      $studentGroups = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
    }
	// echo $queryResult->fetch_object()->id;




 ?>

 <!DOCTYPE html>
 <html>
 		<style>
			h6.ex1 {
  			 padding-left: 225px;
			}
		</style>

 	<?php include('template/Header.php'); ?>

 	<h5 class="center">Welcome to Group's 2 grading system, <br/>please start up by adding the group's grade</h5>

 	<br><br>
    <h6 class="ex1">If you have any group scores done, they will appear here:</h6>

 	<div class="container">
		<div class="row">
			<?php foreach ($studentGroups as $studentGroup) { ?>


				<div class="col s6 m4">
					<div class="card z-depth-0">
						<div class="card-content center">
							<ul>
								<h6><b>Group# <?php echo $studentGroup['id']; ?></b></h6>
								<br>

								<div><b>Judges: </b><?php echo $studentGroup['Judge1']; ?><?php echo ", ".$studentGroup['Judge2']; ?> <?php echo ", ".$studentGroup['Judge3']; ?></div>
								<div> <b>The Average Grade (0 to 10): </b><?php echo  $studentGroup['finalAvg'] ?></div>
								<div> <b>Overall percent for Group: </b><?php echo ($studentGroup['percent'])."%" ?> </div>
								<div> <b>Grade: </b><?php echo strtoupper($studentGroup['letterGrade']) ?> </div>
								
							</ul>
								
						
						</div>
						
					</div>
				</div>	
			<?php } ?>
		</div>
	</div>

 	<?php include('template/Footer.php'); ?>
 
 </html>