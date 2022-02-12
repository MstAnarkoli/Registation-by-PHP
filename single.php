<?php 
include_once "./autoload.php"; 

$user_id = $_GET['user_id'] ?? false ;

if( $user_id ){

    $data = connect() -> query("SELECT * FROM friends WHERE id='$user_id' ");

    $user_data = $data -> fetch_object();

    if( $user_data -> name == ''){

        header('location:users.php');
    }

}else{
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
	
	<div class="single_user my-5">

        <div class="container">
        
        <div class="row">
            <div class="col-md-6 offset-md-4 text-center ">
            
            <div class="card" style="width: 25rem; background-color:#6dd5ed;">
            <h2><?php echo $user_data -> name ?></h2>
            <img src="./Image/<?php echo $user_data -> photo ?>" class="card-img-top user_image" style="height: 26rem;"alt="...">
            <div class="card-body">
                <h5 class="card-title">Contact: <?php echo $user_data -> cell ?></h5>
                <p class="card-text">Email: <?php echo $user_data -> email ?></p>
                <p class="card-text">Location: <?php echo $user_data -> location ?></p>
                <p class="card-text">User Name: <?php echo $user_data -> username ?></p>
                
                <a href="./users.php" class="btn btn-primary">Back</a>
            </div>
        </div>
            </div>
        </div>
        </div>
    </div>

	







	<!-- JS FILES  -->
	
	<script src="JS/bootstrap.bundle.min.js"></script> 
    <script src="JS/jquery-3.6.0.min.js"></script>

   


</body>
</html>