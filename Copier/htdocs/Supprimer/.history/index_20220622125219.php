<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="update.png">
    <link rel="apple-touch-icon" sizes="76x76" href="update.png">
    <link rel="alternate" type="application/rss+xml" href="rss">
</head>

<body>
    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Suppression d'étudiants</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <div class="alert alert-info alert-dismissable">
                    <?php
                    $servername = "localhost";
$username = "root";
$password = "";
$db = "scolarite";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
?>
                    <a class="panel-close close" data-dismiss="alert"></a>
                </div>
                <form class="form-horizontal" method="post" role="form">
                    <div class="form-group">
                        <label class="col-lg-3">Veuillez sélectionner l'étudiant à supprimer</label>
                        <div class="col-lg-8">
                            <select class="form-control">
                                <?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "scolarite";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if (mysqli_connect_errno()) 
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = $conn->query("SELECT * FROM Etudiant");
$i = 0;
while ($row = mysqli_fetch_array($result)) 
{
    echo "<option name = '$i'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
    $i++;
}
?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Soummetre</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <script type="text/javascript" src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>