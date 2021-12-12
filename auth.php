<?php include_once $_SERVER["DOCUMENT_ROOT"].'/modules/db.php'; 

$modalErrorMessages = [];
$modalSuccessMessages = [];

if (!empty($_POST)) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (!$login) {
        $modalErrorMessages[] = 'Введите ваш логин в соответсвующее поле';
    }

    if ((!$password)) {
        $modalErrorMessages[] = 'Вы не ввели пароль';
    }

    if ((!$modalErrorMessages) && (isset($_POST['login']))) {
        $userExist = "SELECT id, login, email, password, type FROM masterok_users WHERE login='$login' OR email='$login'";
 
        $userExist = $db->query($userExist)->fetch();
        
        if (is_array($userExist)) {
            if (password_verify($password, $userExist['password'])) {
                session_start();
                $_SESSION['auth'] = true;
                $_SESSION['timeout'] = time(604800);
                $_SESSION['id'] = $userExist['id'];
                $_SESSION['login'] = $userExist['login'];
                $_SESSION['userType'] = $userExist['type'];

                $modalSuccessMessages[] = "Вы успешно вошли!";
                header('Refresh: 1; URL = index.php');
            } else {
                $modalErrorMessages[] = "Неверный пароль!";
            }
        } else {
            $modalErrorMessages[] = "Такой пользователь не зарегестрирован!";
        }
    }

    (!$modalSuccessMessages) ? $modalSuccessMessages = null : $modalSuccessMessages = $modalSuccessMessages;

    $jsonData = ['errors' => $modalErrorMessages, 'success' => $modalSuccessMessages];
    //echo var_dump($jsonData);
    header('Content-type: application/json');
    echo json_encode($jsonData, JSON_UNESCAPED_UNICODE);
    
}
