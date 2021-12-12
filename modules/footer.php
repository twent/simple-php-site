<?php


?>

<!-- Модальное окно авторизации -->
<div class="modal fade" id="modalSignin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Войдите</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form method="POST" id="modalSigninForm" enctype="multipart/form-data">
          <div class="modal-messages"></div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="login" name="login" placeholder="email@mail.ru">
            <label for="floatingInput">Email или Логин</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" id="password" name="password" placeholder="Пароль">
            <label for="floatingPassword">Пароль</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" id="signIn" name="signIn" type="submit">Войти</button>
        </form>
          <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">Вы можете пройти регистрацию, если у Вас ещё нет аккаунта</h2>
          <a href="register.php" class="w-100 py-2 mb-2 btn btn-warning rounded-4">
            <svg class="bi me-1" width="16" height="16"><use xlink:href="#twitter"></use></svg>
            Зарегистрироваться
          </a>
          <small class="text-muted">Нажимая на кнопку Зарегестрироваться Вы соглашаетесь с условиями конфиденциальности нашего сайта.</small>
      </div>
    </div>
  </div>
</div>

<!-- Футер -->
<footer class="container pt-4 my-md-5 pt-md-5 border-top">

    <div class="row d-flex justify-content-center">
        <div class="col-4 col-xl-3 d-flex flex-column align-items-center">
            <h5>Меню 1</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Ссылка 1</a></li>
                <li><a class="text-muted" href="#">Ссылка 2</a></li>
                <li><a class="text-muted" href="#">Ссылка 3</a></li>
                <li><a class="text-muted" href="#">Ссылка 4</a></li>
                <li><a class="text-muted" href="#">Ссылка 5</a></li>
                <li><a class="text-muted" href="#">Ссылка 6</a></li>
            </ul>
        </div>
        <div class="col-4 col-xl-3 d-flex flex-column align-items-center">
            <h5>Меню 2</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Ссылка 1</a></li>
                <li><a class="text-muted" href="#">Ссылка 2</a></li>
                <li><a class="text-muted" href="#">Ссылка 3</a></li>
                <li><a class="text-muted" href="#">Ссылка 4</a></li>
            </ul>
        </div>
        <div class="col-4 col-xl-3 d-flex flex-column align-items-center">
            <h5>Меню 3</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Ссылка 1</a></li>
                <li><a class="text-muted" href="#">Ссылка 2</a></li>
                <li><a class="text-muted" href="#">Ссылка 3</a></li>
                <li><a class="text-muted" href="#">Ссылка 4</a></li>
            </ul>
        </div>
                
        <div class="col-xs-12 col-xl-3 d-flex flex-column justify-content-center align-items-center">
            <img class="mb-2 align-self-center" src="img/logo_ok_dark.png" width="250px">
            <small class="d-block mb-3 text-muted">twent © 2021</small>
        </div>
    </div>
    
    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>twent © 2021 Все права защищены.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>

</footer>

<script src="../scripts/bootstrap.bundle.min.js"></script>
<script src="../scripts/script.js"></script>
</body>
</html>