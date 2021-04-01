<!DOCTYPE  html> 
<html> 
<head> 
	<meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
	<title>Search</title> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel='icon' href='https://daffodilvarsity.edu.bd/template/images/favicon.ico' type='image/x-icon'/ >
	<style type="text/css">
		.wrapper{
            width: 800px;
            margin: 0 auto;
			margin-top:50px;
        }
       p {
		   font-size:20px;
	   }
    </style>
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
    }
    
    .btn-primary.custom-btn:hover {
	background-color: #C3E6CB;
	color: black;
	box-shadow: 0 5px 10px 0 rgba(0,0,0,0.24),0 5px 10px 0 rgba(0,0,0,0.19);
	font-weight: bold;
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
    </style>
    
	
</head> 
<body> 
<div class="topnav">
      <a class="active" >DIU Student Registration Portal</a>
      
      
      
    </div>
	<div class="wrapper">
	<?php 
		if(isset($_POST['submit'])){ 
			if(isset($_GET['go'])){ 
				if($_POST['name']){ 
				$search=$_POST['name']; 
					
					$db=mysqli_connect  ("localhost", "trupples_naim", "ashtray12271") or die ('I cannot connect to the database  because: ' . mysqli_error()); 
					
					$mydb=mysqli_select_db($db,"trupples_registration"); 
					
					$sql="SELECT  id, name, status, section, roll FROM student_record WHERE roll LIKE '%".$search."%' OR name LIKE '%" . $search ."%' OR section LIKE '%".$search."%' OR status LIKE '%".$search."%'"; 
					
					$result=mysqli_query($db,$sql); 
					 
					if(mysqli_num_rows($result) > 0){
						while($row=mysqli_fetch_array($result)){ 
							$Id =$row['id']; 
							$name = $row["name"];
							$status = $row["status"];
							$section = $row["section"];
							$roll = $row["roll"];
							
							echo "<table class='table table-bordered table-striped table-hover '>";
								echo "<thead>";
									echo "<tr>";
										echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Courses</th>";
                                        echo "<th>Registration Status</th>";
                                        echo "<th>Section</th>";
                                        echo "<th>Update</th>";
                                        echo "<th>Delete</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
									echo "<tr>";
										echo "<td>" . $row['roll'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td >";
                                        echo "<a href='retrieve2.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-list-alt'></span></a>";
                                        echo "</td>";
										if ($row['status'] == 'Completed') $color = 'GREEN';
										elseif ($row['status'] == 'Incomplete') $color = 'RED';
										elseif ($row['status'] == 'Partially Completed') $color = '#F3A83A';
                                        echo "<td><span style='color:".$color."'</span>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['section'] . "</td>";
                                        
                                        echo "<td>";
                                            
                                            echo "<a href='update2.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-erase'></span></a>";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "<a href='delete2.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'style='color:red'></span></a>";
                                        echo "</td>";
									echo "</tr>";
								echo "</tbody>";                            
							echo "</table>";
							
						} 
						echo "<p><a href='index.php' class='btn btn-primary btn-primary custom-btn'>Back</a></p>";
						echo "<br></br>";
						
					} else {
						echo "<p>No matches found</p>";
						echo "<p><a href='index.php' class='btn btn-primary btn-primary custom-btn'>Back</a></p>";
					}
				} else { 
					echo  "<p>Please enter a search query</p>"; 
					echo "<p><a href='index.php' class='btn btn-primary btn-primary custom-btn'>Back</a></p>";
				} 
			} 
		} 
	?> 
	</div>
</body> 
</html> 