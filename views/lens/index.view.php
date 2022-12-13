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
                            <h1 class="h1">Характеристики объективов</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Модификация объектива</th>
                            <td scope="col">Тип объектива</td>
                            <td scope="col">Мин. фокус. расст., мм</td>
                            <td scope="col">Макс. фокус. расст., мм</td>
                            <td scope="col">Цена</td>
                            <td scope="col">Действия</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lens as $lens) : ?>
                                <tr>
                                    <th scope="row"><?= $lens->model; ?></th>
                                    <th><?= $lens->lens_type; ?></th>
                                    <th><?= $lens->min_distance; ?></th>
                                    <th><?= $lens->max_distance; ?></th>
                                    <th><?= $lens->cost; ?></th>
                                    <th><form action="/lens/card" method="GET">
                                            <input type="hidden" name="id" value="<?= $lens->id; ?>">
                                            <button class="view-btn" type="submit">Подробнее</button>
                                        </form>
                                    </th>
                                </tr>
                        <!--<tr>
                            <th scope="row">Fujifilm XF 55-200mm f/3.5-4.8 R LM OIS</th>
                            <th>zoom-объектив</th>
                            <th>55</th>
                            <th>200</th>
                            <th>55 890 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Sigma AF 18-35mm f/1.8 DC HSM Art Canon EF-S</th>
                            <th>zoom-объектив</th>
                            <th>18</th>
                            <th>35</th>
                            <th>64 990 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Sigma AF 24mm f/1.4 Art DG HSM Canon EF</th>
                            <th>фикс</th>
                            <th>24</th>
                            <th>24</th>
                            <th>76 300 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Fujifilm XF 90mm f/2 R LM WR</th>
                            <th>фикс</th>
                            <th>90</th>
                            <th>90</th>
                            <th>76 990 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Fujifilm XF 50-140mm f/2.8 R LM OIS WR</th>
                            <th>zoom-объектив</th>
                            <th>50</th>
                            <th>140</th>
                            <th>114 900 ₽</th>
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