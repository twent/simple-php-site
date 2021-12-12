<?php include_once $_SERVER["DOCUMENT_ROOT"].'/modules/header.php'; 

$errors = [];
$errorMessage = '';
$successMessage = '';

if (!empty($_POST)) {
    $login = trim($_POST['login']);
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $birth_date = trim($_POST['birth_date']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password_repeat = trim($_POST['password_repeat']);
    $privacy = trim($_POST['privacy']);

    if (!$login) {
        $errors[] = 'Введите ваш логин в соответсвующее поле';
    }

    if (!$name) {
       $errors[] = 'Введите Ваше имя';
    }

    if (!$lastname) {
        $errors[] = 'Введите Ваше имя';
     }

    if (!$email) {
       $errors[] = 'Email не указан';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email не прошёл проверку';
    }

    if ((!$password) || (!$password_repeat) || (strlen($password) < 6) || ($password != $password_repeat)) {
       $errors[] = 'Вы не ввели пароль или ввели подтверждение пароля неверно.<br>Также пароль должен содержать не менее 6 символов';
    }

    if (!$privacy) {
        $errors[] = 'Нужно согласиться с правилами использования сайта';
    }
    
    // Дата рождения
    if (!$birth_date) {
        $birth_date = 'NULL';
    } else {
        $birth_date = "'".date('Y-m-d', strtotime($birth_date))."'";
    }


    if ((!$errors) && (isset($_POST['register']))) {
        
        $userExists = "SELECT count(id) as count_exists_users FROM masterok_users WHERE login='$login' OR email='$email'";
        $userExists = $db->query($userExists)->fetch();

        if ($userExists['count_exists_users'] > 0) {
            $errorMessage .= "<div class='alert alert-danger'>Пользователь с таким именем или адресом эл.почты уже зарегестрирован!</div>";
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $add_user = "INSERT INTO masterok_users (login, email, name, lastname, password, birth_date) 
                        VALUES ('$login', '$email', '$name', '$lastname', '$password_hash', $birth_date)";
        $result = $db->prepare($add_user)->execute();
        
        if ($result) {
            $successMessage .= "<div class='alert alert-success'>Спасибо, $name, Мы получили Ваш запрос на регистрацию. <br>Теперь Вы можете войти на сайт, используя Выши данные.<br>Также мы отправили письмо с ссылкой на подтверждение учётной записи :-)</div>";
        } else {
            $errorMessage .= "<div class='alert alert-danger'>При отправке запроса на регистрацию произошла ошибка. Попробуйте позже.</div>";
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
            <h1 class="mb-4 display-5">Регистрация</h1>
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
                </ol>
            </nav>
            <div class="row">
                <form class="row" method="post">
                    <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
                    <?php echo((!empty($successMessage)) ? $successMessage : '') ?>
                    <div class="col-xs-12 col-md-6 mb-3">
                        <label for="name" class="form-label">Имя:</label>
                        <input class="form-control" type="text" name="name" placeholder="Имя" value="<?php $name?>" required>
                        <div class="form-text">Расскажите как Вас зовут</div>
                    </div>
                    <div class="col-xs-12 col-md-6 mb-3">
                        <label for="lastname" class="form-label">Фамилия:</label>
                        <input class="form-control" type="text" name="lastname" placeholder="Фамилия" value="<?php $lastname?>" required>
                        <div class="form-text"></div>
                    </div>
                    <div class="col-xs-12 col-lg-4 mb-3">
                        <label for="" class="form-label">Логин:</label>
                        <input class="form-control" type="text" name="login" value="<?php $login?>" required>
                        <div class="form-text">Ваше короткое имя на сайте (латинские буквы)</div>
                    </div>
                    <div class="col-xs-12 col-lg-4 mb-3">
                        <label for="" class="form-label">Email-адрес:</label>
                        <input class="form-control" type="email" name="email" placeholder="email@mail.ru" value="<?php $email?>" required>
                        <div class="form-text">На этот адрес мы пришлём письмо с потверждением регистрации</div>
                    </div>
                    <div class="col-xs-12 col-lg-4 mb-3">
                        <label for="" class="form-label">Дата рождения:</label>
                        <input class="form-control" type="date" name="birth_date" value="<?php $birth_date?>">
                        <div class="form-text">Выберите Вашу дату рождения</div>
                    </div>
                    <div class="col-xs-12 col-md-6 mb-3">
                        <label for="" class="form-label">Пароль:</label>
                        <input class="form-control" type="password" name="password" required>
                        <div class="form-text">Пароль должен содержать не менее 6 символов</div>
                    </div>
                    <div class="col-xs-12 col-md-6 mb-3">
                        <label for="" class="form-label">Повторите пароль:</label>
                        <input class="form-control" type="password" name="password_repeat" required>
                        <div class="form-text"></div>
                    </div>
                    <div class="col-12 mb-4">
                        <input class="form-check-input" type="checkbox" name="privacy" required>
                        <label for="" class="form-check-label">Подтвердите согласие с правилами сайта</label>
                    </div>
                    <button type="submit" class="btn btn-warning" name="register">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"].'/modules/footer.php'; ?>