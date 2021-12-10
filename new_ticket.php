<?php require_once 'modules/header.php';

$errors = [];
$errorMessage = '';
$successMessage = '';

if (!empty($_POST)) {
    $user_id = '18';
    $title = trim($_POST['title']);
    $text = trim($_POST['text']);
    $address = trim($_POST['address']);
    $category = trim($_POST['category']);
    $max_price = trim($_POST['max_price']);

    if (!$title) {
        $errors[] = 'Введите название заявки';
    }

    if (!$text) {
       $errors[] = 'Введите описание';
    }

    if (!$address) {
        $errors[] = 'Введите адрес';
     }

    if (!$category) {
       $errors[] = 'Вы не указали категорию';
    }

    if (!$max_price) {
        $errors[] = 'Нужно указать желаемый лимит по стоимости работ';
    }

    function isset_file($name) {
        return (isset($_FILES[$name]) && $_FILES[$name]['error'] != UPLOAD_ERR_NO_FILE);
    }
    
    if(!isset_file('photo_before')) {
        $errors[] = 'Нужно загрузить фото Вашего помещения до ремонта';
    } else {
        $pictures = $_FILES['photo_before'];
    }  
    

    if ((!$errors) && (isset($_POST['addTicket']))) {
        
        foreach ($pictures['error'] as $key => $error) {
            $tmp_name = $pictures['tmp_name'][$key];
            $name = $pictures['name'][$key];
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $name = uniqid('uploaded_', true).'.'.$extension;
               
            if ($error === UPLOAD_ERR_OK) {
                if (move_uploaded_file(
                    $tmp_name,
                    $_SERVER["DOCUMENT_ROOT"].'/upload/'.$name
                )) {
                    $nameUploadedPhoto = '/upload/'.$name;
                    //$successMessage .= "<div class='alert alert-success'>Файл $name сохранён :-) <br></div>";
                } else {
                    $errors[] = "Не удалось преместить загруженный файл $name<br>";
                }
            } else {
                $errors[] = "Ошибка при загрузке $name<br>";
            }
            
        }

        $add_ticket = "INSERT INTO masterok_tickets (user_id, title, text, category, photo_before, max_price, address) 
                        VALUES ('$user_id', '$title', '$text', '$category', '$nameUploadedPhoto', '$max_price', '$address')";
        
        $result = $db->prepare($add_ticket)->execute();
        
        if ($result) {
            $successMessage .= "<div class='alert alert-success'>Спасибо, Мы получили Вашу заявку :-)<br>В ближайшее время мы обработаем её и свяжемся с Вами</div>";
        } else {
            $errorMessage .= "<div class='alert alert-danger'>При отправке Заявки произошла ошибка. Попробуйте позже.</div>";
        }
    } else {
        $allErrors = join('<br>', $errors);
        $errorMessage = "<div class='alert alert-danger'>{$allErrors}</div>";
    }
}

?>

<!-- Главный блок -->
<main class="container-fluid">
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="mb-4  display-5">Добавление заявки</h1>
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Новая заявка</li>
                </ol>
            </nav>
            <div class="row">
                    <form class="row" method="post" enctype="multipart/form-data">
                        <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
                        <?php echo((!empty($successMessage)) ? $successMessage : '') ?>
                        <input name="user_id" value="18" hidden>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="" class="form-label">Название заявки</label>
                            <input type="text" class="form-control" name="title" value="<?=$title?>" required>
                            <div class="form-text">Постарайтесь кратко описать суть сообщения</div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="" class="form-label">Категория</label>
                            <select class="form-select" name="category" required>
                                <option selected>Выберите категорию</option>
                                <option value="1">Косметический</option>
                                <option value="2">Капитальный</option>
                                <option value="3">Электрика</option>
                                <option value="4">Сантехника</option>
                            </select>
                            <div class="form-text">Выберите вид ремонта</div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Подробное описание</label>
                            <textarea class="form-control" rows="7" name="text"><?=$text?></textarea>
                            <div class="form-text">В этом поле можете подробно описать что нужно сделать, на каком этапе сейчас и т.д.</div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="form-label">Адрес объекта</label>
                            <input type="text" class="form-control" name="address" value="<?=$address?>" required>
                            <div class="form-text">Мы работаем не только в Москве 😊</div>
                        </div>
                        <div class="col-sm-12 col-md-5 mb-3">
                            <label for="" class="form-label">Желаемая цена работы</label>
                            <input type="text" class="form-control" name="max_price" value="<?=$max_price?>" required>
                            <span class="form-text">Укажите Ваш бюджет или сумму, на которую ориентируетесь</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label" for="">Прикрепите фото</label>
                            <input class="form-control" name="photo_before[]" type="file" accept=".jpg, .jpeg, .png, .bmp" multiple>
                            <div class="form-text">Прикрепите фотографию помещения (объекта) до ремонта</div>
                        </div>
                        <button class="btn btn-warning mt-3" type="submit" name="addTicket">Отправить</button>
                    </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'modules/footer.php';