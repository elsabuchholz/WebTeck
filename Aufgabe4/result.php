<?php

   require_once('Storage.php');

    $storage = new Storage('differ', 'localhost', 'root', '');
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
      
      $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
      $visits = $storage->count_visits();
      $daten= $storage->get($id);
      $title = $daten['title'];
      $text1 = $daten['text1'];
      $text2 = $daten['text2'];
     var_dump($daten);
   }
 
?>
<?php
// Include the diff class
    require_once dirname(__FILE__).'/lib/Diff.php';

    // Include two sample files for comparison
   $t1 = explode("\n",$text1);
    $t2 = explode("\n",$text2);

    // Options for generating the diff
    $options = array(
      //'ignoreWhitespace' => true,
      //'ignoreCase' => true,
    );

    // Initialize the diff class
    $diff = new Diff ($t1, $t2, $options);

    ?>


<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Differ_Textvergleich</title>


    <link href="./stylesheet.css" rel="stylesheet" media="screen">
    <link href="./styles.css" rel="stylesheet" media="screen">
  </head>

  <body>
  <div class=wrapper>

    <header>
      <h3>Differ</h3>
      <form>

      </form>
    </header><!-- Ende header-->  

    <div class=content>
      
      <div class="result">
     
      
      <p>Besucheranzahl:<?=$visits?></p>
      <p>Titel:<?= $title;?></p>

     <p> <?php

    // Generate an inline diff
     
    require_once dirname(__FILE__).'/lib/Diff/Renderer/Html/Inline.php';
    $renderer = new Diff_Renderer_Html_Inline;
    echo $diff->render($renderer);

    ?>
     </p>
      </div>

      


    </div><!--Ende content-->

    <footer>
        
    </footer><!-- Ende footer--> 

  </div><!--Ende Wrapper-->
  </body>
</html>