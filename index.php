<?php
//Main language
$main_language = "English";

//Set Language variable
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
   
    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
     echo "<script type='text/javascript'> location.reload(); </script>";
    }
   }
   
   //Include Language file
   if(isset($_SESSION['lang'])){
    include "language/".$_SESSION['lang'].".php";
   }else{
    include "language/$main_language.php";
   }
   
?>
<!DOCTYPE html>
<html>
<body>

<h1><?= $_TXT[0] ?></h1>
<p><?= $_TXT[1] ?></p>
<p><?= $_TXT[2] ?></p>
<br>
<form>
  <label for="lang"><?= $_TXT[2] ?></label>
  <select name="lang" id="lang">
    <?php
      //Folder where you want to get all files names from
  $langdir = 'language/';

  //Hide unnecessary
  $hideNamelang = array('.','..','.DS_Store');

  //Search for the file
  $fileslang = scandir($langdir);

  foreach($fileslang as $filenamelang) {
    if(!in_array($filenamelang, $hideNamelang)){

      $filenamelang = basename ($filenamelang, ".php");
   ?>

    <option value="<?php echo "$filenamelang"; ?>"><?php echo "$filenamelang"; ?></option>
<?php   } }?>
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>