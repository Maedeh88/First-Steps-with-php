<html>
<?php error_reporting(E_ERROR | E_PARSE) ?>
<head>
    <style>
        body {
            background-color: #243812;
        }

        input {
            width: 40%;
            height: 10%;
        }
    </style>
</head>

<body>
<div style="text-align: center; margin-top: 10%">
    <form action="<?php $_PHP_SELF ?>" method="post">
        <input type="text" name="title" placeholder="Enter the title of the file you want to edit" required>
        <br/><br/>

        <input type="submit" name="edit" value="Edit" style="width: 12%; background-color: #FFFBCC"/>
    </form>
</div>
</body>
</html>


<?php

if (isset($_POST["edit"])) {
    if ($_POST["title"] != null) {
        session_start();
        $_SESSION['title'] = $_POST["title"];
        header('location: Update.php');
    }


}

