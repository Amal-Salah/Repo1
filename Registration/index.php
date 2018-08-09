<?php include('server.php');
if(!isset($_SESSION['email'])){
    header('location: login.php');
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" width="300">
    <tr>
        <td>
                    <tr>
                        <td colspan="3"><center><strong>Home Page </strong></center><br /></td><br />
                    </tr>

                    <tr>
                        <?php if(isset($_SESSION['success'])):?>
                        <td width="60%"><?php echo $_SESSION['success'];
                        unset($_SESSION['success']);

                        ?> </td>
                        <?php endif; ?>
                    </tr>


                      <tr>
                         <?php if(isset($_SESSION['email'])):?>
                            <td width="60%"><?php echo $_SESSION['email'];?>
                                <?php
                                $email= $_SESSION['email'];
                                echo "<p/> Your image:<p /><img src=getPic.php?emailR=$email> ";

                                ?>
                                <p><a href="index.php?logout='1'" style="color: red;"> Logout</a></p>
                            </td>
                            <?php endif; ?>
                         </tr>






    </td>
    </tr>
</table