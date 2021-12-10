<?php
   session_start();
   session_destroy();
   echo 'До новых встреч :-)';
   header('Refresh: 1; URL = index.php');
?>