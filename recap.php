<?php
include_once('functions.php');
require_once('tcpdf/tcpdf.php');
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['Envoyer'])){
    $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $age =$_POST['age'];
    $tel =$_POST['tele'];
    $email =$_POST['email'];
    $filiere =$_POST['filiere'];
    $annee =$_POST['annee'];
    $module=$_POST['mod'];
    $projet =$_POST['project'];
    $description =$_POST['desc'];
    $club=$_POST['club'];
    $remarque=$_POST['remarque'];
    $file = $_FILES["photo"];
    

    }
    } 
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapulatif</title>
</head>
<style>
    .valid,.edit{
        
        float:left;
        margin-right:15px;
    }
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    #infos{
        border: none;
        margin: 20px auto;
        width:70%;
        padding: 0;
    }

    legend {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
    }

    label {
        display: inline-block;
        margin-right: 10px;
        width: 350px;
    }

    img {
        display: block;
        margin: 20px auto;
        max-width: 300px;
    }

    
    </style>
<body>
    <form action="create_resume.php" method="post">
    <fieldset id="infos">
        <legend>Fiche Recapulatif</legend>
        <br>
        <fieldset>
            <legend>Informations personnelles</legend>
        <label>Nom:</label>
        <input name="nom" value="<?php display_data($nom);?>" readonly>
         <br>
        <label>Prenom:</label>
        <input name="prenom" value=" <?php 
                 display_data($prenom);

         ?>"readonly>
        <br>
        <label>Age:</label>
        <input name="age" value="<?php 
                  display_data($age);

         ?>" readonly>
        <br>
        <label>Numero de telephone:</label>
        <input name="tele" value="<?php 
                 display_data($tel);

         ?>" readonly>
        <br>
        <label>Email:</label>
        <input name="email" value="<?php 
                  display_data($email);

         ?>" readonly>
         <br>
        </fieldset>
        <fieldset>
            <legend> Renseignements Academiques</legend>
        <label>Filière:</label>
        <input name="filiere" value="<?php
                    display_data($filiere);

        ?>" readonly>
        <br>
        <label>Année:</label>
        <input name="annee" value="<?php 
                  display_data($annee);

         ?>" readonly>
        <br>
        <label>Modules :</label>
        <input name="mod" value="<?php
        
                echo display_module($module);
         ?>" readonly>
    
          <br>
          <label>Nombre de projets réalisés: </label>
          <input name="project" value=" <?php
                
                display_data($projet);
            ?>" readonly>
          <br>
          <label>Description des projets: </label>
          <input name="desc" value="<?php
                
                display_data($description);

                 ?>" readonly>
                 <br>
                 <label >Clubs & Associations</label>
            
                 <input name="club" value="<?php
                display_data($club);
                ?>" readonly>
                <br>
                <hr>
            <?php
            if(isset($_POST['Envoyer'])){

                if (isset($file)) {
                   
                    // Uploading in "uplaods" folder
                move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
                $image_path="uploads/".$file["name"];
                
                    
                }

            
            }
            $_SESSION['photo']=$image_path;
            ?>
        <br>
            <img src="<?php echo $image_path?>" alt="Resume Image" width="200px">
            <br>

            

        </fieldset>
        <br>
        <br>
           
    
    </fieldset> 
       
       
         <h1 id="done" hidden style="display: none">Les informations sont validées et enregistrées dans le fichier cv_file.txt !</h1>
     <br>
        <div class="buttons">
          
           <div class="valid">
            
              <input type="button" id="validate" name="validate" onclick="Output()" value="Valider">
            
            </div>
            <div class="edit">
            <form action="Formulaire.html" method="GET" id="somo">
                    <input type="button" name="edit" onclick="history.go(-1);" value="Modifier">
                    
            </form>
            </div>
            
            <div class="pdf">
               
           <button type="submit" name="download">Download</button>
        
            </div>
    </form>

        </div>
       
        <br>
        

            <script>
                
            function Output() {
                    document.getElementById("infos").style.display = "none";
                    document.getElementById("done").style.display = "block";
                    
                
                }
                <?php 
                    store_txt();
                    ?>
            
            </script>
            
</body>
</html>