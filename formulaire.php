<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire</title>
</head>

<body>
    <form action="recap.php" method="POST" enctype="multipart/form-data">
        <h2>Fiche de Renseignement</h2>
        <fieldset>
             <legend>Renseignement Personnels</legend>
            <label>Nom</label>
            <input type="text" name="nom"><br><br>
            <label>Prenom</label>
            <input type="text" name="prenom"><br><br>
            <label>Age</label>
            <input type="nombre" name="age"><br><br>
            <label>Numero telephone</label>
            <input type="tel" name="tele"><br><br>
            <label>Email</label>
            <input type="email" name="email"><br><br>
        </fieldset>
        <fieldset>
            <legend>Renseignement Académiques</legend>
            <h4 align="center">Vous etes en </h4>
            <input type="radio" name="filiere" value="les classes préparatoires" checked>2AP
            <input type="radio" name="filiere" value="Génie des systèmes des réseaux et télecoms">GSTR
            <input type="radio" name="filiere" value="Génie informatique">GI
            <input type="radio" name="filiere"value="Supply Chain Management">SCM
            <input type="radio" name="filiere" value="Génie Civile">GC

             <br>
             <h4 align="center">Vous etes en </h4>
             <input type="radio" name="annee" value="1ère année ">1er année 
             <input type="radio" name="annee" value="2ème année ">2eme année 
             <input type="radio" name="annee" value="3ème année ">3eme année 
             <h4 align="center">Modules suivies cette année </h4>
             <input type="checkbox" value="AV"> AV
             <input  type="checkbox" name="mod[]" value="Compilation">Compilation
             <input  type="checkbox" name="mod[]" value="Réseaux">resaux
             <input type="checkbox" name="mod[]" value="Web avancé">Web avancé
             <input  type="checkbox"name="mod[]" value="Programmation orienté objet">POO
             <input  type="checkbox" name="mod[]" value="Bes de données">BD
             <br><br>
             <label>Nombre de projet realisé</label>
             <select name="project">
                <option value="" disabled selected>Select option</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
          
             <br><br>
            <label>Description des projets</label>
            <textarea name="desc" id="desc" cols="30" rows="5">
            </textarea>
            </fieldset>
            <fieldset>
                <legend align="center">Activitées Parascolaires</legend>
                <label>Clubs & associations :</label>
                <input type="text"  name="club" placeholder="Taper le(s) nom du club(s) dont vous etes affilié " size="50%">
            </fieldset>
            <fieldset>
                <legend >Vos remarques</legend>
                <textarea name="remarque" id="" cols="30" rows="5"></textarea><br><br>
                <label>Importer votre photo</label>
                <input type="file" name="photo" >
      
            </fieldset>
            <br>
            
            <input type="submit" name="Envoyer" value="Envoyer">
            <input type="reset" name="reset" value="Reset">
            
            
        <br>
    </form>
    
    
</body>
</html>

