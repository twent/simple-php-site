<?php include_once 'modules/header.php'; ?>

<!-- Главный блок -->
<main class="container-fluid">
    <div class="tickets py-5 bg-light">
        <div class="container">
        <h1 class="display-5 mb-4">Информация</h1>
        <div class="vidgets row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 mb-3 text-center">
            <div class="col">
                <div class="vidget card mb-4 rounded-3 shadow">
                <div class="card-header bg-warning py-3">
                    <h4 class="my-0 fw-medium">Всего заявок</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><span><?=$ticketsCount['tickets_count']?></span><small class="text-muted fw-light"> шт.</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Общее кол-во заявок</li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="vidget card mb-4 rounded-3 shadow">
                <div class="card-header bg-primary bg-gradient py-3">
                    <h4 class="my-0 text-light fw-medium">Заявки в работе</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><span><?=$ticketsCount['tickets_count']?></span><small class="text-muted fw-light"> шт.</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>*на текущий момент</li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="vidget card mb-4 rounded-3 shadow">
                <div class="card-header bg-success bg-gradient py-3">
                    <h4 class="my-0 text-light fw-medium">Отремонтировали</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title"><span><?=$ticketsCount['tickets_count']?></span><small class="text-muted fw-light"> шт.</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Кол-во выполненных объектов</li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <h1 class="display-5 mb-4">Заявки</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-3">
            <?php for ($i = 1; $i < 5; $i++): ?>
            <div class="col">
            <div class="card ticket shadow">
                <div class="image-slider" id="image-slider-<?=$i?>" onmouseover="slideTicketImage(<?=$i?>)" onmouseout="slideTicketImage(<?=$i?>)">
                    <img class="image-slider__image active" src="img/photo/renovation/4.jpg" alt="">
                    <img class="image-slider__image" src="img/photo/renovation/1.jpg" alt="">
                </div>
                <div class="card-body">
                <div class="card-title">
                    <a href=""><h5>Название</h5></a>
                    <span class="date text-muted">20 Ноября 2020</span>
                </div>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">9 mins</small>
                    <small class="text-muted"><span class="ticket-category">Категория 1</span><span class="ticket-category">Категория 2</span></small>
                </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="ticket-link w-100">Смотреть описание</a>
                </div>
            </div>
            </div>
            <?php endfor; ?>
        </div>
        </div>
    </div>
</main>

<?php include_once 'modules/footer.php'; ?>