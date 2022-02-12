<?php 
include_once "./autoload.php"; 

//User Data Delete

$delete_id = $_GET['delete_id'] ?? false ;

if( $delete_id ){

    connect() -> query("DELETE FROM friends WHERE id = '$delete_id'");

    header('location:users.php');

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All Friends Data</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	
</head>
<body>
	
	

	<div class="wrap-table shadow">
    <a class="btn btn-primary" href="./index.php">ADD FRIENDS</a><br><Br>
		<div class="card">
			<div class="card-body">
				<h2>All Friends Data</h2>
				<table class="table table-striped">
					<thead>

        				<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
                            <th>Location</th>
							<th>Cell</th>
							<th >Username</th>
                            <th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
        <?php
         $data = connect() -> query("SELECT *FROM friends");

         $sn = 1;
         while( $user = $data -> fetch_object()):
        ?>   
						<tr>
							<td><?php echo $sn; $sn++;?></td>
							<td><?php echo $user -> name;?></td>
                            <td><?php echo $user -> email;?></td>
                            <td><?php echo $user -> location;?></td>
							<td><?php echo $user -> cell;?></td>
                            <td><?php echo $user -> username;?></td>
							<td><img src="Image/<?php echo $user -> photo;?>" alt=""></td>
												
                            <td>
								<a class="btn btn-sm btn-info" href="./single.php?user_id=<?php echo $user -> id;?>">View</a>
								<a class="btn btn-sm btn-warning" href="./edit.php?edit_id=<?php echo $user -> id;?>">Edit</a>
								<a class="btn btn-sm btn-danger delete_btn" href="?delete_id=<?php echo $user -> id;?>">Delete</a>
							</td>
						</tr>
        <?php     

         endwhile;
 
        ?>                
						
											

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	
	<script src="JS/bootstrap.bundle.min.js"></script> 
    <script src="JS/jquery-3.6.0.min.js"></script>

    <script>
        $(".delete_btn").click(function(){

              $confirm = confirm('Do you want to delete user data?');

              if($confirm){
                 return true;
              }else{
                  return false;
              }

        });
    </script>


</body>
</html>