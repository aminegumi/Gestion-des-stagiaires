<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Creer un compte</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">



  <!-- Bootstrap CSS File -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link href="css/style2.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

   <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
      <!--  <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
        
      </div>



      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li ><a href="index.php">Accueil</a></li>
         
   
          
         <li><a href="login.php?etat=deconncter#login">Connexion</a></li>
           <li role="presentation"><a href="NiceAdmin\login.php">Administration</a></li>
        </ul>
      </nav>
    </div>
  </header> 


<?php 
if (isset($_POST['nom'])) {

$connexion=mysqli_connect("localhost","root","");
$s="stage";
$connect_base=mysqli_select_db($connexion,$s);

$donne=$_POST;

$nom2=$donne['nomm'];
$mail=$donne['email'];
$mot=$donne['mot'];

$nom=$donne['nom'];
$prenom=$donne['prenom'];
$cin=$donne['cin'];
$mot=$donne['mot'];
$con=$donne['Confirmer'];
$error=0;
$m3="SELECT * FROM `stagiaire` WHERE mail='$mail'";
$resultat3=mysqli_query($connexion,$m3);
$ligne4 = mysqli_fetch_array($resultat3);
 if ($ligne4['mail']==$mail) {
   echo  "<center><font color=\"#FF0000\"><h1>Mail est déjà existé !</h1></font></center>";
 $error=1;
 }
  
  $m4="SELECT * FROM `compte` WHERE Nom_d_utilisateur='$nom2'";
$resultat4=mysqli_query($connexion,$m4);
$ligne1= mysqli_fetch_array($resultat4);
 if ($ligne1['Nom_d_utilisateur']==$nom2) {
   echo  "<center><font color=\"#FF0000\"><h1>Nom d'utilisateur est déjà existé !</h1></font></center>";
 $error=1;
 }
  $m5="SELECT * FROM `stagiaire` WHERE cin='$cin'";
$resultat5=mysqli_query($connexion,$m5);
$ligne2= mysqli_fetch_array($resultat5);
 if ($ligne2['cin']==$cin) {
   echo  "<center><font color=\"#FF0000\"><h1>CIN est déjà existé !</h1></font></center>";
 $error=1;
 }
 if ($mot!=$con) {
   echo  "<center><font color=\"#FF0000\"><h1>Confirmation de Mot de pass!</h1></font></center>";
    $error=1;
 }
  
if ($error!=1) {
  
$m="INSERT INTO `compte`(`Nom_d_utilisateur`,  `mot_de_pass`, `role`) VALUES ('$nom2','$mot','stagiaire')";
$resultat=mysqli_query($connexion,$m);
$m2="INSERT INTO `stagiaire`(`cin`, `nom`, `prenom`, `tel`, `date_de_naissnce`, `mail`, `adresse`, `niveau`, `filiere`, `etat`, `id_compte`, `id_group`, `cin_encadrant`)  VALUES ('$cin','$nom','$prenom',null,null,'$mail',null,null,null,null,'$nom2',null,null)";
$resultat2=mysqli_query($connexion,$m2); 
if ($resultat==1&&$resultat2==1) {
 header('Location: traitement_compte.php');
}else
{
  echo " <center><font color=\"#FF0000\"><h1>Erreur Réessayer!</h1></font></center>";
  echo $resultat;
  echo $resultat2;
}
}
}
?>
  




<div class="container">
 <center><h1><span class="badge badge-success"><i>Créer un Compte</i></span></h1></center>
<form  action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

<div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nom :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control"   id="nom" placeholder="Enter Nom" name="nom">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Prénom :</label>
    <div class="col-sm-10">
         <input type="text" class="form-control" id="prenom" placeholder="Enter Prenom" name="prenom">
    </div>
  </div>
  
    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">CIN :</label>
    <div class="col-sm-10">
          <input type="text" class="form-control" id="cin"  placeholder="Enter CIN" name="cin">
    </div>
  </div>

    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
 <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    </div>
  </div>

    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nom d'utilisateur:</label>
    <div class="col-sm-10">
   <input type="text" class="form-control" id="nomm"  placeholder="Enter Nom d`utilisateur" name="nomm">
    </div>
  </div>

    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Mot de pass:</label>
    <div class="col-sm-10">
 <input type="password" class="form-control" id="mot" placeholder="Mot de pass" name="mot">
    </div>
  </div>

    <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Confirmer Mot de pass :</label>
    <div class="col-sm-10">
  <input type="password" class="form-control" id="Confirmer" placeholder="Confirmer Mot de pass" name="Confirmer">

    </div>
  </div>


 
 <pre><center><button type="submit" class="btn btn-success btn-lg" ><i>Envoyer</i></button></center></pre> 
</form>
</div>
<footer id="footer">
    <div class="container">
     
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
      </div>
    </div>
  </footer><!-- #footer -->




  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
