

<?php
require_once "ConnectDB.php";
$query = "DELETE FROM post WHERE id ='$_GET[id]'";
$query2 = "ALTER TABLE post AUTO_INCREMENT = 1";
if ($conn ->query($query) == TRUE && $conn -> query($query2)){
    $output =  "your file has removed!";
}
else{
    $output = "Something is wrong!";
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            background-color: #FFFBCC;
        }
    </style>

</head>
<body>
<a href="LandingPage.php" class="btn btn-success pull-left" style="margin: 10px">Back</a><br/><br/>

<div style=" padding: 30px">
    <h3>
        <?php echo $output?>
    </h3>
</div>


</body>
</html>
