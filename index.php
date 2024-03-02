<?php

    require_once( "Utilisateur.php");
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <header>
        <h1> Gestion des Utilisateurs</h1>
    </header>

    <main> 
        
        <div class="container">
           
            <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            require_once "config.php";     
                    ?>       
                </table>
                <div class="formulaire">
                    <h1>Formulaire </h1>
                    <form action="index.php" method="post">
                        <input type="text" name="nom" placeholder="Votre Nom"> <br> <br>
                        <input type="text" name="prenom" placeholder="Votre Prenom"> <br> <br>
                        <input type="text" name="email" placeholder="Votre Email"> <br> <br>
                        <input type="text" name="message" placeholder="Votre Message"> <br> <br>
                        <input type="submit" name="charger" > <br> <br>
                    </form>
    </main>

</body>
</html>
