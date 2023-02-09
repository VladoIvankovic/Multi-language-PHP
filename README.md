# Multi-language-PHP
Implement Multi-language support to Website with PHP without sql

###### Language folder
`language/`

###### Creating a language file
  
    $_TXT = [
    "Welcome",
    "Implement Multi-language support to Website with PHP without sql",
    "Choose a language"
    ];
   

###### Main language
`$main_language = "English";`

###### Set Language variable
    if(isset($_GET['lang']) && !empty($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
       
        if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
         echo "<script type='text/javascript'> location.reload(); </script>";
        }
       }
       

###### Include Language file
       if(isset($_SESSION['lang'])){
        include "language/".$_SESSION['lang'].".php";
       }else{
        include "language/$main_language.php";
       }

###### Selecting a variable
    <?= $_TXT[0] ?>
    <?= $_TXT[1] ?>

###### Language selection
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

