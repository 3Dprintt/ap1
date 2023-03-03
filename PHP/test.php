<?php
$bdd = new PDO('mysql:host=localhost;dbname=gestiontravaux;charset=utf8;', 'root', 'root');

session_start();
if (!$_SESSION['email']) {
    header('Location: PHP/connexion.php');
}

$afficher = $bdd ->prepare('SELECT u.Nom , u.Prenom , u.fonction , d.objetdemande , d.detailsdemande , d.secteur , d.intitule , d.etat , d.ID , d.technicien , d.IDusers , d.RaisonMEA
    FROM users u
    INNER JOIN demandeeffectuer d
    ON u.IDusers = d.IDusers');
    /*INNER JOIN indicepriorité i
    ON u.IDusers = i.intitulé');
    /*INNER JOIN étatdemande
    ON users.IDusers = étatdemande.IDétat'); */
$afficher->execute(array());
$user = $afficher->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Afficher les formulaires</title>  
        <style>
            
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');

body{
    background: #178CA4;
    font-family: 'montserrat';
}
#container{
    width:70px;
    margin:0 auto;
    margin-top:50%;
    border: 10px;
    position: absolute;
    top: 10px;
}
/* Bordered form */
table {
    width:90%;
    padding: 50px;
    border: 10px inset #f1f1f1;
    background: #fff;
    box-shadow: 0 0 40px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    border-radius: 30px;
    margin-top: 200px;
    border: 20px;
    border-top: 50cm;
    margin-left: auto;
    margin-right: auto;
    margin: auto;
    height: 20px;
    margin-top: 50px;
    position: relative;
    
}
#container h1{
    width: 38%;
    margin: 0 auto;
    padding-bottom: 10px;
    
}

table{
    font-family: 'montserrat';
}

td{
    font-family: 'montserrat';
    font-weight: bold;
    height: 30px;
}

h1{
    width: 38%;
    margin: 0 auto;
    padding-bottom: 10px;
    font-family: 'Montserrat';
    text-align: center;
    text-decoration: underline;
    position: absolute;
    top: 60px;
    left: 600px;
}
#boutondeco{
    font-family: 'Montserrat';
    font-weight: bold;
    border-radius: 10px;
    width: 130px;
    text-align: center;
    position: absolute;
    cursor: pointer;
    background-color: #285185;
    color: white;
    right: 150px;
    top: 30px;
}
#Modifier{
    font-family: 'Montserrat';
    font-weight: bold;
    border-radius: 10px;
    width: 130px;
    text-align: center;
    position: absolute;
    top: 200px;
    left: 1770px;
    cursor: pointer;
    border-color: #285185;
}

#Supprimer{
    font-family: 'Montserrat';
    font-weight: bold;
    border-radius: 10px;
    width: 130px;
    text-align: center;
    position: absolute;
    top: 100px;
    left: 1770px;
    cursor: pointer;
    border-color: #285185;
}
#bouton1{
    background-color: #285185;
    color: white;
}
#bouton3{   
    font-family: 'Montserrat';
    font-weight: bold;
    width: 180px;
    text-align: center;
    cursor: pointer;
    border-radius: 10px;
    background-color: #285185;
    color: white;
}

input[type=search], input[type=Prenom] {
    width: 20%;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 30px;
    position: absolute;
    font-family: 'montserrat';
    top: 700px;
    left: 850px;
    font-weight: bold;
}






        </style>
    </head>
    <body>
                                  
        <table border="2" align="center" width="50%">
            <tr>
            <th><B>Prénom</b></th><th>Nom</th><th>Fonction</th><th>objet de votre demande</th><th>details de votre demande</th><th>secteur</th><th>Priorité</th><th>état</th><th>technicien Assigner</th><th>Raison Mise en Attente</th><th>modification</th>
            </tr>
                <?php foreach ($user as $cle => $value) { ?>
                <tr>
                <td><?php echo $value['Prenom'];?></td>
                <td><?php echo $value['Nom'];?></td>
                <td><?php echo $value['fonction'];?></td>
                <td><?php echo $value['objetdemande'];?></td>
                <td><?php echo $value['detailsdemande'];?></td>
                <td><?php echo $value['secteur'];?></td>
                <td><?php echo $value['intitule'];?></td>
                <td><?php echo $value['etat'];?></td>
                <td><?php echo $value['technicien'];?></td>
                <td><?php echo $value['RaisonMEA'];?></td>
                <td><a href="PHP/modifie.php?ID=<?php echo $value['ID']; ?>"><button id="bouton3" align="center">Modifier la demande/Assigner un technicien</button></a></td>
            
                </tr>
                <?php } ?>
        </table>
        <a href="PHP/genpdf.php"><button id="bouton"></button>télécharger les demandes en cours?</button></a>
    </body>
</html>
