<html>
<?php
error_reporting(E_ERROR | E_PARSE);
?>
<head>
    <style>
        body {
            background-color: rgba(255, 250, 162, 0.55);
        }
        input{
            height: 7%;
        }
    </style>
</head>
<body>
<div style="text-align: center; margin: 3% 5%">
    <form action="<?php $_PHP_SELF ?>" method="post">
        <input type="text" name="writername" placeholder="Enter your name" required><br/><br/>

        <textarea name="title" placeholder="Title" rows="2" style="width: 40%; height: 6%" required></textarea><br/><br/>

        <textarea name="body" placeholder="Write your text here" rows="20" style="width: 80%" required></textarea><br/><br/>


        <input type="submit" name="create" value="Create">

    </form>
</div>



</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "USERS";
// Create connection
$connection = new mysqli($servername, $username, $password, $database);
$query = "INSERT INTO post (writername, title, body) VALUES ('$_POST[writername]', '$_POST[title]', '$_POST[body]')";
if (isset($_POST["create"])) {
    if ($connection->query($query) == TRUE) {
//        echo "your data has been recorded";
        session_start();
        $_SESSION['output'] = "your data has been recorded";
        header('location: LandingPage.php');
    } else {
        echo "ERROR";
    }
}

