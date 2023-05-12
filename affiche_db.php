
<?php
include "db_conn.php";

// Requête SQL pour récupérer toutes les données de la table "users"
$sql = "SELECT * FROM id";
$result = mysqli_query($conn, $sql);

// Vérification du nombre de résultats
if (mysqli_num_rows($result) > 0) {
    // Affichage des données dans un tableau HTML
    echo "<table><tr><th>id</th><th>username</th><th>name</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['name']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);


?>