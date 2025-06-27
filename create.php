<?php
include "database.php";
if(isset($_POST['create']) ){
//  echo "Formulaire soumis !";
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    if(empty($nom) || empty($prenom) || empty($email)) {
        echo '<div style="color:red; font-size:3rem;"> Tous les champs sont requis.</div>';
    } else{
       $sql ="INSERT INTO etudiants (nom,prenom,email)
       values (:nom,:prenom,:email)";
       $query=$pdo->prepare($sql);
       $query->execute([
   'nom' => $nom,
   'prenom' => $prenom,
   'email' => $email,
       ]);
       echo '<p class="success">etudiant creer avec success
       </p>';
       
    }

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
}


?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Étudiant | Minimaliste</title>
    <style>
        :root {
            --primary: #7B2CBF;
            --text: #2D3748;
            --border: #E2E8F0;
            --bg: #F8FAFC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: var(--bg);
            display: grid;
            place-items: center;
            min-height: 100vh;
            padding: 1rem;
            line-height: 1.5;
        }

        .form-container {
            background: white;
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        h1 {
            color: var(--primary);
            font-size: 1.5rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            color: var(--text);
            font-size: 0.875rem;
            margin-bottom: 0.375rem;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 0.375rem;
            font-size: 0.9375rem;
            transition: border 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
        }

        input::placeholder {
            color: #A0AEC0;
        }

        .submit-btn {
            width: 100%;
            padding: 0.875rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.9375rem;
            font-weight: 500;
            margin-top: 0.5rem;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="form-container">

    <a href="index.php">
        <button type="submit" name="create"  class="submit-btn">retour</button>

    </a>
        <h1>Création d'un étudiant</h1>
        
        <form action=''  method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez le nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez le prénom">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Entrez l'email">
            </div>

            <button type="submit" name="create"  class="submit-btn">Ajouter</button>
        </form>


   
      </div>
</body>
</html>
