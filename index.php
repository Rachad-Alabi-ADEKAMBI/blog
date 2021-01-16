<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="sass/css/style.min.css" />
    </head>

    <body>
        <h1>Mon super blog</h1>
            <h2>Derniers billets du blog:</h2>
        <section class="topic">
    <?php
        //connect to database
          try{
            $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }

        catch (Exception $e)
        {
        die('Erreur : ' . $e->getMessage());
        }

        $reponse = $bdd->query('SELECT date_of_topic FROM topic');
        while ($donnees = $reponse->fetch())
{
    print $donnees;
}
$reponse->closeCursor();
      //  $req = $bdd -> exec ("INSERT INTO topic (title, content, date_of_topic) VALUES (\"la programmation en général\", \"lorem ipsumd   uobyif  oifgwehyfh  ipfheiu\", NOW())");
      //  echo"fait";
/*
         $req = $bdd -> prepare ("INSERT INTO minichat (pseudo, message) VALUES (:pseudo, :message)");
                $req -> execute (array(
                    "pseudo" => $_POST["pseudo"],
                    "message" => $_POST["message"]

         //read database infos
       /* $reponse == $bdd -> query ('SELECT id FROM topic');
        while ($donnees = $reponse-> fetch())
                {
            echo"ok";
                }
             $reponse -> closeCursor();*/
    ?>
   <!-- <a href="commentaires.php?topic_id=1">Commentaires</a>-->
        </section>
    </body>
</html>

