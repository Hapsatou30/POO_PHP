<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inclure la classe Connexion
    require_once ("config.php");
    require_once( "Utilisateur.php");


    // Récupérer les données du formulaire
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $motdepasse = isset($_POST['motdepasse']) ? $_POST['motdepasse'] : '';

    // Vérifier si les champs email et motdepasse ne sont pas vides
    if (empty($email) || empty($motdepasse)) {
        header('location: login.php?error=Veuillez saisir votre email et mot de passe');
        exit;
    }

    // Préparer et exécuter la requête SQL de sélection
    $sql = "SELECT * FROM admin WHERE email=?";
    $stmt = $connexion->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $connexion->error);
    }

    // Binder le paramètre
    $stmt->bind_param('s', $email);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer le résultat de la requête
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        // Utilisateur trouvé, vérifiez le mot de passe
        $utilisateur = $resultat->fetch_assoc();
        if ($motdepasse === $utilisateur['motdepasse']) { // Correction ici
            // Mot de passe correct, connectez l'utilisateur
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $utilisateur['Iid'];
            $_SESSION['logged'] = true;
            header('Location: index.php'); // Redirigez l'utilisateur vers la page d'accueil après la connexion
            exit;
        } else {
            // Mot de passe incorrect
            header('location: login.php?error=Mot de passe incorrect');
            exit;
        }
    } 

    // Fermer le résultat de la requête
    $resultat->close();

    // Fermer la requête préparée
    $stmt->close();

}
?>
