<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php
    $lastErr = "";
    $firstErr = "";
    $initialErr = "";
    $ageErr = "";
    $noErr = "";
    $emailErr = "";
    $addErr = "";
    $usernameErr = "";
    $passwordErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["last"])) {
                $lastErr = "Last Name is required!";
            }

            if (empty($_POST["first"])) {
                $firstErr = "First Name is required!";
            }

            if (isset($_POST["initial"])) {
            $initial = initial_input($_POST["initial"]);
            }

            if (empty($_POST["age"])) {
            $ageErr = "Age is required!";
            } 

            if (empty($_POST["number"])) {
            $noErr = "Contact Number is required!";
            } 

            if (empty($_POST["email"])) {
            $emailErr = "Email is required!";
            } 
            if (empty($_POST["address"])) {
            $addErr = "Address is required!";
            } 

            if (empty($_POST["username"])) {
                $usernameErr = "UserName is required!";
            } 
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required!";
            } 
        }
    ?>

    <form action="login.php" method="post">
        Last Name: <input type="text" name="last" required>
            <span class="error">*<?php echo $lastErr; ?> </span><br>

        First Name: <input type="text" name="first" required> 
            <span class="error">*<?php echo $firstErr; ?> </span><br>

        Middle Initial: <input type="text" name="initial" required> <br>

        Age: <input type="text" name="age" required>
            <span class="error">*<?php echo $ageErr; ?> </span><br>

        Contact: <input type="text" name="number" required> 
            <span class="error">*<?php echo $noErr; ?> </span><br>

        Email: <input type="email" name="email" required> 
            <span class="error">*<?php echo $emailErr; ?> </span><br>

        Address: <input type="text" name="address" required>
            <span class="error">*<?php echo $addErr; ?> </span><br>

        User Name: <input type="text" name="username" required>
            <span class="error">*<?php echo $usernameErr; ?> </span><br>

        Password: <input type="password" name="password" required> 
            <span class="error">*<?php echo $passwordErr; ?> </span><br>
        <input type="submit">
    </form>
    
</body>
</html>