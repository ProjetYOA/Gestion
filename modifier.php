<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
 
// Initialise les ressources n�cessaires au fonctionnement de l'application

//   $repVues = './vues/';
include("tools/fonction.php"); 
  // d�marrage ou reprise de la session
//   ophp/n();
  // initialement, aucune erreur ...
  $tabErreurs = array();


// DEBUT du contr�leur rechercher.php 

if(count($_POST)>=6)
      {
        $etape = 3;
        $unMatricule=$_GET["matricule"];
        $unNom=$_POST["nom"];
        $unPrenom=$_POST["prenom"];
        $uneAdresse=$_POST["adresse"];
        $uneDate=$_POST["date"];
        $unCp=$_POST['cp'];
        $uneVille=$_POST["ville"];
        $unSec=$_POST["sec"];
        $unLab=$_POST["code"];
       
        
        modifierVisiteur($unMatricule,$unNom,$unPrenom,$uneAdresse,$uneVille,$unCp, $uneDate, $unSec,$unLab);
        header("Location:listerVisiteur.php");
      }

// D�but de l'affichage (les vues)

include("vues/entete.php");
include("vues/menu.php");

 

//   include("vues/vModifierVisiteur.php");

if($etape==1)
{
   include("vues/vModifierProduit.php");
}
include("vues/pied.php") ;
?>

