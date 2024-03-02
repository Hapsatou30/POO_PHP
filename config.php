<?php
require_once("Utilisateur.php");

// Paramètres de connexion
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "poo_pdo";

// Définir une variable pour stocker les messages d'erreur
$erreur = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['charger'])) {
    try {
        // Connexion à la base de données avec MySQLi
        $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

        // Vérification de la connexion
        if ($connexion->connect_error) {
            die("Erreur de connexion : " . $connexion->connect_error);
        }

        // Récupérer les données du formulaire
        $nom1 = $_POST['nom'];
        $prenom1 = $_POST['prenom'];
        $email1 = $_POST['email'];
        $message1 = $_POST['message'];

        // Préparation de la requête d'insertion
        $requete = "INSERT INTO utilisateur(nom, prenom, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $connexion->prepare($requete);

        // Vérification de la préparation de la requête
        if ($stmt) {
            $stmt->bind_param("ssss", $nom1, $prenom1, $email1, $message1);

            // Exécution de la requête
            if ($stmt->execute()) {
                echo "Les données ont été insérées avec succès <br>";
            } else {
                echo "Erreur lors de l'exécution de la requête";
            }
        } else {
            echo "Erreur lors de la préparation de la requête";
        }

        // Fermeture de la connexion
        $connexion->close();
    } catch (Exception $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}

// Afficher les données existantes
try {
    // Connexion à la base de données avec MySQLi
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    // Vérification de la connexion
    if ($connexion->connect_error) {
        die("Erreur de connexion : " . $connexion->connect_error);
    }

     // Requête SQL
     $sql = "SELECT * FROM utilisateur";
     $resultat = $connexion->query($sql);

     if ($resultat->num_rows > 0) {
         // Parcourir les résultats
         while ($ligne = $resultat->fetch_assoc()) {
             echo "<tr>";
             echo "<td>" . $ligne['nom'] . "</td>";
             echo "<td>" . $ligne['prenom'] . "</td>";
             echo "<td>" . $ligne['email'] . "</td>";
             echo "<td>" . $ligne['message'] . "</td>";
             echo "</tr>";
         }
     } else {
         echo "<tr><td colspan='4'>0 résultats</td></tr>";
     }
    // Fermeture de la connexion
    $connexion->close();
} catch (Exception $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
