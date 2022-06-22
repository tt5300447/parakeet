<!--
    dans ce code:
    1- Definition de 4 fonctions:
        - verifyName($nom): qui verifie que le nom(prenom) est ecrit avec des lettres uniquement aucun numero ou caracteres special, et que qu'il comporte plus de 3 lettres et moins de 80 lettre.
        - verifyMatricule($Matricule): qui verifie que le matricule est ecrit avec 26 carateres numerique.
        - VerifyNoteModule($Module_1, $Module_2, $Module_3): verifie que les notes sont entre 0 et 20 et sont des caracteres numerique.
        -verifyDate($Date): verifie si la date est valide d'un point de vue logique.
    2- ouverture d'une connection: 
        - connection a la base de donnees en fournissant le nom du serveur de base de donnees, le nom d'utilisateur, le mot de passe et le nom de la base de donnees à laquelle on souhaite acceder.
        - ouverture de la connection avec ( new mysqli(+les parametres))
        - verification de la connection avec le serveur et la base de donnees.
    3- Traitement du formulaire:
        - on verifie si la methode est bien POST pour faire les traitement necéssaire.
        - verfie la validité des donnees.
        - on ajoute les donnees de l'etudiant dans la table etudiant.
        - on affiche un message d'erreur ou de succés en fonction du resultat.
-->


<?php
//    1- Definition de 4 fonctions:
function verifyName($nom)
{
    $valid = true;
    if (strlen($nom) > 80 || strlen($nom) < 3) {
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
function verifyDate($Date)
{
    $Date = date('m-d-Y', strtotime($Date));
    $date_max = date('m-d-Y');
    $date_min = date('m-d-Y', strtotime('01-01-1990'));
    if ($Date > $date_max || $Date < $date_min) {
        return false;
    }
    else {
        return true;
    }
}
//    2- ouverture d'une connection: 
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
//    3- Traitement du formulaire:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //recuperation du formulaire
    $matricule = $_POST['matricule'];
    $Nom = $_POST['nom'];
    $date = $_POST['date_naissance'];
    $Prenom = $_POST['prenom'];
    $Module_1 = $_POST['module_1'];
    $Module_2 = $_POST['module_2'];
    $Module_3 = $_POST['module_3'];
    // verification de la validite des donnees affichage d'une erreur s'ils ne sont pas valide.
    if (verifyName($Nom) == false ||
    verifyName($Prenom) == false ||
    verifyMatricule($matricule) == false ||
    verifyNoteModule($Module_1, $Module_2, $Module_3) == false ||
    verifyDate($date) == false) {
        echo "Erreur: les données saisies sont erronées";
    }
    else {
        $Module_1 = intval($Module_1);
        $Module_2 = intval($Module_2);
        $Module_3 = intval($Module_3);
        // requete pour l'ajout d'un enregistrement dans la table etudiant
        $sql = "INSERT INTO Etudiant (matricule, nom, prenom,date_naissance, note_module_1, note_module_2, note_module_3) VALUES ($matricule,'" . $Nom . "','" . $Prenom . "', '" . $date . "', $Module_1, $Module_2, $Module_3)";
        // si la requete s'execute et que l'etudiant est ajputé alors succés sinon erreur
        if ($conn->query($sql) === TRUE) {
            echo "Etudiant ajouté avec succés";
        }
        else {
            echo "Erreur: les données saisies sont erronées";
        }
    }
}
?>