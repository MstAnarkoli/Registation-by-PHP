<?php



/**function database connection */
function connect(){
    return new mysqli(HOST, USER, PASS, DB);
}


/**function Validation */
function validate($msg, $type = "danger"){
    return "<p class=\"alert alert-{$type}\"> {$msg} <button data-dismiss=\"alert\" class=\"close\">&times;</button></p>";
}
/**function email check */
function emailCheck($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

/**function old form data */
function old($key){
   return $_POST[$key] ?? '';
}

/**function form data clear */
function formClear(){
    echo $_POST = '';
}

/**Function Image Upload */

function imageUpload($file_data, $path = '/'){

/**file information */
$file_name = $file_data['name'];
$file_tmp_name = $file_data['tmp_name'];

move_uploaded_file($file_tmp_name, $path .$file_name);

return $file_name;

}



