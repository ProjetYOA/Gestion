<script type="text/javascript">

</script>
<!-- <h3>Ajouter un visiteur :</h3>";   -->


<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjouterVisiteur" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les coordonnées d'un visiteur pour l'ajouter : </legend>
    <label>Matricule :</label> <input type="text" name="matricule" size="20" /><br />
    <label>Nom :</label> <input type="text" name="nom" size="20" /><br />
    <label>Prenom :</label> <input type="text" name="prenom" size="10" /><br /> 
    <label>Adresse :</label> <input type="text" name="adresse" size="10" /><br /> 
    <label>Date d'embauche:</label> <input type="text" name="date" size="10" /><br />
    <label>Ville : </label> <input type ="text" name="cp" size="20"/>
    <label>Code postal : </label> <input type="text" name="ville" size="10"/><br>
    <label>sec code:</label> <input type="text" name="sec" size="10" /><br />
    <label>Lab Code :</label> <input type="text" name="code" size="20" /><br /> 
   
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>

