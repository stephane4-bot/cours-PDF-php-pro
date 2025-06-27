<?php

include'database.php';

// include'title.php';
// include'title.php';


// require'title.php';
// require'tiltle.php';
// require'tiltle.php';


// require_once'title.php';
// require_once'tiltle.php';
// require_once'tiltle.php';


// include


$message='';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="DELETE FROM etudiants WHERE id=?";
    $query=$pdo->prepare($sql);
    $query->execute([$id]);
   header("location: index.php");
   exit();

    
}else{
    echo"id invalide ou non specifie";
}
?>