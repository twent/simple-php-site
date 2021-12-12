<?php require_once 'modules/header.php';

if ((!$_SESSION['auth']) || ($_SESSION['userType'] !== 'admin')) {
    header('Location: index.php');
}

$sql = "SHOW COLUMNS FROM masterok_tickets WHERE field = 'category'";
$result = $db->query($sql)->fetch();
$categories = explode("','", substr($result['Type'],6,-2));
?>

<!-- Главный блок -->
<main class="container-fluid">
   <div class="tickets py-5 bg-light">
      <div class="container">
         <h1 class="display-5 mb-4">Категории</h1>
         <nav aria-label="breadcrumb" class="mb-4">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/master">Панель управления</a></li>
                  <li class="breadcrumb-item"><a href="categories.php">Категории заявок</a></li>
              </ol>
         </nav>
         <div class="table-responsive">
             <table class="table table-hover">
                 <thead>
                    <th>#</th>
                    <th>Название категории</th>
                 </thead>
             <?php foreach ($categories as $key => $value) : ?>
                 <tr>
                     <td><?=$key?></td>
                     <td><?=$value?></td>
                 </tr>
             <?php endForeach ?>
             </table>
         </div>
      </div>
  </div>
</main>

<?php require_once 'modules/footer_auth.php';