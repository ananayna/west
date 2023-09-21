<?php 

session_start();
$errors=[];


//validate name

$name = strlen(trim($_REQUEST["name"]));
if(empty($name)){
    $errors["name_error"]= "enter name.";
}
else{
    if($name > 10){
        $errors["name_error"]= "name must be 10 word.";
    }
}
//echo "<br><br>";

//validate email

$email = strlen(filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL));

if($email > 250){
    $errors["email_error"]= "invalid email";
}
    
// else{
//     echo "valid - ".$_REQUEST["email"];
// }

//echo "<br><br>";

//validate number

if(strlen($_REQUEST["phone"])>13){
    $errors["phone_error"]= "phone number must be 11 digit.";
}else if (!is_numeric($_REQUEST["phone"])){
    $errors["phone_error"]= "plz enter a number.";
}else if(!preg_match("/^(?:\+88|88)?(01[3-9]\d{8})$/", $_REQUEST["phone"])){
    $errors["phone_error"]= "Invalid number";
}
else{
    if(empty($_REQUEST["phone"])){
        $errors["phone_error"]= "enter phone number.";
    }
}
//echo "<br><br>";

//password validate

if(!empty($_REQUEST["pass"]) && ($_REQUEST["pass"] == $_REQUEST["cpass"])) {

    if (strlen($_REQUEST["pass"]) < 8) {
        $errors["pass_error"]= "Your Password Must Contain At Least 8 Characters!";
    }elseif(!preg_match("#[0-9]+#",$_REQUEST["pass"])) {
        $errors["pass_error"]= "Your Password Must Contain At Least 1 Number!";
    }elseif(!preg_match("#[A-Z]+#",$_REQUEST["pass"])) {
        $errors["pass_error"]= "Your Password Must Contain At Least 1 Capital Letter!";
    }elseif(!preg_match("#[a-z]+#",$_REQUEST["pass"])) {
        $errors["pass_error"]= "Your Password Must Contain At Least 1 Lowercase Letter!";
    }// else {
    //     echo "Confirmed Your Password.";
    // }
}else{
    $errors["pass_error"]= "password no match.";
}

// echo "<pre>";
//     print_r($errors);
// echo "</pre>";
// echo $errors['phone_error'];

if (count($errors)>0){
    $_SESSION = $errors;
    header("location: ./../cl8hw.php");
}else{
    echo "go to database.";
}