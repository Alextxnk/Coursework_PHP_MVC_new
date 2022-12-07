<?php
require "_header.php";
?>

<section class="section-main">
    <nav>
        <ul class="nav-ul">
            <li class="nav-li"><a class="navbar-brand" href="/author">Об авторе</a></li>
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
                            <h1 class="h1">Автор</h1>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php /*dd($author); */?>
                    <?php foreach ($author as $author) : ?>
                        <div>
                            <?= $author->title; ?>
                            <!--<span><?/*= $author->title; */?></span>-->
                        </div>
                    <?php endforeach; ?>
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