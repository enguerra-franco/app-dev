<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="output1.0.php" method="post">
        User Name: <input type="text" name="username" required>
            <span class="error">*<?php echo $usernameErr; ?> </span><br>

        Password: <input type="password" name="password" required> 
            <span class="error">*<?php echo $passwordErr; ?> </span><br>

        <input type="submit">
    </form>


<?php
    $select = "SELECT username, password FROM UserInfo";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Last Name: " . $row["lastname"]. "<br>" . 
        "First Name: " . $row["firstname"]. "<br>".
        "Middle Initial: " . $row["middleinitial"]. "<br>" .
        "Age: " . $row["age"]. "<br>" . 
        "Contact: " . $row["contact"]. "<br>" . 
        "Email: " . $row["email"]. "<br>" . 
        "Address: " . $row["address"]. "<br>" . 
        "Username: " . $row["username"]. "<br>" . 
        "Password: " . $row["Password"]. "<br>" . 
        "<br>";
    }
    } else {
        echo "0 results";
    }
    ?>
</body>
</html>