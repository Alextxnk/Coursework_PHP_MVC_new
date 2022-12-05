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
                            <h1 class="h1">Характеристики фотоаппаратов</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Модификация фотоаппарата</th>
                            <td scope="col">Тип фотоаппарата</td>
                            <td scope="col">Разрешение матрицы</td>
                            <td scope="col">Тип матрицы</td>
                            <td scope="col">Макс. разрешение</td>
                            <td scope="col">Цена</td>
                            <td scope="col">Действия</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Nikon Z50 Kit 16-50 VR</th>
                            <th>беззеркальные</th>
                            <th>20.9</th>
                            <th>CMOS</th>
                            <th>5568 x 3712</th>
                            <th>87 890 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Canon EOS 6D Mark II Body</th>
                            <th>зеркальные</th>
                            <th>26.2</th>
                            <th>CMOS</th>
                            <th>6240х4160</th>
                            <th>139 900 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Fujifilm X-S10 Kit 15-45mm</th>
                            <th>беззеркальные</th>
                            <th>26.1</th>
                            <th>X-Trans CMOS 4</th>
                            <th>6240х4160</th>
                            <th>145 890 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Nikon D7500 Kit 18-140 VR</th>
                            <th>зеркальные</th>
                            <th>20.9</th>
                            <th>CMOS</th>
                            <th>5568 x 3712</th>
                            <th>151 990 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Nikon D780 Kit 24-120mm f/4 ED VR</th>
                            <th>зеркальные</th>
                            <th>24.5</th>
                            <th>CMOS</th>
                            <th>6048x4024</th>
                            <th>260 990 ₽</th>
                            <th><a class="view-btn" href="#">Подробнее</a></th>
                        </tr>
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
</main>

<?php
require "_footer.php";
?>