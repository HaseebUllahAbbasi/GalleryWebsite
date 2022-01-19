<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gallery');

define('TABLE_USER', 'user_table');
define('TABLE_RATING', 'rating_table');
define('TABLE_PHOTOS', 'photostable');
define('TABLE_CONTEST', 'contest');
define('TABLE_VOTE', 'vote_table');
define('TABLE_ADMIN', 'admin_table');
define('TABLE_PARTICIPANT', 'participanttable');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); 
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

