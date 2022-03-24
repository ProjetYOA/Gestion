<?php
include('ConnexionBdd.php');
function listerVisiteur()
{
  $connexion = connexionBdd();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
      
           
      $requete="select vis_nom, VIS_MATRICULE, vis_prenom, vis_adresse, vis_ville, vis_cp from visiteur";
  
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {
          $visiteur[$i]['nom']=$ligne->vis_nom;
          $visiteur[$i]['prenom']=$ligne->vis_prenom;
          $visiteur[$i]['adresse']=$ligne->vis_adresse;
          $visiteur[$i]['ville']=$ligne->vis_ville;
          $visiteur[$i]['cp']=$ligne->vis_cp;
          $visiteur[$i]['VIS_MATRICULE']=$ligne->VIS_MATRICULE;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de resultat
 
  return $visiteur;
}
function statut($prodcode)
{
  
  $connexion = connexionBdd();
    if (TRUE) 
    {
        
             
        $requete="update produit set Statut = 'ND' where prod_code = '".$prodcode."';";
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        
        // Si la requ�te a r�ussi
        if ($ok)
        {
          $message = "l'invite a bien ete ajoute";
        //   ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "L'invite n'a pas ete ajoute !!!";
        //   ajouterErreur($tabErr, $message);
        } 
      }


}
function Emprunter($dateE,$prod,$dateR,$unMatricule)
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      $requete="select * from emprunt where emp_produit = '".$prod."';";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {
        $message="Echec de l'emprunt : Le produit n'est pa disponible !";
      //   ajouterErreur($tabErr, $message);
      }
      else
      {
        $requete="insert into emprunt (emp_date,emp_produit,emp_dateRetour,VIS_MATRICULE) values (
         '".$dateE."',
         '".$prod."',
         '".$dateR."',
         '".$unMatricule."');"; 
         $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          echo $requete;
        
         // Si la requ�te a r�ussi
         if ($ok)
         {
           $message = "l'emprunt a bien ete ajoute";
         //   ajouterErreur($tabErr, $message);
         }
         else
         {
           $message = "L'emprunt n'a pas ete ajoute !!!";
         //   ajouterErreur($tabErr, $message);
         } 
        }
      }


}
function listerProduit()
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      $requete="select * from produit";
    
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $produit[$i]['prod_code']=$ligne->prod_code;
          $produit[$i]['prod_libelle']=$ligne->prod_libelle;
          $produit[$i]['prod_prix']=$ligne->prod_prix;
          $produit[$i]['prod_categorie']=$ligne->prod_categorie;
          $produit[$i]['hauteur']=$ligne->hauteur;
         
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat

  return $produit;
}



