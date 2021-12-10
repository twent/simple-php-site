<?php include_once $_SERVER["DOCUMENT_ROOT"].'/modules/header.php'; ?>

<!-- Главный блок -->
<main class="container-fluid">
    <div class="about py-5 bg-light">
        <div class="container">
        <h1 class="display-5 mb-4">О компании <span class="text-secondary">Мастер</span><span class="text-warning">ОК</span></h1>
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">О Компании</li>
            </ol>
        </nav>
        <div class="row g-3">
            <div class="col">
                <h2 сlass="mb-4">ООО <span class="text-secondary">Мастер</span><span class="text-warning">ОК</span></h2>
                <br>
                <h3>Что Мы умеем:</h3>
                <ul class="about-list">
                    <li>Капитальный ремонт</li>
                    <li>Косметический ремонт</li>
                    <li>Ремонт сантехники</li>
                    <li>Ремонт электропроводки</li>
                    <li>Возведение брусовых домов</li>
                    <li>Ремонт кровли</li>
                    <li>Подведение коммуникаций</li>
                </ul>
                <br>
                <hr>
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <p>С Нами ремонт пройдёт необычайно быстро и качественно.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Кто-то из <cite title="Source Title"><span class="text-secondary">Мастер</span><span class="text-warning">ОК</span></cite>
                    </figcaption>
                </figure>
                <hr>
                <br>
                <dl class="row">
                    <dt class="col-2">ИНН/ОГРН</dt>
                    <dd class="col-10">0549076789854</dd>

                    <dt class="col-2">Адрес</dt>
                    <dd class="col-10">
                        <p>Россия, гор. Ремонта,</p>
                        <p>ул. Василия Блаженного, д.124, лит. 2</p>
                    </dd>

                    <dt class="col-2">Тел.</dt>
                    <dd class="col-10">+7 (8172) 223-67-34
                </dl>  
            </div>
        </div>
        </div>
    </div>
</main>

<?php include_once 'modules/footer.php'; ?>