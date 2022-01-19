<?php
// Check existence of id parameter before processing further

    // Include config file
    require_once "ConnectDB.php";

    // Prepare a select statement
    $read_query = "SELECT * FROM post WHERE id = '$_GET[id]'";
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
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: rgba(255, 250, 162, 0.55);
        }
        div {
            white-space: pre-line;
            /*overflow: scroll;*/
            text-overflow: inherit;
        }
    </style>
</head>
<body>
<a href="LandingPage.php" class="btn btn-success pull-left" style="margin: 10px">Back</a><br/><br/>
<div style="text-align: left; margin: 3% 5%">
    <form action="<?php $_PHP_SELF ?>" method="post" >

        <div style="width: 40%; height: fit-content%; background-color: #b5e3b5; padding: 0px 0px 15px 15px">
                Writer name:   <?php echo $writer_name ?>
        </div><br/><br/>
        <div style="width: 60%; height: fit-content; background-color: #e7de81; padding: 0px 0px 15px 15px"  >
            <tr>
                Title:   <?php echo $title ?>
            </tr>
        </div><br/><br/>
        <div style="width: 80%; height: fit-content; background-color: rgba(246,196,196,0.71); padding: 0px 0px 15px 15px">
            <tr>
               Body:   <?php echo $body ?>
            </tr>
        </div>

    </form>
</div>
</body>
</html>
