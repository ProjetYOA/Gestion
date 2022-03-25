

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($type))
    {
?>
        <h3><?php echo $type;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
<?php
if (count($produit) > 0)
{
?>
        <tr>
          <th>catégorie</th>
          <th>Nom</th>
          <th>Prix</th>
          <th>Image</th>
          <th>Hauteur</th>
          <th>Statut</th>
         
         </tr>
<?php
}
else
{
 echo "<h1>Aucun client ne correspond � votre recherche</h1>";
}
?>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($produit))
    { 
 ?>     
        <tr>
            <td><a href="./modifierProduit.php?ID=<?php echo $produit[$i]['prod_code']?>"><?php echo $produit[$i]['prod_code']?></a></td>
            <td><?php echo $produit[$i]['prod_libelle']?></td>
            <td><?php echo $produit[$i]['prod_libelle']?></td>
            <td ><?php echo $produit[$i]['prod_prix']?></td>
            <td ><?php echo $produit[$i]['prod_image']?></td>
            <td ><?php echo $produit[$i]['hauteur']?></td>
            <td ><?php echo $produit[$i]['statut']?></td>
           
         </tr>
<?php
        $i = $i + 1;
     }
?>       
       </tbody>       
     </table>    
  </div>

 
