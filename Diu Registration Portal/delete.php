<?php
require_once "config.php";

if(isset($_POST["id"]) && !empty($_POST["id"])){
   
    $sql = "DELETE FROM student_record WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        $param_id = trim($_POST["id"]);       
       
        if(mysqli_stmt_execute($stmt)){
            
            header("location: index.php");
            exit();
        } else{
            echo "Something is wrong. Please try again !";
        }
    }
     
   
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($conn);
} else{
    
    $my_option = $_GET["id"];
	if(empty($my_option) ){
        
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
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
                        <h1>Delete Student Details</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in btn-primary custom-btn">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>