<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

$errors =[
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if (isset($_POST['submit'])) {
    // to not accept script in the input
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users(firstName, lastName, email)
    VALUES ('$firstName', '$lastName', '$email')";

    if (empty($firstName)) {
        $errors['firstNameError'] = 'you can not keep first name field empty';
    }if (empty($lastName)) {
        $errors['lastNameError'] = 'you can not keep last name field empty';
    }if (empty($email)) {
        $errors['emailError'] = 'you can not keep email field empty';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'please enter a valid email';
    }else {
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            header('Location: ' . $server['PHP_SELF']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
