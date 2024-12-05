   <?php 
   include "./vue/entete.php";
   ?>  
   <form method="POST" action="./?action=connexion">
      <table>
         <tr>
            <td>Connexion</td>
         </tr>
         <tr>
            <td>Login*: </td>
            <td><input type="text" name="login" value="" size="15"></td>
         </tr>
         <tr >
            <td>Mot de passe*: </td>
            <td><input type="password" name="mdp" value="" size="15"></td>
         </tr>
      </table>
      <br>
      <table >
         <tr>
            <td ><input type="submit" value="Valider" name="validerConnexion">
            </td>
            <td ><input type="reset" value="Annuler">
            </td>
         </tr>
      </table>
   </form>
   <?php 
   include "./vue/pied.php";
   ?>

