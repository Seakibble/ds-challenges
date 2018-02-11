<!DOCTYPE html>
<html>
  <head>
    <title>Dark Souls Challenges</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">

    <link rel="stylesheet" type="text/css" href="css/base-style.css">
    <link rel="stylesheet" type="text/css" href="css/viewer-style.css">
    <link rel="stylesheet" type="text/css" href="css/generator-style.css">

    <link rel="stylesheet" type="text/css" href="css/card-style.css">

    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400" rel="stylesheet">
  </head>

    <body>
        <div class="page-wrap">

          <header>

            <div id="header">
              <h1><a id='page-title' href="http://www.maxleeming.ca/ds-challenges">Dark Souls Challenge Generator</a></h1>
            </div>

            <nav>
              <ul>
                <li><a href="?page=1">VIEW CARDS</a></li>
                <li><a href="../ds-challenges">GENERATE CHALLENGE</a></li>
              </ul>
            </nav>

          </header>

            <div id="container">

                <?php

                include('inc/include.php');

                if ($_GET['page'])
                {
                    $cardsPerPage = 8;

                    pagination($cardsPerPage, $_GET['page']);
                    cardViewer($cardsPerPage, ($_GET['page'] - 1) * $cardsPerPage);
                    pagination($cardsPerPage, $_GET['page']);
                }
                else
                {
                    echo '<div class="generate-challenge">';

                    echo '<section>';
                    echo '<h3>Generate Challenge</h3>';

                    echo '</section>';

                    echo '<section>';
                    echo '<h3>Random Challenge</h3>';
                    cardViewer(1, rand(0, numRows() - 1));
                    echo '</section>';

                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <footer class="site-footer">
            <p>Max Leeming Copyright 2017</p>
        </footer>

    </body>
</html>
