<?php
session_start();
$user_auth = isset($_SESSION['user']);
if(!$user_auth){
    header('Location: /');
}
?>

<?php
    require_once("../../layouts/header.php");
    require_once("../../layouts/nav.php");
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="h1-wrap">
                    <h1 class="mt-5">Названы лучшие автомобили 2022 года</h1>
                    <img class="mt-3" src="https://i.infocar.ua/img/news-/148484/ins/1644420597833.jpg" class="img-fluid" alt="..."><br>
                    <font class="mt-5"size="+1">
                    Опубликован список финалистов конкурса World Car of the Year 2022 (Всемирный авто года 2022). За престижную награду поборются десять моделей, а победителя назовут 13 апреля на автошоу в Нью-Йорке. Об этом сообщает официальный сайт конкурса.</font><br>
                    <font class="mt-5"size="+1">Среди претендентов на победу - сразу семь кроссоверов. Четыре модели - электрические, а шесть - оснащены двигателями внутреннего сгорания.</font><br>
                    <font class="mt-5"size="+1">Финалисты конкурса World Car of the Year 2022:</font><br>
                    <ul>
                        <li>Audi Q4 e-tron</li>
                        <li>Cupra Formentor</li>
                        <li>Ford Mustang Mach-E</li>
                        <li>Genesis G70</li>
                        <li>Honda Civic</li>
                        <li>Hyundai Ioniq 5</li>
                        <li>Hyundai Tucson</li>
                        <li>Kia EV6</li>
                        <li>Lexus NX</li>
                        <li>Subaru BRZ/Toyota GR86</li>
                    </ul>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/KN5UsGpUIn0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    
                </div>
            </div>
        </div>
    </div>
<?php
    require_once ("../../layouts/footer.php");
?>

</body>


