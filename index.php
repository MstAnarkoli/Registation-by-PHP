
<?php 
include_once "./autoload.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="user-form w-25 mx-auto my-5">
    <a class="btn btn-primary" href="./users.php">ALL FRIENDS</a>
    <Br><Br>

    <?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $cell = $_POST['cell'];
    $uname = $_POST['username'];
    
       

    $email_check = emailCheck($email) ? '' : '<span style="color:red;"> *Required </span>' ;
     

    if( empty($name) || empty($email) || empty($cell) || empty($uname) ){
    $msg = validate('All fields are required!');
   
}else if( emailCheck($email) == false){
    $msg =validate('Invalid Email!', 'warning');
    
   
}else{

    $file_name = imageUpload($_FILES['image'], 'Image/') ?? '';

    connect() -> query("INSERT INTO friends (name, email, location, cell, username, photo) VALUES ('$name', '$email', '$location', '$cell', '$uname', '$file_name ' )");

   
    
    $msg =validate('Thank you for registration!', 'success');
    formClear();
    
}
}    
    
    
    ?>

    <div class="card shadow">
    <div class="card-header">
        <h2 class="card-title">Registration Form</h2>
    </div>
    <div class="card-body">
    
    <?php
    echo $msg ?? '';
    ?>
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for=""> Name</label>
                <input name="name" type="text" value ="<?php echo old('name');?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" value ="<?php echo old('email');?>" class="form-control">

                <?php echo $email_check ?? ''; ?>

            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input name="location" type="text" value ="<?php echo old('location');?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Cell</label>
                <input name="cell" type="text" value ="<?php echo old('cell');?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <input name="username" type="text" value ="<?php echo old('username');?>"  class="form-control">
            </div><Br>
            <div class="form-group">
                <img id="preview" style="height:150px;width:auto;"  src="" alt="">
                <label for=""><h5>Select Your Photo</h5> </label>
               
                <input style="display:none;"name="image" type="file"  class="form-control" id="image" >
                <label for="image"><img style="width:35px;"src="camera.png"></label>
            </div> 
            
            <div class="form-group">
                <input name="check" type="checkbox" id="check"> <label for="check">Accept all rules</label> 

            </div> <Br>
            <div class="form-group">               
                <input name="submit" type="submit" class ="btn btn-primary" value="Sign Up">
            </div>
        </form>
    
    </div>
</div>
<script src="JS/bootstrap.bundle.min.js"></script> 
<script src="JS/jquery-3.6.0.min.js"></script>
<script>
$('#image').change(function(e){
        let url = URL.createObjectURL(e.target.files[0]);
        $('#preview').attr('src', url);
    });
</script>
    
</body>
</html>