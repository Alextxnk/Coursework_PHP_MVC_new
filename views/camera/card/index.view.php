<?php
require "_header.php";
?>

    <section class="section-main">
        <nav>
            <ul class="nav-ul">
                <li class="nav-li"><a class="navbar-brand" href="/camera">Фотоаппараты</a></li>
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
                                <h1 class="h1">Карточка товара: <?= $camera->model; ?></h1>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label>Модификация фотоаппарата:</label>
                            <div>
                                <p class="card-item-color"><?= $camera->model; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Тип фотоаппарата:</label>
                            <div>
                                <p class="card-item-color"><?= $camera->camera_type; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Разрешение матрицы:</label>
                            <div>
                                <p class="card-item-color"><?= $camera->matrix_resolution; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Тип матрицы:</label>
                            <div>
                                <p class="card-item-color"><?= $camera->matrix_type; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Максимальное разрешение:</label>
                            <div>
                                <p class="card-item-color"><?= $camera->max_resolution; ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Фотография:</label>
                            <div>
                                <p class="card-item-color"><img class="small-img" src="../../<?= $camera->thumbnail; ?>" alt="camera"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Цена:</label>
                            <div>
                                <p class="card-item-color"><?= $camera->cost; ?></p>
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