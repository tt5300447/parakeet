<!--
    ------------------------Explications-------------------------------
dans ce code:

1- ouverture d'une connection: 
    - connection a la base de donnees en fournissant le nom du serveur de base de donnees, le nom d'utilisateur, le mot de passe et le nom de la base de donnees à laquelle on souhaite acceder.
    - ouverture de la connection avec ( new mysqli(+les parametres))
    - verification de la connection avec le serveur et la base de donnees.
2- Traitement du formulaire:
    - on verifie si la methode est bien POST pour faire les traitement necéssaire.
    - si oui on recupere alors le nom d'utilisateur et le mot de passe
    - et on verifie si ils sont dans notre tables users pour garantir l'accees.
    - un message d'erreur s'affiche si le nom d'utilisateur ou le mot de passe sont erronée
    - on redirige la page vers /scolarite si les informations sont valides.

-->

<?php
// 1- ouverture d'une connection
// parametres de connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "scolarite";
// Creation de la connection
$conn = new mysqli($servername, $username, $password, $db);
// verifier de la connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2- Traitement du formulaire:
// on verifie si la methode est bien POST pour faire les traitement necéssaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // recuperation du nom d'utilisateur et du mot de passe
    $username = $_POST['username'];
    $password = $_POST['password'];
    // verification de l'existence de la pair dans la table users 
    $result = $conn->query("SELECT username, pword FROM users WHERE username = '$username' AND pword = '$password'");
    // si aucun resultat n'est retourné alors la pair n'existe pas --> erreur
    if ($result->num_rows == 0) {
        // affichage du message d'erreur
        echo "Username or password incorrect";
    }
    else {
        // redirection vers la page scolarite contenant les trois boutons
        header("Location: /scolarite");
        exit();
    }
}
else {
    echo "Veuillez vous connecter pour continuer";
}
?>