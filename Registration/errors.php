<?php
/**
 * Created by PhpStorm.
 * User: Amal
 * Date: 8/7/2018
 * Time: 4:18 PM
 */
if(count($errors) >0 ): ?>

<?php foreach($errors as $error): ?>
<p> <?php echo  $error; ?> </p>
<?php endforeach ?>
<?php endif ?>

