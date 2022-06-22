<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="center">
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "scolarite";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = $conn->query("SELECT * FROM Etudiant");

echo "<table border='1'>
<tr>
<th>Matricule</th>
<th>Nom</th>
<th>Prenom</th>
<th>note_module_1</th>
<th>note_module_2</th>
<th>note_module_3</th>

</tr>";

while($row = mysqli_fetch_array($result))
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
echo "</table>";

mysqli_close($conn);
?>
</div>
</body>
</html>