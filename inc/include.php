<?php

function points($number)
{
    for ($i = 1; $i <= $number; $i++)
    {
        echo '<img class="point" src="images/dot.png" />';
    }
}

function numRows()
{
    require('init.inc.php');

    $sql =  "SELECT `id` FROM `ds_challenges`";
    $query = mysqli_query($link, $sql);
    $numRows = mysqli_num_rows($query);

    return($numRows);

    require('close.inc.php');
}

function cardViewer($numCards, $offset)
{
    require('init.inc.php');

    //$sql = "SELECT * FROM ds-challenges WHERE title LIKE '%".$search."%' OR description LIKE '%".$search."%' ORDER BY title";
    $sql =  "SELECT * FROM `ds_challenges` ORDER BY `id` LIMIT $numCards OFFSET $offset";

    $query = mysqli_query($link, $sql);

    echo '<div class="cards">';

    while($row = mysqli_fetch_assoc($query))
    {
        echo '<div class="card-wrapper">';
        echo '<div class="card">';

        echo '<div class="card-challenge"></div>';

        points($row['difficulty']);
        echo '<div class="card-id">#'.$row['id'].'</div>';

        echo '<div class="card-img" style="background-image: url(images/';

        if ($row['image']) {
            echo $row['image'];
        }
        else {
            echo 'ds-default.jpg';
        }

        echo ')"></div>';

        echo '<div class="card-title-background"></div>';
        echo '<h2 class="card-title">'.$row['title'].'</h2>';

        echo '<div class="card-text-background"></div>';
        echo '<div class="card-desc">'.$row['desc'].'</div>';

        echo '<div class="card-flav">';
        echo '<div class="card-flavour">'.$row['flavour'].'</div>';

        if ($row['attribution'])
            echo '<div class="card-attr">- '.$row['attribution'].'</div>';

        echo '</div>';

        echo '</div>';
        echo '</div>';
    }

    echo '</div>';

    require('close.inc.php');
}

function pagination($numCards, $page)
{
    require('init.inc.php');

    $sql =  "SELECT `id` FROM `ds_challenges`";
    $query = mysqli_query($link, $sql);
    $numRows = mysqli_num_rows($query);

    echo '<div class="page-nav"><ul>';

    for($i = 1; $i <= ceil($numRows / $numCards); $i++)
    {
        if($i == $page)
            echo '<li><a href="?page='.$i.'"><b>'.$i.'</b></a></li>';
        else
            echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
    }

    echo '</ul></div>';

    require('close.inc.php');
}

?>
