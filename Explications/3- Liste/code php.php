<!--
1- ouverture d'une connection: 
    - connection a la base de donnees en fournissant le nom du serveur de base de donnees, le nom d'utilisateur, le mot de passe et le nom de la base de donnees à laquelle on souhaite acceder.
    - ouverture de la connection avec ( new mysqli(+les parametres))
    - verification de la connection avec le serveur et la base de donnees.
2- Affichage du tableau
    -executions d'une requete pour obtenir touts les enregistements de la table etudiant
    - creation d'une table html pour l'affichage
    - definition de l'entete de la table etudiant nom prenom matricule ....etc.
    - affichage des enregistements sous forme de ligne de la tables definie
-->

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
//executions d'une requete pour obtenir touts les enregistements de la table etudiant
$result = $conn->query("SELECT * FROM Etudiant");
// creation d'une table html pour l'affichage.
echo "<table class='fl-table'>
<thead>
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>note_module_1</th>
        <th>note_module_2</th>
        <th>note_module_3</th>
    </tr>
</thead>
<tbody>";
//affichage des enregistements sous forme de ligne de la tables definie
while ($row = mysqli_fetch_array($result)) 
{
    echo "<tr>";
    echo "<td>" . $row['matricule'] . "</td>";
    echo "<td>" . $row['nom'] . "</td>";
    echo "<td>" . $row['prenom'] . "</td>";
    echo "<td>" . $row['note_module_1'] . "</td>";
    echo "<td>" . $row['note_module_2'] . "</td>";
    echo "<td>" . $row['note_module_3'] . "</td>";
    echo "</tr>";
}
echo "<tbody>
</table>";
//fermeture de la connection
mysqli_close($conn);
?>