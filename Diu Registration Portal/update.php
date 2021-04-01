<?php

require_once "config.php";
 
$name = $status = $section = $course = $roll = "";
$name_err = $status_err = $section_err = $course_err = $roll_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id = $_POST["id"];
    
  
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
 
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter an status.";     
    } else{
        $status = $input_status;
    }
 
    $input_section = trim($_POST["section"]);
    if(empty($input_section)){
        $section_err = "Please enter the section.";     
    } 
    else{
        $section = $input_section;
    }
	
	$input_course = trim($_POST["course"]);
    if(empty($input_course)){
        $course_err = "Please enter course list";     
    } else{
        $course = $input_course;
    }
	
	$input_roll = trim($_POST["roll"]);
    if(empty($input_roll)){
        $roll_err = "Please enter course list.";  
    } elseif(!filter_var($input_roll, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9-( )]+$/")))){
        $roll_err = "Please enter a valid ID.";
        
    }else{
        $roll = $input_roll;
    }
    
 
    if(empty($name_err) && empty($status_err) && empty($section_err) && empty($course_err) && empty($roll_err)){
        
        $sql = "UPDATE student_record SET name=?, status=?, section=?, course=?, roll=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
         
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_status, $param_section, $param_course, $param_roll, $param_id);
            
           
            $param_name = $name;
            $param_status = $status;
            $param_section = $section;
            $param_id = $id;
			$param_course = $course;
			$param_roll = $roll;
            
            
            if(mysqli_stmt_execute($stmt)){
             
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
      
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($conn);
} else{
    
    $my_option = $_GET["id"];
	if(!empty($my_option)){
        
        $id =  trim($_GET["id"]);
        
  
        $sql = "SELECT * FROM student_record WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
     
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
      
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                   
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                   
                    $name = $row["name"];
                    $status = $row["status"];
                    $section = $row["section"];
					$course = $row["course"];
					$roll = $row["roll"];
                } else{
                    
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Something wrong. Please try again!";
            }
        }
        
     
        mysqli_stmt_close($stmt);
        
      
        mysqli_close($conn);
    }  else{
        
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
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
                        <h2>Update Student Registration Details</h2>
                    </div>
                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($roll_err)) ? 'has-error' : ''; ?>">
                            <label>DIU Id</label>
                            <input type="text" name="roll" class="form-control" value="<?php echo $roll; ?>">
                            <span class="help-block"><?php echo $roll_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                            <label>Current Registration Status</label>
                            <p name="status"><?php 
                            if ($status == 'Completed') $color = 'GREEN';
							elseif ($status == 'Incomplete') $color = 'RED';
							elseif ($status == 'Partially Completed') $color = '#F3A83A';
										
										echo "<span style=\"color: $color\">" . $status . "</span>"; ?></p>
                            <span class="help-block"><?php echo $status_err;?></span>
                            
                            <label>New Registration Status<br></br><br></br></label>
							
							
							
							<select name="status" id="status" class="btn btn-success dropdown-toggle btn-primary custom-btn " data-toggle="dropdown">
							<option selected="true" disabled="disabled" >Status</option>    
							<option value="Completed" >Completed</option>
							<option value="Partially Completed">Partially Completed</option>
							<option value="Incomplete">Incomplete</option>							
							<?php echo $status; ?>
							</select>
																																										
							
							
							
                            
                            <span class="help-block"><?php echo $status_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($section_err)) ? 'has-error' : ''; ?>">
                            <label>Section</label>
                            <input type="text" name="section" class="form-control" value="<?php echo $section; ?>">
                            <span class="help-block"><?php echo $section_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($course_err)) ? 'has-error' : ''; ?>">
                            <label>Registered Courses List</label>
                            <textarea name="course" class="form-control"><?php echo $course; ?></textarea>
                            <span class="help-block"><?php echo $course_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary btn-primary custom-btn" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>