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
        <h1 class="text-primary">Edit Profile</h1>
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
                        $conn = new mysqli($servername, $username, $password,$db);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $Matricule = $_POST['matricule']
                            $Nom = $_POST['nom'];
                            $Prenom = $_POST['prenom'];
                            $Module_1 = $_POST['module_1']
                            $Module_2 = $_post['module_2']
                            $Module_3 = $_POST['module_3']
                            $result = $conn->query("SELECT username, pword FROM users WHERE username = '$username' AND pword = '$password'");
                            if($result->num_rows == 0) {
                                echo "Username or password incorrect";
                            } else {
                                header("Location: /scolarite");
                                exit();
                            }
                        }
                        else {
                            echo "Please login to proceed.";
                        }
                    ?>
                    <a class="panel-close close" data-dismiss="alert"></a>
                </div>
                <h3>Personal info</h3>
                <form class="form-horizontal" method="post" role="form">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Matricule:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="matricule" type="text" placeholder="Exemple: 20160114202454104893247211, doit contenir 26 caractères" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nom:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="nom" type="text" placeholder="Exemple: Mohamed" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Prenom:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="prenom" type="text" placeholder="Exemple: Hamada" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Note module 1:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="module_1" type="number" placeholder="Exemple: 17, doit être inférieur ou égal à 20" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Note module 2:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="module_2" type="text" placeholder="Exemple: 17, doit être inférieur ou égal à 20" />
                        </div>
                    </div><div class="form-group">
                        <label class="col-lg-3 control-label">Note module 3:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="module_3" type="text" placeholder="Exemple: 17, doit être inférieur ou égal à 20" />
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