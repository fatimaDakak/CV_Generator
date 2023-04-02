<?php
 require __DIR__."/vendor/autoload.php" ;

 use Dompdf\Dompdf;
 use Dompdf\Options;
function display_data($data){
        if(isset($_POST['Envoyer'])){
        if(isset($data))
        echo" ".$data;
    }
}
        function display_module($data){
            if(isset($_POST['Envoyer'])){
        
                if(!empty($data)) {
            
                    foreach($data as $value){
                        return $value." ";
                    }
            
                }
            
            }
        }


        function store_txt(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                if(isset($_POST['Envoyer'])){
                    $fp=fopen("cv_file.txt","w");
                    fwrite($fp,
                        "-> Nom: " .$_POST['nom'].
                        "\n-> prenom: " .$_POST['prenom'].
                        "\n-> age: " .$_POST['age'].
                        "\n-> numero de telephone: " .$_POST['tele'].
                        "\n-> Email: " .$_POST['email'].
                        "\n-> vous etes en:  ".$_POST['filiere'].
                        "\n-> annee: ".$_POST['annee'].
                        "\n-> modules :".display_module($_POST['mod']).
                        "\n-> nombre de projets: ".$_POST['project'].
                        "\n-> remarque: " .$_POST['remarque'].
                        "\n");
                    fclose($fp);}
                    
                        
                    }
                    
            
            }
        function generate_cv(){
           
if(isset($_POST['download'])) {

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
    
if(isset($_FILES['photo'])){
    $file=$_FILES['photo'];
    $namefile=$file['photo'];
    $tmp_name=$file['tmp_name'];
    $file_size=$file['size'];
    $image_path='uploads/'.$namefile;
    move_uploaded_file($tmp_name , $image_path);
}
$html = "<style>";
$html = "p { color: pink }";
$html = "</style>";
$html = '<img src="'.$image_path.'" width=200px height=200px >'; 
$html .= "<p><b>Nom et Prenom </b>: $nom $prenom </p>" ; 
$html .= "<p><b>Age</b>: $age </p>" ;
$html .= "<p><b>Numero </b>: $tel</p>" ; 
$html .= "<p><b>Email</b>: $email </p>" ;
$html .= "<p><b>Filiere</b>: $filiere</p>" ;
$html .= "<p><b>Niveau</b>: $annee</p>" ;
$html .= "<p><b>Modules</b>: $module</p>" ;
$html .= "<p><b>Projects</b>: $projet</p>" ;
$html .= "<p><b>Remarque</b>: $remarque</p>" ;
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);
$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "landscape");
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->addInfo("Title", "CV");
$dompdf->stream("invoice.pdf", ["Attachment" => 0]);
$output = $dompdf->output();
file_put_contents("file.pdf", $output);
}
        }
        
?>