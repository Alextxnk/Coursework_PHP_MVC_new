<?php
require __DIR__ . "./partials/_header.php";
?>

<!--<section class="section-main">
    <nav>
        <ul class="nav-ul">
            <li class="nav-li"><a class="navbar-brand" href="/">Главная</a></li>
        </ul>

        <ul class="nav-ul">
            <li class="nav-li"><a class="authorize-link" href="/admin/login">Авторизоваться</a></li>
        </ul>
    </nav>
    <div class="content">
        <div class="row">
            <div class="card-item">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1 class="h1">Фотоаппараты</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/camera">
                        <img class="photo_equipment" src="../public/img/photo_camera.jpg" alt="Фотоаппараты">
                    </a>
                </div>
            </div>
            <div class="card-item">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1 class="h1">Объективы</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/lens">
                        <img class="photo_equipment" src="../public/img/lens.jpg" alt="Объективы">
                    </a>
                </div>
            </div>
            <div class="card-item">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1 class="h1">Вспышки</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/flash">
                        <img class="photo_equipment" src="../public/img/flash.jpg" alt="Вспышки">
                    </a>
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
<?php foreach ($main as $main) : ?>
    <?= $main->body; ?>
<?php endforeach; ?>

<?php
require __DIR__ . "./partials/_footer.php";
?>
