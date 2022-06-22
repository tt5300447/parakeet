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

$post = "mohamed";
echo verifyName($post);

?>

</body>
</html>