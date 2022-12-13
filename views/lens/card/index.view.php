<?php
require "_header.php";
?>

    <section class="section-main">
        <nav>
            <ul class="nav-ul">
                <li class="nav-li"><a class="navbar-brand" href="/lens">Объективы</a></li>
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
                                <h1 class="h1">Карточка товара: <?= $lens->model; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label>Модификация объектива:</label>
                            <div>
                                <p class="card-item-color"><?= $lens->model; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Тип объектива:</label>
                            <div>
                                <p class="card-item-color"><?= $lens->lens_type; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Мин. фокус. расст., мм:</label>
                            <div>
                                <p class="card-item-color"><?= $lens->min_distance; ?></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>Макс. фокус. расст., мм:</label>
                            <div>
                                <p class="card-item-color"><?= $lens->max_distance; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Фотография:</label>
                            <div>
                                <p class="card-item-color"><img class="small-img" src="../../<?= $lens->thumbnail; ?>" alt="camera"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Цена:</label>
                            <div>
                                <p class="card-item-color"><?= $lens->cost; ?></p>
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