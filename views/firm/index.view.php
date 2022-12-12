<?php
require "_header.php";
?>

<!--<section class="section-main">
    <nav>
        <ul class="nav-ul">
            <li class="nav-li"><a class="navbar-brand" href="/firm">О фирме</a></li>
        </ul>

        <ul class="nav-ul">
            <li class="nav-li"><a class="authorize-link" href="/admin/login">Авторизоваться</a></li>
        </ul>
    </nav>
    <div class="content">
        <div class="row">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1 class="h1">Как добраться</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="firm-ul">
                        <li>Ростов-на-Дону, ул. Шеболдаева, д. 95а (ТЦ Аверс, 2 эт.)</li>
                        <li>8(863)333-28-04</li>
                        <li>пн.-пт. 10-21, cб. 10-20, вс. и праздники 11-20</li>
                    </ul>
                    <img class="map" src="../../public/img/map.png" alt="Карта">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div>
                <span>Copyright &copy; iStockphoto, 2010-2022. All rights reserved</span>
            </div>
            <div>
                <a class="email" href="mailto:mail@example.com">email</a>
            </div>
        </div>
    </footer>
</section>-->
<?php foreach ($firm as $firm) : ?>
    <?= $firm->body; ?>
<?php endforeach; ?>

<?php
require "_footer.php";
?>