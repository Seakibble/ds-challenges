<?php
    $dbuser = 'zradpdzw_Leeming';
    $dbpass = 'sarek12.';
    $database = 'zradpdzw_Codex';

    $link = mysqli_connect('localhost', $dbuser, $dbpass, $database);
    if(!$link) { echo "Connect failed<br/>"; exit(); }
?>