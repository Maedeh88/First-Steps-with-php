<html>
<?php
error_reporting(E_ERROR| E_PARSE);
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            /*width: 600px;*/
            margin: 3% 3%;
        }
        table {
            font-size: 14px;
            table-layout:fixed;
        }
        td
        {
            /*max-width: 100px;*/
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #adecad;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h2 class="pull-left">Document Details</h2>
        <a href="Create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New File</a>
    </div>
    <?php
    // Include config file
    require_once "ConnectDB.php";


    // Attempt select query execution
    $sql = "SELECT * FROM POST";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped">';
            echo "<thead>";
            echo "<tr>";
            echo "<th style='width: 5%; text-align: left'>#</th>";
            echo "<th style='width: 15%; text-align: left'>WriterName</th>";
            echo "<th style='width: 25%; text-align: left'>Title</th>";
            echo "<th style='width: 45%; text-align: left'>Body</th>";
            echo "<th style='width: 10%; text-align: left'>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td style='width: 5%; text-align: left'><div style='height: 30px'>" . $row['id'] . "</div></td>";
                echo "<td style='width: 15%; text-align: left'><div style='height: 30px'>" . $row['writername'] . "</div></td>";
                echo "<td style='width: 45%; text-align: left'><div style='height: 30px'>" . $row['title'] . "</div></td>";
                echo "<td style='width: 10%; text-align: left'><div style='height: 30px'>" . $row['body'] . "</div></td>";
                echo "<td>";
                echo '<a href="Read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye" ></span></a>';
                echo '<a href="Update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                echo '<a href="Delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close connection
    mysqli_close($conn);
    ?>

</div>


</body>
</html>
