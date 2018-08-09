<?php  include('server.php');

if(!empty($_SESSION['email'])){
    header('location: index.php');
}?>
<?php include ('errors.php');?>
<!DOCTYPE html>
<html>
<head>
  <title> Registration Form</title>
</head>

<body>
<form method="post" action="registrationUI.php"  enctype="multipart/form-data">
    <table width="100%" cellpadding="7" cellspacing="0" border="0">
        <tr>
            <td colspan="3"><center><strong>Register </strong></center><br /></td><br />
        </tr>

        <table border="0" align="center" cellpadding="0" cellspacing="0" width="300">

        <tr>
            <td width="30%">User Name</td>
            <td>:</td>
            <td width="60%"><input type="text" name="username" value="<?php echo $username;?>" /></td>


        </tr>

        <tr>
            <td width="30%">Email</td>
            <td width="10%">:</td>
            <td width="60%"><input type="text" name="email" value = "<?php echo $email;?>"/></td>
        </tr>

        <tr>
            <td width="30%">Password</td>
            <td width="10%">:</td>
            <td width="60%"><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td width="10%">:</td>
            <td width="60%"><input type="password" name="confirm_password" /></td>
        </tr>



            <!-- upload image-->
            <tr>
                <td width="60%"><input type="file" name="image" id="image"></td>


            </tr>



            <!-- end uploading-->


        <tr>
            <td width="30%">
           <button  type="submit" name="register">Register </></button>
            </td>
        </tr>



        </table>

        <p><center> Already a member? <a href="login.php"> Sign in</a> </center>

        </table>
</form>


</body>

</html>
