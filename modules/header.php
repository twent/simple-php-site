<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/modules/db.php';

// Локализация 
//setlocale(LC_ALL, 'ru_RU.UTF-8');
// Локализация для Винды
setlocale(LC_ALL, 'russian.utf-8');
error_reporting(E_ALL);
//ini_set("display_errors", 1);

ob_start();
session_start();

if (!isset($_SESSION['auth'])) {
  $_SESSION['auth'] = "";
  header('Location: /');
  exit();
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
  
<!-- Шапка -->
<header class="bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-center justify-content-md-between">
        <a href="/" class="d-flex mt-4 mt-sm-0 align-items-center text-white text-decoration-none">
          <img src="img/logo_ok.png" width="150px" class="navbar-brand mx-3" alt="">
        </a>
        <div class="d-flex wrap-nowrap align-items-center">
        <ul class="nav d-flex flex-nowrap align-self-center gap-2">
            <li><a href="/" class="nav-link dark active py-4">Главная</a></li>
            <li><a href="tickets.php" class="nav-link dark py-4">Заявки</a></li>
            <?php if (!$_SESSION['auth']): ?>
            <li><a href="new_ticket.php" class="nav-link dark py-4">Новая Заявка</a></li>
            <?php endif; ?>
            <li><a href="contact.php" class="nav-link dark py-4">Контакт</a></li>
            <li><a href="about.php" class="nav-link dark py-4">О Нас</a></li>
        </ul>

          <!--<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
          </form>-->

          <?php if ($_SESSION['auth']): ?>
          <div class="dropdown text-end px-3">
              <a href="#" class=".d-inline-flex nav-link text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">  
                <img src="https://github.com/mdo.png" alt="<?=$_SESSION['login']?>" width="32" height="32" class="rounded-circle m-2">
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small" aria-labelledby="dropdownUser">
                  <li><a class="dropdown-item" href="new_ticket.php">Новая заявка</a></li>
                  <li><a class="dropdown-item" href="tickets.php">Заявки</a></li>
                  <li><a class="dropdown-item" href="/master">Панель управления</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Выйти</a></li>
              </ul>
          </div>
          <?php else: ?>
          <div class="text-end px-4 d-flex">
            <a class="btn btn-outline-light me-1" data-bs-toggle="modal" data-bs-target="#modalSignin">Войти</a>
            <a href="register.php" class="btn btn-warning">Регистрация</a>
          </div>
          <?php endif; ?>  

        </div>

      </div>
    </div>
</header>