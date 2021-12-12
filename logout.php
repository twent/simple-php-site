<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/modules/header.php';

session_start();
session_destroy();
echo '<div class="container"><h1 class="my-4">До новых встреч 👌</h1></div>';

include_once $_SERVER["DOCUMENT_ROOT"].'/modules/footer_auth.php';

header('Refresh: 1; URL = index.php');

?>