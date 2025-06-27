
<?php
include 'database.php';

//requete sql pour selectionner tous les etudiants dans l'ordre decroissant de leurs ID


$sql= "SELECT* FROM etudiants ORDER BY id  DESC";

//preparation de la requete
$request= $pdo->prepare($sql);

//Execution de la requete

$request->execute();

//chercher les donnees sous forme de tableau associative

$donnees = $request->fetchAll();



// echo('<pre>');
// print_r($donnees);
// echo('</pre>');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tableau de Gestion - Thème Violet</title>
    </head>
<body>
    <div class="data-container">
        <div class="header-actions">
            <h2>Liste des Étudiants</h2>
            <div class="search-create-container">
                <input type="text" class="search-box" placeholder="Rechercher un étudiant...">
                <a href="create.php" class="btn-create">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Créer un nouvel étudiant
                </a>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

        <?php foreach($donnees as $donnee) :   ?>
            <tr>

               <td>  <?php echo $donnee['id']; ?></td>
               <td>  <?php echo $donnee['nom']; ?></td>
               <td>  <?=  $donnee['prenom']; ?></td>
               <td>  <?php echo $donnee['email']; ?></td>
                    
                    <td>
                        <div class="action-buttons">
                          
                          <a href="update.php?id=<?= $donnee['id']; ?>" >
                                <button class="btn btn-edit">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Éditer
                                    </button>
                         </a>

                            <a href="delete.php?id=<?= $donnee['id']; ?>"
                            onclick="return confirm('etes vous sur de vouloir supprimer cette etudiants')">
                            <button class="btn btn-delete">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                               delete
                            </button>

                                
                            </a>
                        </div>
                    </td>
                </tr>

 <?php endforeach   ?>

                
            </tbody>


            
        </table>
    </div>
</body>
</html> 
