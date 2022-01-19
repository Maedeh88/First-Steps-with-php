<?php
error_reporting(E_ERROR | E_PARSE);
require_once "ConnectDB.php";

$title = "";
$writer_name = "";
$body = "";

//echo $title . " this is title";
$read_query = "SELECT * FROM post
                WHERE id = '$_GET[id]'";
if ($conn->query($read_query) == TRUE) {
    if (mysqli_num_rows($conn->query($read_query)) > 0) {
        $row = mysqli_fetch_row($conn->query($read_query));
        $writer_name = $row[1];
        $title = $row[2];
        $body = $row[3];
    } else {
        echo "There is not a data with this title";
    }
}
?>

<html>
<?php
?>
<head>
    <style>
        body {
            background-color: rgba(255, 250, 162, 0.55);
        }

        input {
            height: 7%;
        }
    </style>
</head>
<body>
<div style="text-align: center; margin: 3% 5%">
    <form action="<?php $_PHP_SELF ?>" method="post">

        <textarea name="title" rows="2" style="width: 40%; height: 6%" required"><?php echo $title ?></textarea>
        <br/><br/>
        <textarea name="body" rows="20" style="width: 80%" required> <?php echo $body ?> </textarea><br/><br/>
        <input type="text" name="writername" value="<?php echo $writer_name ?>" required><br/><br/>

        <input type="submit" name="edit" value="Edit">

    </form>
</div>
</body>
</html>

<?php
//$query = "ALTER TABLE POST (writername, title, body) VALUES ('$_POST[writername]', '$_POST[title]', '$_POST[body]')";
$query = "UPDATE post SET title = '$_POST[title]',
                body = '$_POST[body]', 
                writername = '$_POST[writername]'
                WHERE id= '$_GET[id]'";

if (isset($_POST['edit'])) {
    if ($conn->query($query) == TRUE) {
//        echo "your data has been updated";
        header('location: LandingPage.php');
    } else {
        echo "ERROR";
    }
}