function listerProduitDispo($utilisateur

)
{

  $connexion = connexionBdd();
  if (TRUE) 
  {
      
           
      $requete="select * from produit where Statut = 'dispo'";
    
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      
      while($ligne)
      {
          $utilisateur[$i]['prod_code']=$ligne->prod_code;
          $utilisateur[$i]['prod_libelle']=$ligne->prod_libelle;
          $utilisateur[$i]['prod_prix']=$ligne->prod_prix;
          $utilisateur[$i]['prod_categorie']=$ligne->prod_categorie;
         
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de r�sultat

  return $utilisateur;
}
function ajouterVisiteur($unMatricule,$unNom,$unPrenom,$uneAdresse,$uneVille,$unCp, $uneDate, $unSec,$unLab)
{

    // Ouvrir une connexion au serveur mysql en s'identifiant
   
    $connexion = connexionBdd();
        $requete="select * from visiteur";
      $requete=$requete." where VIS_NOM = '".$unNom."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
      
      //echo ; 
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {
        $message="Echec de l'ajout : l ID existe déja !";
      //   ajouterErreur($tabErr, $message);
      }
      else
      {
          
        if(strlen($unNom) <= 20 )
        {
              $requete="insert into visiteur"
            ."(VIS_MATRICULE,VIS_NOM ,VIS_PRENOM, VIS_ADRESSE, VIS_CP, VIS_VILLE, VIS_DATEEMBAUCHE, SEC_CODE, LAB_CODE) values ('"
            .$unMatricule."','"
            .$unNom."','"
            .$unPrenom."','"
            .$uneAdresse."','"
            .$uneVille."','"
            .$unCp."','"
            .$uneDate."','"
            .$unSec."','"       
            .$unLab."');";  
            
            
              // Lancer la requ�te d'ajout 
              $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
              
            
              // Si la requ�te a r�ussi
              if ($ok)
              {
                $message = "l'invite a bien ete ajoute";
              //   ajouterErreur($tabErr, $message);
              }
              else
              {
                $message = "L'invite n'a pas ete ajoute !!!";
              //   ajouterErreur($tabErr, $message);
              }
          }
          else
          {
            echo" le nom doit composer maximun 20 caracteres";
          }

      }
      
    }
function listercat($unecat)
{
  $connexion = connexionBdd();
  if(TRUE) 
  {
    $requete="Select * from categorie";
    $jeuResultat=$connexion->query($requete); 
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ);
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
      $lacat[$i]['cat_code']=$ligne->cat_code;
      $lacat[$i]['cat_nom']=$ligne->cat_nom;
      $ligne=$jeuResultat->fetch();
      $i = $i + 1;
    }
      
  }
  $jeuResultat->closeCursor();
  return $lacat;
    
}
function ajouter($ref, $des, $prix, $image, $cat, $hauteur)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connexionBdd();
  
  // Si la connexion au SGBD � r�ussi
  if (TRUE) 
  {
    // V�rifier que la r�f�rence saisie n'existe pas d�ja
    $requete="select * from produit";
    $requete=$requete." where prod_code = '".$ref."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le r�sultat soit r�cup�rable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la r�f�rence existe d�j� !";
      
    }
    else
    {
      if($hauteur >= 0 && $hauteur < 20)
      {
        $requete="insert into produit"
        ."(prod_code,prod_libelle,prod_prix,prod_image,prod_categorie, hauteur)  
        values ('"
        .$ref."','"
        .$des."',"
        .$prix.",'"
        .$image."','"
        .$cat."',"
         .$hauteur.");";
 
 
         // WHERE Table_Panier.Id_Produit NOT IN (SELECT Id_Produit 
         // FROM Table_Produit)
         // Lancer la requ�te d'ajout 
         $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        
         // Si la requ�te a r�ussi
         if ($ok)
         {
           $message = "La fleur a �t� correctement ajout�e";
           
         }
         else
         {
           $message = "Attention, l'ajout de la fleur a �chou� !!!";
           
         }
      }
      else
      {
        echo"la hauteur doit etre comprise entre 0 et 20.";
      }

    }
  
  }
  else
  {
    $message = "probl�me � la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}
function rechercherVisiteur($nom)
{
  $connexion = connexionBdd();
    $visiteur = array();
      
    $requete="select * from visiteur";
      $requete=$requete." where VIS_NOM ='".$nom."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
 
    $i=0;
    $invite=0;
    
    $ligne = $jeuResultat->fetch();
    echo $requete;
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    while($ligne)
      {
        $visiteur[$i]['nom']=$ligne['VIS_NOM'];
        $visiteur[$i]['prenom']=$ligne['VIS_PRENOM'];
        $visiteur[$i]['adresse']=$ligne['VIS_ADRESSE'];
        $visiteur[$i]['ville']=$ligne['VIS_VILLE'];
        $visiteur[$i]['cp']=$ligne['VIS_CP'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
      }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $visiteur;
}
function rechercherProduit($nom)
{
  $connexion = connexionBdd();
    $lutilisateur = array();
      
    $requete="select * from produit";
      $requete=$requete." where prod_libelle ='".$nom."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    // Initialisationd e la cat�gorie trouv�e � : "aucune"
 
    $i=0;
    $invite=0;
    
    $ligne = $jeuResultat->fetch();
    echo $requete;
    
    // Si un utilisateur est trouv�, on initialise une variable cat avec la cat�gorie de cet utilisateur trouv�e dans la table utilisateur
    while($ligne)
      {
        $lutilisateur[$i]['prod_code']=$ligne['prod_code'];
        $lutilisateur[$i]['prod_libelle']=$ligne['prod_libelle'];
        $lutilisateur[$i]['prod_prix']=$ligne['prod_prix'];
        $lutilisateur[$i]['prod_categorie']=$ligne['prod_categorie'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
      }
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
  
  return $lutilisateur;
}


function GETID($ref)
{
  $connexion = connexionBdd();
    
  $tabVisiteur = array();
  $requete="select vis_matricule from visiteur  where vis_nom='".$ref."';";
    //echo $requete;
    $jeuResultat=$connexion->query($requete);
   $ligne = $jeuResultat->fetch();
   if($ligne)
   {
     $tabVisiteur = $ligne['vis_matricule'];
     
   }
   return($tabVisiteur);
}

function supprimer($ref)
{
      $connexion = connexionBdd();
      $requete="select * from visiteur  where vis_nom = '".$ref."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $ligne = $jeuResultat->fetch();
      
      if ($ligne)
      {
        $requete="DELETE FROM visiteur WHERE vis_nom ='".$ref."';"; 
        echo "Le visiteur a été correctement supprimé";
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
     
      }
}


function GETIDProduit($ref)
{
  $connexion = connexionBdd();
    
  $tabProduit= array();
  $requete="select prod_code from produit  where prod_libelle ='".$ref."';";
    //echo $requete;
    $jeuResultat=$connexion->query($requete);
   $ligne = $jeuResultat->fetch();
   if($ligne)
   {
     $tabProduit = $ligne['prod_libelle'];
     
   }
   return($tabProduit);
}

function supprimerProduit($ref)
{
      $connexion = connexionBdd();
      $requete="select * from produit  where prod_libelle = '".$ref."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $ligne = $jeuResultat->fetch();
      
      if ($ligne)
      {
        $requete="DELETE FROM produit WHERE prod_libelle ='".$ref."';"; 
        echo "Le produit a été correctement supprimé";
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
     
      }
}


function modifierVisiteur($unMatricule,$unNom,$unPrenom,$uneAdresse,$uneVille,$unCp, $uneDate, $unSec,$unLab)

{

    // Ouvrir une connexion au serveur mysql en s'identifiant
  $connect = connexionBdd();

      
      
          //VIS_MATRICULE,VIS_NOM ,VIS_PRENOM, VIS_ADRESSE, VIS_CP, VIS_VILLE, VIS_DATEEMBAUCHE, SEC_CODE, LAB_CODE
        $requete="UPDATE participant SET ";
        $requete=$requete."VIS_MATRICULE='".$unMatricule."',VIS_NOM='".$unNom."',VIS_PRENOM='".$unPrenom."',VIS_ADRESSE='".$uneAdresse."',VIS_VILLE='".$uneVille."', VIS_CP='".$unCp."',VIS_DATEEMBAUCHE='".$uneDate."',SEC_CODE='".$unSec."',LAB_CODE='".$unLab."';";
        // echo $requete;
        
          // Lancer la requ�te d'ajout 
          $ok=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        
          // Si la requ�te a r�ussi
          if ($ok)
          {
            $message = "l'invite a bien ete modifie";
          //   ajouterErreur($tabErr, $message);
          }
          else
          {
            $message = "L'invite n'a pas ete modifie !!!";
          //   ajouterErreur($tabErr, $message);
          } 

      }




?>