<?php

 
  $cat="";
  if (isset($_GET['categ']))
  {
  $cat = $_GET['categ'];
  }  
  $visiteur = listerVisiteur($categ);
  
  
  include("entete.php");
  include("menu.php");
  include("accueil.php");
  include("pied.php");
  ?>
    
