<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Amal
 * Date: 8/7/2018
 * Time: 4:01 PM
 */
$username="";
$email="";
$errors=array();
$image="";
$db=mysqli_connect('localhost','root','','registration');
if(isset($_POST['register'])){
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $confirm_password=mysqli_real_escape_string($db,$_POST['confirm_password']);



    if(empty($username)){
        array_push($errors,"Username is required");
    }
    if(empty($email)){
        array_push($errors,"Email is required");

    }
    if(empty($password)){
        array_push($errors,"Password is required");

    } if(empty($confirm_password)){
        array_push($errors,"Confirm Password is required");

    }
    if(!empty($password)&& !empty($confirm_password)&& $password!=$confirm_password){

        array_push($errors,"The two passwords dont match");

    }
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
        array_push($errors,"User name  is not valid,Only letters allowed");

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors,"Invalid email format");

    }

        // if email already exists
    $sql= "SELECT * FROM users where email='$email'";
    $result=mysqli_query($db,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows >= 1)
        array_push($errors,"email exists");

//Upload image
    $file=$_FILES['image']['tmp_name'];

    if(empty($file))
         array_push($errors,"please select an image");

    else
    {
        $image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name=addslashes($_FILES['image']['name']);
        $image_type=$_FILES['image']['type'];
        // Validation extention image
        if($image_type!="image/jpeg"&&$image_type!="image/png"&&$image_type!="image/gif"){
            array_push($errors,"Thats not an image");

        }

    }


        if(count($errors)==0){

        $passwordEncrypted=md5($password);

        if ($db->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            $sql="INSERT INTO users (username, email,password,image)
          VALUES('$username','$email','$passwordEncrypted','$image')";

            mysqli_query($db,$sql);
            $_SESSION['email']=$email;
            $_SESSION['image']=$image;
            $_SESSION['success']="You are now logged in";
            header('location: index.php');

                             }
} //End REgister
if(isset($_POST['login'])){
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    if(empty($email)){
        array_push($errors,"Email is required");
    }

    if(empty($password)){
        array_push($errors,"Password is required");

    }



    if(count($errors)==0){

        $passwordEncrypted=md5($password);
        $sql="SELECT * FROM users WHERE email='$email' AND password='$passwordEncrypted'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)==1) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";

            header('location: index.php');
        }

    }

}
if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');
}

?>