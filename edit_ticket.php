<?php require_once 'modules/header.php';

if (!$_SESSION['auth']) {
    header('Location: index.php');
}

$errorMessages = '';
$successMessages = '';

$id = $_REQUEST['id'];

if (!empty($_POST)) {
    $title = trim($_POST['title']);
    $text = trim($_POST['text']);
    $address = trim($_POST['address']);
    $category = trim($_POST['category']);
    $status = trim($_POST['status']);
    (!empty($_POST['price'])) ? $price = trim($_POST['price']) : $price = 0;
    $pictures = $_FILES['photo_after'];

    //echo '<pre>'.var_dump($_POST).'</pre>';
    
    if (isset($_POST['updateTicket'])) {

        $update_ticket = "UPDATE masterok_tickets 
            SET status = '$status', title = '$title', text = '$text', category = '$category', photo_after = '$nameUploadedPhoto', price = '$price', address = '$address'
            WHERE id = $id";
        //echo '<pre>'.var_dump($update_ticket).'</pre>';
        
        $result = $db->prepare($update_ticket)->execute();
            
        if ($result) {
            $successMessage .= "<div class='alert alert-success'>Изменения успешно сохранены 🙂</div>";
        } else {
            $errorMessage .= "<div class='alert alert-danger'>При отправке изменений произошла ошибка. Попробуйте позже.</div>";
        }

    }

}

$ticket = "SELECT * FROM masterok_tickets WHERE id=$id";
$ticket = $db->query($ticket)->fetch();

?>

<!-- Главный блок -->
<main class="container-fluid">
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="mb-4  display-5">Редактирование заявки</h1>
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item"><a href="tickets.php">Заявки</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Заявка <?=$ticket['title']?></li>
                </ol>
            </nav>
            <div class="row">
                <form class="row" method="post" enctype="multipart/form-data">
                    <?php if((!empty($errorMessage)) ? "$errorMessage" : '') ?>
                    <?php echo((!empty($successMessage)) ? "$successMessage" : '') ?>
                        <input name="user_id" value="18" hidden>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <label for="" class="form-label">Название заявки</label>
                            <input type="text" class="form-control" name="title" value="<?=$ticket['title']?>">
                            <div class="form-text">Постарайтесь кратко описать суть сообщения</div>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <input type="hidden" name="category_id" class="category-select" value="<?=$ticket['category']?>">
                            <label for="" class="form-label">Категория</label>
                            <select class="form-select" name="category" id="category-select" required>
                                <option>Выберите категорию</option>
                                <option value="1">Косметический</option>
                                <option value="2">Капитальный</option>
                                <option value="3">Электрика</option>
                                <option value="4">Сантехника</option>
                            </select>
                            <div class="form-text">Выберите вид ремонта</div>
                        </div>
                        <div class="col-sm-12 col-md-4 mb-3">
                            <input type="hidden" name="status_id" class="status-select" value="<?=$ticket['status']?>">
                            <label for="" class="form-label">Статус</label>
                            <select class="form-select" name="status" id="status-select" required>
                                <option>Выберите статус</option>
                                <option value="1">Новая</option>
                                <option value="2">Ремонтируется</option>
                                <option value="3">Отремонтировано</option>
                            </select>
                            <div class="form-text">Можно изменить статус заявки</div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Подробное описание</label>
                            <textarea class="form-control" rows="7" name="text"><?=$ticket['text']?></textarea>
                            <div class="form-text">В этом поле можете подробно описать что нужно сделать, на каком этапе сейчас и т.д.</div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Адрес объекта</label>
                            <input type="text" class="form-control" name="address" value="<?=$ticket['address']?>" required>
                            <div class="form-text">Мы работаем не только в Москве 😊</div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="" class="form-label">Желаемая цена работы</label>
                            <input type="text" class="form-control" name="max_price" value="<?=$ticket['max_price']?> &#8381;" disabled>
                            <span class="form-text">Бюджет или сумма, на которую ориентируется клиент</span>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="" class="form-label">Итоговая стоимость</label>
                            <input type="text" class="form-control" name="price" value="<?=$ticket['price']?>" required>
                            <span class="form-text">Но это ещё не точно 😏</span>
                        </div>
                        <div class="col-12 mb-3 d-flex flex-column">
                            <label class="mb-3" for="">Фото до ремонта</label>
                            <img src="<?=$ticket['photo_before']?>" class="rounded" alt="" width="350px">
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label" for="">Фото после ремонта</label>
                            <input class="form-control" name="photo_after[]" type="file" accept=".jpg, .jpeg, .png, .bmp" multiple>
                            <div class="form-text">Прикрепите фотографию помещения (объекта) после ремонта</div>
                        </div>
                        <button class="btn btn-success mt-3" type="submit" name="updateTicket">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'modules/footer.php';