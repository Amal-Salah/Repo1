<?php include ('server.php');
if(!empty($_SESSION['email'])){
header('location: index.php');
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="300">
    <tr>
        <td>
            <form method="post" action="login.php">
                <?php include ('errors.php');?>
                <table width="100%" cellpadding="7" cellspacing="0" border="0">
                    <tr>
                        <td colspan="3"><center><strong>Login </strong></center><br /></td><br />
                    </tr>

                    <tr>
                        <td width="30%">Email</td>
                        <td width="10%">:</td>
                        <td width="60%"><input type="text" name="email" /></td>
                    </tr>



                    <tr>
                        <td width="30%">password</td>
                        <td width="10%">:</td>
                        <td width="60%"><input type="password" name="password" /></td>
                    </tr>



                    <tr>
                        <td colspan="3"><center><input type="submit" name="login" /></center><br /></td>
                    </tr>
                </table>
                <p><center> new user? <a href="registrationUI.php"> Sign Up</a> </center>

                </p>
            </form>
        </td>
    </tr>
</table