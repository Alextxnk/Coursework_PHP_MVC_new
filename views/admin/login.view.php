<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iStockphoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../public/css/admin_style.css">
    <link rel="shortcut icon" href="../../public/img/favicon_store.png">
    <script src="../../public/js/app.js"></script>
</head>

<body class="bg-gray-500 h-full w-full">
    <main>
        <section class="mx-auto max-w-xl">
            <h3 class="mb-4 text-xl font-bold text-center mt-10">Вход|<!--<a href="register" class="text-blue-400">Регистрация</a>|--><a href="/" class="text-blue-400">Назад</a></h3>
            <div class="w-full">
                <div id="message">
                    <?php if (isset($_SESSION['invalid'])) : ?>
                        <div class="relative bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <?= $_SESSION['invalid']; ?>

                            <p class="closeError cursor-pointer absolute right-3 top-3 min-w-max text-right">X</p>
                        </div>
                    <?php endif; ?>
                </div>
                <form id="loginForm" action="/login/session" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
                        <p id="email_err" class="text-red-500 text-sm italic error mt-2"></p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Пароль
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="*********">
                        <p id="password_err" class="text-red-500 text-sm italic error mt-2"></p>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" id="submitbtn" type="submit">
                            Войти
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </main>
    <script>
        const closeErr = document.querySelector(".closeError");
        const message = document.getElementById("message");
        setTimeout(function() {
            message.style.display = 'none';
        }, 1500);
    </script>
    <?php
    require './views/partials/_footer.php';
    ?>