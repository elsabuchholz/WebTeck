<?php

   require_once('Storage.php');

    $storage = new Storage('differ', 'localhost', 'root', '');
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'GET') {
      $command = $_GET['command'];
      $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
      }

    elseif ($method === 'POST') {
      $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
      $text1 = filter_var($_POST['text1'], FILTER_SANITIZE_STRING);
      $text2 = filter_var($_POST['text2'], FILTER_SANITIZE_STRING);
      $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
      $visits = $storage->count_visits();
      $lastid = $storage->last_id();
      $title = $storage->title_ausgabe();
      if (!$id) {
        $storage->add(array($text1, $text2, $title));
      }
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