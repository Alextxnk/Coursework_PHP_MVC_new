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

                            </tbody>
                        </table>
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