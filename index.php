<?php
include './includes/connection.php';
include './includes/form.php';

$sql = 'SELECT * FROM `users`';
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo '<pre>';
// print_r($users);
// echo '</pre>';

include './includes/db_close.php';
?>

<?php include_once './includes/header.php';?>
    <div class="container">
        <div class="title">Login</div>
        <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details" >First Name</span>
                    <input type="text" name="firstName" id="firstName" placeholder="First name" value="<?php echo $firstName ?>">
                    <div class="error"> <?php echo $errors['firstNameError'] ?></div>
                </div>
                <div  class="input-box">
                <span class="details" >Last Name</span>
                    <input class="input-box" type="text" name="lastName" id="lastName" placeholder="Last name" value="<?php echo $lastName ?>">
                    <div class="error"><?php echo $errors['lastNameError'] ?></div>
                </div>
                <div class="input-box">
                <span class="details" >Email</span>
                    <input class="input-box" type="text" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
                    <div class="error"><?php echo $errors['emailError'] ?></div> 
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="send">
                </div>
            </div>
        </form>
    </div>
<?php include_once './includes/footer.php';?>