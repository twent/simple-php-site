<?php include_once $_SERVER["DOCUMENT_ROOT"].'/modules/header.php';

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $subject = trim($_POST['subject']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message_text']);


    if (empty($message)) {
        $errors[] = 'Введите ваше сообщение в соответсвующее поле';
    }

    if (empty($name)) {
       $errors[] = 'Введите Ваше имя';
    }

    if (empty($email)) {
       $errors[] = 'Email не указан';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email не прошёл проверку';
    }

    if (empty($subject)) {
       $errors[] = 'Укажите тему сообщения';
    }

    if (empty($errors)) {

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <web-site@masterok.ru>' . "\r\n";

        $to = 'twentprod@gmail.com';
        $subject = "Новое сообщение с сайта МастерОК - $subject";

        if (mail($to, $emailSubject, $message, $headers)) {
            $successMessage = "<div class='alert alert-success'>Спасибо, $name, Мы получили Ваше письмо и ответим на него в ближайшее время :-)</div>";
        } else {
            $errorMessage = "<div class='alert alert-danger'>При отправке сообщения произошла ошибка. Попробуйте позже.</div>";
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
            <h1 class="mb-4  display-5">Отправьте Ваш вопрос или пожелание</h1>
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Контакт</li>
                </ol>
            </nav>
            <div class="row">
                <form class="row" method="post">
                <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
                <?php echo((!empty($successMessage)) ? $sucessMessage : '') ?>
                    <div class="col-12 mb-3">
                        <label for="" class="form-label">Тема обращения:</label>
                        <input class="form-control" type="text" name="subject" required>
                        <div class="form-text">Постарайтесь кратко описать тему сообщения</div>
                    </div>
                    <div class="col-xs-12 col-md-6 mb-3">
                        <label for="" class="form-label">Ваше Имя:</label>
                        <input class="form-control" type="text" name="name" placeholder="Иван" required>
                        <div class="form-text">Расскажите как Вас зовут</div>
                    </div>
                    <div class="col-xs-12 col-md-6 mb-3">
                        <label for="" class="form-label">Email-адрес:</label>
                        <input class="form-control" type="email" name="email" placeholder="email@mail.ru" required>
                        <div class="form-text">На этот адрес мы пришлём ответ</div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="" class="form-label">Текст обращения:</label>
                        <textarea class="form-control" name="message_text" placeholder="Ваше сообщение :-)" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning" name="send_message">Отправить сообщение</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once 'modules/footer.php'; ?>