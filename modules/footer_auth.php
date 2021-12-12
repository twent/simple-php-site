<?php


?>

<!-- Модальное окно удаления заявки -->
<div class="modal fade" id="deleteTicket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Удаление заявки</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form method="POST" id="modalDeleteTicketForm" enctype="multipart/form-data">
          <div class="modal-messages"></div>
          <div class="form-floating mb-5">
            <p>Вы точно хотите удалить заявку?</p>
          </div>
          <button class="mb-2 btn btn-lg rounded-4 btn-danger" id="deleteTicket" name="delete_ticket" type="submit">Удалить заявку</button>
          <button class="mb-2 btn btn-lg rounded-4 btn-secondary">Отмена</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Футер -->
<footer class="container-fluid pt-4 my-md-5 pt-md-5 border-top">
    
    <div class="d-flex justify-content-between mx-2">
      <p>twent © 2021 Все права защищены.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>

</footer>

<script src="../scripts/bootstrap.bundle.min.js"></script>
<script src="../scripts/after_auth.js"></script>
</body>
</html>