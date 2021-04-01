<!DOCTYPE html>
<html lang="en">           
<head>
    <meta charset="UTF-8">
    <title>DIU Registration Portal</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel='icon' href='https://daffodilvarsity.edu.bd/template/images/favicon.ico' type='image/x-icon'/ >
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    
    <style>
    body {
      margin: 0;
      font-family: Candara;
      font-size: 18px;
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
	margin-right: 5px;
    }
    
    .btn-primary.custom-btn:hover {
	background-color: #C3E6CB;
	color: black;
	box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24),0 5px 10px 0 rgba(0,0,0,0.19);
	font-weight: bold;
    }
    
    .btn-primary.custom-btn2{
	background-color: #C3E6CB;
	color: black;
	
    }
    
    </style>
   
    <style>
      table,
      table td {
        border: 1px solid #cccccc;
      }
      td {
        
        text-align: center;
        vertical-align: middle;
      }
      th {
        
        text-align: center;
        vertical-align: middle;
      }
    </style>
    
    <style type="text/css">
		.wrapper{
            width: 900px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
		
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    
        

    
</head>

<body >
   

      <div class="topnav">
      <a class="active" >DIU Student Registration Portal</a>      
            
    </div>
    


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <form  class="pull-left" method="post" action="search.php?go"  id="searchform"> 
						<input  type="text" name="name"> 
						<input  type="submit"  name="submit" value="Search"> 
					    </form> 
					    <a href="developer.php" class="btn btn-primary custom-btn pull-right">Developer</a>
                        <a href="add.php" class="btn btn-primary custom-btn pull-right">Add New Student</a>
                        
                    </div>
                    
					
                    <?php
                    
                    require_once "config.php";
					                   
                   
                    $sql = "SELECT * FROM student_record";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped table-hover  ' >";
                                echo "<thead class='btn-primary custom-btn2'>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Courses</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Update</th>";
                                        echo "<th>Delete</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['roll'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td >";
                                        echo "<a href='retrieve.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-list-alt'></span></a>";
                                        echo "</td>";
										if ($row['status'] == 'Completed') $color = 'GREEN';
										elseif ($row['status'] == 'Incomplete') $color = 'RED';
										elseif ($row['status'] == 'Partially Completed') $color = '#F3A83A';
                                        echo "<td><span style='font-weight: bold; color:".$color."'</span>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        
                                        echo "<td>";
                                            
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-erase'></span></a>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'style='color:red'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                             echo "<br> </br>";
                           
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
					                
                    mysqli_close($conn);
                    ?>
					
					
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

