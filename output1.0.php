<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information
    </title>
</head>
<body>
    <h1>Informations</h1>

<?php
    
    class FormInfoClass {
        private $LastName;
        public function setLastName($name){
            $this->LastName = $name;
        }
        public function getLastName(){
            return $this->LastName;
        }

        private $FirstName;
        public function setFirstName($name){
            $this->FirstName = $name;
        }
        public function getFirstName(){
            return $this->FirstName;
        }

        private $MiddleInitial;
        public function setMiddleInitial($name){
            $this->MiddleInitial = $name;
        }
        public function getMiddleInitial(){
            return $this->MiddleInitial;
        }

        private $Age;
        public function setAge($name){
            $this->LastName = $name;
        }
        public function getAge(){
            return $this->Age;
        }

        private $Contact;
        public function setContact($name){
            $this->Contact = $name;
        }
        public function getContact(){
            return $this->Contact;
        }

        private $Email;
        public function setEmail($name){
            $this->Email = $name;
        }
        public function getEmail(){
            return $this->Email;
        }

        private $Address;
        public function setAddress($name){
            $this->Address = $name;
        }
        public function getAddress(){
            return $this->Address;
        }

        private $Username;
        public function setUsername($name){
            $this->Username = $name;
        }
        public function getUsername(){
            return $this->Username;
        }

        private $Password;
        public function setPassword($name){
            $this->Password = $name;
        }
        public function getPassword(){
            return $this->Password;
        }
    }

    $info = new FormInfoClass();
    $info->setLastName($_POST["last"]);
    $lastname = $info->getLastName();
    //echo "Last name: ".$lastname."<br>";

    $info->setFirstName($_POST["first"]);
    $firstname = $info->getFirstName();
    //echo "First name: ".$firstname."<br>";

    $info->setMiddleInitial($_POST["initial"]);
    $midddleinitial = $info->getMiddleInitial();
    //echo "Middle Initial: ".$midddleinitial."<br>";

    $info->setAge($_POST["age"]);
    $age = $info->getAge();
    //echo "Age: ".$age."<br>";

    $info->setContact($_POST["number"]);
    $contact = $info->getContact();
    //echo "Contact: ".$contact."<br>";

    $info->setEmail($_POST["email"]);
    $email = $info->getEmail();
    //echo "Email: ".$email."<br>";

    $info->setAddress($_POST["address"]);
    $address = $info->getAddress();
    //echo "Address: ".$address."<br>";

    $info->setUsername($_POST["username"]);
    $username = $info->getUsername();
    //echo "Username: ".$username."<br>";

    $info->setPassword($_POST["password"]);
    $password = $info->getPassword();
    //echo "Password: ".$password."<br>";
 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //check connection
    if (!$conn){
        die("Connection Failed " . mysqli_conenct_error());
    }


    //create database if it doesnt exist
    $sql = "CREATE DATABASE IF NOT EXISTS myDB";
    if (mysqli_query($conn, $sql)){
        echo "Database Created Successfully<br>";
    } else {
        echo "Error Creating Database " . mysqli_error($conn) . "\n";
    }

    //create table
    $createtb = "CREATE TABLE IF NOT EXISTS UserInfo (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        lastname VARCHAR(25) NOT NULL,
        firstname VARCHAR(25) NOT NULL,
        middleinitial VARCHAR(1) NOT NULL,
        age INT(3) NOT NULL,
        contact VARCHAR(25) NOT NULL,
        email email(25) NOT NULL,
        address VARCHAR(50) NOT NULL
        username VARCHAR(25) NOT NULL,
        password password(50) NOT NULL)";

    if (mysqli_query($conn, $createtb)){
        echo "Table Created Successfully<br>";
    } else {
        echo "Error Creating Table " . mysqli_error($conn) . "<br>";
    }

    //insert values

    $insert = "INSERT INTO UserInfo (lastname, firstname, middleinitial, age, contact, email, address, username, password)
    VALUES ('$lastname', '$firstname', '$midddleinitial', '$age', '$contact', '$email', '$address', '$username', '$password')";

    if(mysqli_query($conn, $insert)){
        echo "New Record Created Successfully<br><br>";
    } else {
        echo "Error: " .$insert. "" . mysqli_error($conn) . "<br>";
    }

    //select values 
    $select = "SELECT lastname, firstname, middleinitial, age, contact, email, username, address, username, password FROM UserInfo";
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