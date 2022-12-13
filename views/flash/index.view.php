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
                            <h1 class="h1">Характеристики вспышек</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>

                        <tr>
                            <th scope="col">Модификация вспышки</th>
                            <td scope="col">Тип вспышки</td>
                            <td scope="col">Совместимые камеры</td>
                            <td scope="col">Дисплей</td>
                            <td scope="col">Зум</td>
                            <td scope="col">Цена</td>
                            <td scope="col">Действия</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($flash as $flash) : ?>
                                <tr>
                                    <th scope="row"><?= $flash->model; ?></th>
                                    <th><?= $flash->flash_type; ?></th>
                                    <th><?= $flash->cameras; ?></th>
                                    <th><?= $flash->display; ?></th>
                                    <th><?= $flash->zoom; ?></th>
                                    <th><?= $flash->cost; ?></th>
                                    <th><form action="/flash/card" method="GET">
                                            <input type="hidden" name="id" value="<?= $flash->id; ?>">
                                            <button class="view-btn" type="submit">Подробнее</button>
                                        </form>
                                    </th>
                                </tr>
                        <!--
                        <tr>
                            <th scope="row">YONGNUO YN560Li GN58 5600K</th>
                            <th>обычная</th>
                            <th>универсальная</th>
                            <th>Да</th>
                            <th>автоматич./ручной</th>
                            <th>8 500 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">YONGNUO YN320EX TTL 1 для Sony</th>
                            <th>обычная</th>
                            <th>Sony</th>
                            <th>Да</th>
                            <th>автоматич./ручной</th>
                            <th>10 200 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Godox V350C для Canon TTL</th>
                            <th>обычная</th>
                            <th>Canon</th>
                            <th>Да</th>
                            <th>автоматический</th>
                            <th>13 250 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Godox V350N для Nikon TTL</th>
                            <th>обычная</th>
                            <th>Nikon</th>
                            <th>Да</th>
                            <th>автоматический</th>
                            <th>13 450 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Godox V860О-II Ving ETTL для Olympus/Panasonic</th>
                            <th>обычная</th>
                            <th>Olympus, Panasonic</th>
                            <th>Да</th>
                            <th>автоматич./ручной</th>
                            <th>16 200 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>-->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
    <footer>
        <div class="footer-container">
            <div>
                <span>Copyright &copy; iStockphoto, 2010-2022. All rights reserved</span>
            </div>
            <div>
                <a class="email" href="mailto:mail@example.com">email</a>
            </div>
        </div>
        <!-- /.footer-container -->
    </footer>
</section>

<?php
require "_footer.php";
?>