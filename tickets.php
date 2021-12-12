<?php include_once 'modules/header.php'; 

$tickets = "SELECT t.*, u.name as author
            FROM masterok_tickets t 
            LEFT JOIN masterok_users u ON t.user_id = u.id 
            ORDER BY created_at DESC LIMIT 25";

$tickets = $db->query($tickets)->fetchAll();

/*
function short_text($text, $limitWords=20) {
    if (str_word_count($text, 0) > $limitWords) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limitWords]) . '...';
    }
    return $text;
}*/

function get_localized_date(string $date)   
{
  $date = new DateTime($date);
  $format ="%e %b %Y в %R";
  return strftime($format, $date->getTimestamp()); 
}

?>

<!-- Главный блок -->
<main class="container-fluid">
    <div class="tickets py-5 bg-light">
        <div class="container">
        <h1 class="mb-4 display-5">Заявки</h1>
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Заявки</li>
            </ol>
        </nav>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-3">
        <?php foreach ($tickets as $ticket) : ?>
            <div class="col">
            <div class="card ticket shadow">
                <div class="image-slider" id="image-slider-<?=$ticket['id']?>" onmouseover="slideTicketImage(<?=$ticket['id']?>)" onmouseout="slideTicketImage(<?=$ticket['id']?>)">
                    <img class="image-slider__image active" src="<?=$ticket['photo_before']?>" alt="">
                    <img class="image-slider__image" src="<?=$ticket['photo_after']?>" alt="">
                </div>
                <div class="card-body">
                <div class="card-title">
                    <a href=""><h5><?=$ticket['title']?></h5></a>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="date text-muted">
                            <svg class="svg-icon ticket-date" viewBox="0 0 20 20"><path d="M16.557,4.467h-1.64v-0.82c0-0.225-0.183-0.41-0.409-0.41c-0.226,0-0.41,0.185-0.41,0.41v0.82H5.901v-0.82c0-0.225-0.185-0.41-0.41-0.41c-0.226,0-0.41,0.185-0.41,0.41v0.82H3.442c-0.904,0-1.64,0.735-1.64,1.639v9.017c0,0.904,0.736,1.64,1.64,1.64h13.114c0.904,0,1.64-0.735,1.64-1.64V6.106C18.196,5.203,17.461,4.467,16.557,4.467 M17.377,15.123c0,0.453-0.366,0.819-0.82,0.819H3.442c-0.453,0-0.82-0.366-0.82-0.819V8.976h14.754V15.123z M17.377,8.156H2.623V6.106c0-0.453,0.367-0.82,0.82-0.82h1.639v1.23c0,0.225,0.184,0.41,0.41,0.41c0.225,0,0.41-0.185,0.41-0.41v-1.23h8.196v1.23c0,0.225,0.185,0.41,0.41,0.41c0.227,0,0.409-0.185,0.409-0.41v-1.23h1.64c0.454,0,0.82,0.367,0.82,0.82V8.156z"></path></svg>
                            <?=get_localized_date($ticket['created_at'])?>
                        </span>
                        <span class="text-muted author">
                            <svg class="svg-icon" viewBox="0 0 20 20"><path fill="none" d="M14.023,12.154c1.514-1.192,2.488-3.038,2.488-5.114c0-3.597-2.914-6.512-6.512-6.512c-3.597,0-6.512,2.916-6.512,6.512c0,2.076,0.975,3.922,2.489,5.114c-2.714,1.385-4.625,4.117-4.836,7.318h1.186c0.229-2.998,2.177-5.512,4.86-6.566c0.853,0.41,1.804,0.646,2.813,0.646c1.01,0,1.961-0.236,2.812-0.646c2.684,1.055,4.633,3.568,4.859,6.566h1.188C18.648,16.271,16.736,13.539,14.023,12.154z M10,12.367c-2.943,0-5.328-2.385-5.328-5.327c0-2.943,2.385-5.328,5.328-5.328c2.943,0,5.328,2.385,5.328,5.328C15.328,9.982,12.943,12.367,10,12.367z"></path></svg>    
                            <a href="" class="author-name"><?=$ticket['author']?></a>
                        </span>
                    </div>
                </div>
                <p class="card-text ticket"><?=substr($ticket['text'], 0, 220).'...'?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted address d-flex align-items-center justify-start">
                        <svg class="svg-icon" style="width:25%;margin-right:7px;" viewBox="0 0 20 20"><path fill="none" d="M10.292,4.229c-1.487,0-2.691,1.205-2.691,2.691s1.205,2.691,2.691,2.691s2.69-1.205,2.69-2.691S11.779,4.229,10.292,4.229z M10.292,8.535c-0.892,0-1.615-0.723-1.615-1.615S9.4,5.306,10.292,5.306c0.891,0,1.614,0.722,1.614,1.614S11.184,8.535,10.292,8.535z M10.292,1C6.725,1,3.834,3.892,3.834,7.458c0,3.567,6.458,10.764,6.458,10.764s6.458-7.196,6.458-10.764C16.75,3.892,13.859,1,10.292,1z M4.91,7.525c0-3.009,2.41-5.449,5.382-5.449c2.971,0,5.381,2.44,5.381,5.449s-5.381,9.082-5.381,9.082S4.91,10.535,4.91,7.525z"></path></svg>
                        <?=$ticket['address']?>
                    </span>
                    <small class="text-muted"><span class="ticket-category"><?=$ticket['category']?></span></small>
                </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="ticket-link w-100">Смотреть описание</a>
                </div>
            </div>
            </div>
            <?php endforeach ?>
        </div>
        </div>
    </div>
</main>

<?php include_once 'modules/footer.php'; ?>