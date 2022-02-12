
<?php 
include_once "./autoload.php";



// Edit User Data 

$edit_id = $_GET['edit_id'] ?? false ;

if( $edit_id ){

    $data = connect() -> query("SELECT * FROM friends WHERE id='$edit_id' ");

    $edit_user_data = $data -> fetch_object();

    if( $edit_user_data -> name == ''){

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $edit_user_data -> name;?></title>
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
    $updated_at_data = date('Y-m-d H:i:s');
       

    $email_check = emailCheck($email) ? '' : '<span style="color:red;"> *Required </span>' ;
     

    if( empty($name) || empty($email) || empty($cell) || empty($uname) ){
    $msg = validate('All fields are required!');
   
}else if( emailCheck($email) == false){
    $msg =validate('Invalid Email!', 'warning');
    
   
}else{

    $updated_image = '';
    if(!empty($_FILES['new-image']['name'])){

        $updated_image = imageUpload($_FILES['new-image'], 'Image/');
    }else{
        $updated_image = $edit_user_data -> photo;

    }



    connect() -> query("UPDATE friends SET name='$name', email= '$email', location='$location', cell='$cell', username='$uname', photo='$updated_image', updated_at='$updated_at_data' WHERE id='$edit_id'");
    $msg = validate('Data Updated Successful');
    
    $data = connect() -> query("SELECT * FROM friends WHERE id= '$edit_id'");

    $edit_user_data = $data -> fetch_object();
}
}    
    
    
    ?>

    <div class="card shadow">
    <div class="card-header">
        <h3 class="card-title">Update <?php echo  $edit_user_data -> name;?>'s Data</h3>
    </div>
    <div class="card-body">
    
    <?php
    echo $msg ?? '';
    ?>
        <form action="" method="POST" enctype="multipart/form-data" >
            <div class="form-group">
                <label for=""> Name</label>
                <input name="name" type="text" value ="<?php echo  $edit_user_data -> name;?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" value ="<?php echo  $edit_user_data -> email;?>" class="form-control">

                <?php echo $email_check ?? ''; ?>

            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input name="location" type="text" value ="<?php echo  $edit_user_data -> location;?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Cell</label>
                <input name="cell" type="text" value ="<?php echo  $edit_user_data -> cell;?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="">User Name</label>
                <input name="username" type="text" value ="<?php echo  $edit_user_data -> username;?>"  class="form-control">
            </div><Br>
            <div class="form-group">
                <img class="previous-image" style="height:150px;width:auto;" src="Image/<?php echo  $edit_user_data -> photo;?>" alt="">

                <img id="preview" style="max-width:100%;" src="" alt="">
                <label for=""><h5>Select Your Photo</h5> </label>
               
                <input style="display:none;"name="new-image" type="file"  class="form-control" id="image" >
                <label for="image"><img style="width:35px;"src="camera.png"></label>
            </div> 
            
            <div class="form-group">
                <input name="check" type="checkbox" id="check"> <label for="check">Accept all rules</label> 

            </div> <Br>
            <div class="form-group">               
                <input name="submit" type="submit" class ="btn btn-primary" value="Update">
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
$('#image').change(function(){
    $('.previous-image').hide();
});


</script>
    
</body>
</html>