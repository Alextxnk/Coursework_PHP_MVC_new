<?php

sesstionStart();

if (!isset($_SESSION['username'])) {
// not logged in
header('Location: login');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../public/img/favicon_store.png">
    <title>iStockphoto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../public/css/admin_style.css">
</head>

<body class="bg-gray-500 h-full w-full">
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 md:grid md:grid-cols-5 gap-4">
                        <?php
                        require './views/partials/_nav.php';
                        ?>
                        <div class="col-span-4">
                            <h1 class="text-right mb-8 font-bold text-blue-400">Добро пожаловать, <?= sessionGet('username') ? sessionGet('username') : ''; ?>!</h1>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">
                                        <p class="pb-4">Количество пользователей: <?= $users; ?></p>
                                        <hr>
                                        <p class="pt-4">Количество постов: <?= $posts; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>