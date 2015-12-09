<?php

   require_once('Storage.php');

    $storage = new Storage('differ', 'localhost', 'root', '');
    $method = $_SERVER['REQUEST_METHOD'];

   
    if ($method === 'POST') {
      
      $text1 = filter_var($_POST['text1'], FILTER_SANITIZE_STRING);
      $text2 = filter_var($_POST['text2'], FILTER_SANITIZE_STRING);
      $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);


      
        $storage->add(array($text1, $text2, $title));
        ##id holen
           $daten= $storage->last_id();
         header("Location: http://localhost/Differ2/result.php?id=$daten");
        // header("Location: db.f4.htw-berlin.de/Aufgaeb4/result.php?id=$daten");
         exit();
      
   }
 
?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Differ_Textvergleich</title>

    <link href="./stylesheet.css" rel="stylesheet" media="screen">
  </head>

  <body>
  <div class=wrapper>

    <header>
      <h3>Differ</h3>
      <form>

      </form>
    </header><!-- Ende header-->  

    <div class=content>
      <form action="" method="POST">
        <div class=title>
          <input type="text" name="title" placeholder="Titel eingeben" value=""/>
        </div><!--Ende title-->

        <div class=texteingabe>
         <textarea name="text1" cols="20" rows="5" ></textarea>
         <textarea name="text2" cols="20" rows="5" ></textarea>
        </div><!--Ende texteingabe-->

        <div id="buttonabsenden">
          <input type="submit" id="button" name="vergleichbutton" value="Vergleichen" />
        </div><!--Ende buttonabsenden-->
      </form>
      
    </div><!--Ende content-->

    <footer>
        
    </footer><!-- Ende footer--> 

  </div><!--Ende Wrapper--> 
  </body>
 <!-- 
  <?php
/* Redirect auf eine andere Seite im aktuell angeforderten Verzeichnis */
/*
*header("Location: http://localhost/Differ2/result.php");
*exit;*/
?>
-->
</html>
