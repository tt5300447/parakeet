<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function verifyName($nom)
{
    $valid = true;
    if (strlen($nom) > 80 || strlen($nom) < 5) {
        $valid = false;
    }
    $nom = str_split($nom);
    foreach ($nom as $char) {
        if (is_numeric($char) == true) {
            $valid = false;
        }
    }
    return $valid;
}
function verifyMatricule($Matricule)
{
    if (strlen($Matricule) != 26) {
        return false;
    }
    $Matricule = str_split($Matricule);
    foreach ($Matricule as $char) {
        if (is_numeric($char) == false) {
            return false;
        }
    }
    return true;
}
function verifyDate($Date)
{
    $Date = date('m-d-Y', strtotime($Date));
    $date_max = date('m-d-Y');
    $date_min = date('m-d-Y', strtotime('01-01-1990'));
    if ($Date > $date_max || $Date < $date_min) {
        return false;
    }
    return true;
}

function verifyNoteModule($Module_1, $Module_2, $Module_3)
{
    $Module_1 = intval($Module_1);
    $Module_2 = intval($Module_2);
    $Module_3 = intval($Module_3);
    if ($Module_1 > 20 || $Module_1 < 0) {
        return false;
    }
    if ($Module_2 > 20 || $Module_2 < 0) {
        return false;
    }
    if ($Module_3 > 20 || $Module_3 < 0) {
        return false;
    }
    return true;
}

$post = "15";
$post1 = "15";
$post2 = "15";
echo verifyNoteModule($post, $post1, $post2);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Matricule = $_POST['matricule'];
    $Nom = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $Module_1 = $_POST['module_1'];
    $Module_2 = $_POST['module_2'];
    $Module_3 = $_POST['module_3'];
    $dn = $_POST['date_naissance'];
    echo $dn . "\n";
    echo verifyName($Nom) . "\n" . verifyName($Prenom) . "\n" . verifyMatricule($Matricule) . "\n" . verifyNoteModule($Module_1, $Module_2, $Module_3);
}
?>
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
                        <label class="col-lg-3 control-label">Date de naissance:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="date_naissance" type="date" placeholder="" />
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
                            <input class="form-control" name="module_2" type="number" placeholder="Exemple: 17, doit être inférieur ou égal à 20" />
                        </div>
                    </div><div class="form-group">
                        <label class="col-lg-3 control-label">Note module 3:</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="module_3" type="number" placeholder="Exemple: 17, doit être inférieur ou égal à 20" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Soummetre</button>
                </form>
</body>
</html>