<?php include_once $_SERVER["DOCUMENT_ROOT"].'/modules/db.php'; 

$modalErrorMessages = [];
$modalSuccessMessages = [];

if (!empty($_POST)) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $cockie = trim($_POST['cookie']);

    if (!$login) {
        $modalErrorMessages[] = 'Введите ваш логин в соответсвующее поле';
    }

    if ((!$password)) {
        $modalErrorMessages[] = 'Вы не ввели пароль';
    }

    if ((!$modalErrorMessages) && (isset($_POST['login']))) {
        $userExist = "SELECT id, login, email, password FROM masterok_users WHERE login='$login' OR email='$login'";
 
        $userExist = $db->query($userExist)->fetch();
        
        if (is_array($userExist)) {
            if (password_verify($password, $userExist['password'])) {
                session_start();
                $_SESSION['auth'] = true;
                $_SESSION['timeout'] = time(604800);
                $_SESSION['id'] = $userExist['id'];
                $_SESSION['login'] = $userExist['login'];

                $modalSuccessMessages[] = "Вы успешно вошли!";
                header('Refresh: 1; URL = index.php');
            } else {
                $modalErrorMessages[] = "Неверный пароль!";
            }
        } else {
            $modalErrorMessages[] = "Такой пользователь не зарегестрирован!";
        }
    }

    $jsonData = ['errors' => $modalErrorMessages, 'success' => $modalSuccessMessages];
    header('Content-type: application/json');
    echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
    
}
