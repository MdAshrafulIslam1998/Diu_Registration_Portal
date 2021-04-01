<?php

$my_option = $_GET["id"];
if( !empty($my_option) ){
    require_once "config.php";
    
    $sql = "SELECT * FROM student_record WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
 
        $param_id = trim($_GET["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
			
			
    
            if(mysqli_num_rows($result) == 1){
                       												
				while ($row = $result->fetch_assoc())
							{
									$course = $row["course"];
									$name = $row["name"];
									$status = $row["status"];
									$section = $row["section"];
									$roll = $row["roll"];										
							}

						
															                																								
                
            } else{
             
                header("location: error.php");
                exit();
            } 
			
		
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     

    mysqli_stmt_close($stmt);
    
  
    mysqli_close($conn);
} else{
    
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel='icon' href='https://daffodilvarsity.edu.bd/template/images/favicon.ico' type='image/x-icon'/ >
	 <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
	<style>
    body {
      margin: 0;
      font-family: Candara;
      font-size: 22px;
    }
    
    
    .topnav {
      overflow: hidden;
      background-color: #C3E6CB;
    }
    
    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 20px 20px;
      text-decoration: none;
      font-size: 22px;
      font-weight: bold;
    }
    
    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }
    
    .topnav a.active {
      background-color: #C3E6CB;
      color: black;
    }
    
    .btn-primary.custom-btn{
	background-color: #C3E6CB;
	color: black;
	font-weight: bold;
    }
    
    .btn-primary.custom-btn:hover {
	background-color: #C3E6CB;
	color: black;
	box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24),0 5px 10px 0 rgba(0,0,0,0.19);
	font-weight: bold;
    }
    
    </style>
   
</head>
<body>
<div class="topnav">
      <a class="active" >DIU Student Registration Portal</a>
      
      
      
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Student Details</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php
						echo"$name";
						 ?></p>
                    </div>
					<div class="form-group">
                        <label>DIU ID</label>
                        <p class="form-control-static"><?php
						echo"$roll";
						 ?></p>
                    </div>
                    <div class="form-group">
                        <label>Registration Status</label>
                        <p class="form-control-static"><?php
										if ($status == 'Completed') $color = 'GREEN';
										elseif ($status == 'Incomplete') $color = 'RED';
										elseif ($status == 'Partially Completed') $color = '#F3A83A';								
						                
										echo "<span style=\"color: $color\">" . $status . "</span>";
						 ?></p>
                    </div>
                    <div class="form-group">
                        <label>Section</label>
                        <p class="form-control-static"><?php 
						echo"$section";
						?></p>
                    </div>
					<div class="form-group">
                        <label>Registered Course List</label>
                        <p class="form-control-static"><?php 
						echo "<pre>";
						echo "$course";
						echo "</pre>";
						?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>