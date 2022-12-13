<?php
require "_header.php";
?>

    <section class="section-main">
        <nav>
            <ul class="nav-ul">
                <li class="nav-li"><a class="navbar-brand" href="/flash">Вспышки</a></li>
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
                                <h1 class="h1">Карточка товара: <?= $flash->model; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label>Модификация вспышки:</label>
                            <div>
                                <p class="card-item-color"><?= $flash->model; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Тип вспышки:</label>
                            <div>
                                <p class="card-item-color"><?= $flash->flash_type; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Совместимые камеры:</label>
                            <div>
                                <p class="card-item-color"><?= $flash->cameras; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Дисплей:</label>
                            <div>
                                <p class="card-item-color"><?= $flash->display; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Зум:</label>
                            <div>
                                <p class="card-item-color"><?= $flash->zoom; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Фотография:</label>
                            <div>
                                <p class="card-item-color"><img class="small-img" src="../../<?= $flash->thumbnail; ?>" alt="camera"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Цена:</label>
                            <div>
                                <p class="card-item-color"><?= $flash->cost; ?></p>
                            </div>
                        </div>

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
    </section>
    </main>

<?php
require "_footer.php";
?>