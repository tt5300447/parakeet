<!--
    1- ouverture d'une connection:
        - connection a la base de donnees en fournissant le nom du serveur de base de donnees, le nom d'utilisateur, le mot de passe et le nom de la base de donnees à laquelle on souhaite acceder.
        - ouverture de la connection avec ( new mysqli(+les parametres))
        - verification de la connection avec le serveur et la base de donnees.
    2- Preparation du formulaire:
        - recuperation de tout les etudiant existant dans la tables etudiant
        - les afficher sous forme d'options dans un select html du formulaire
        - chaque options est un etudiant (nom et prenom) et dont la valeur est le matricule pour faciliter le traitement.
-->

<?php
//    1- ouverture d'une connection:
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
//     2- Preparation du formulaire:
//recuperation de tout les etudiant existant dans la tables etudiant
$result = $conn->query("SELECT * FROM Etudiant");
//les afficher sous forme d'options dans un select html du formulaire.
while ($row = mysqli_fetch_array($result)) 
{
    //chaque options est un etudiant (nom et prenom) et dont la valeur est le matricule pour faciliter le traitement.
    echo "<option value = '" . $row['matricule'] . "'>" . $row['nom'] . " " . $row['prenom'] . "</option>";
}
?>

<!--
    dans ce code
    1- ouverture d'une connection: 
        - connection a la base de donnees en fournissant le nom du serveur de base de donnees, le nom d'utilisateur, le mot de passe et le nom de la base de donnees à laquelle on souhaite acceder.
        - ouverture de la connection avec ( new mysqli(+les parametres))
        - verification de la connection avec le serveur et la base de donnees.
    2- Traitement du formulaire:
        - on verifie si la methode est bien POST pour faire les traitement necéssaire.
        - on recupere le matricule de l'etudiant selectionne
        - on supprime l'etudiant dont le matricule est celui selectionné de la table etudiant
-->

<?php
// 1- ouverture d'une connection: 
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
//  2- Traitement du formulaire:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // on recupere le matricule de l'etudiant selectionne
    $matricule = $_POST['etudiant'];
    //on supprime l'etudiant dont le matricule est celui selectionné de la table etudiant
    $sql = "DELETE FROM etudiant WHERE matricule = $matricule";
    if ($conn->query($sql) === TRUE) {
        echo "Etudiant supprimer avec succés";
    }
    else {
        echo "Erreur: veuillez réessayer plus tard";
    }

}
?>

