<?php
// Récupération des données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 5');
?>


<!-- Affichage -->


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p>Derniers billets du blog :</p>
 
        
        <?php
        while ($data = $req->fetch())
        {
        ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($data['title']); ?>
                <em>le <?php echo $data['date_creation_fr']; ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($data['content']));
            ?>
            <br />
            <em><a href="#">Commentaires</a></em>
            </p>
        </div>
        <?php
        }
        $req->closeCursor();
        ?>
    </body>
</html>