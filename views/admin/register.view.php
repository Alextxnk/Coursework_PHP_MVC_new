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
    <script src="../../public/js/app.js"></script>
</head>

<body class="bg-gray-500 h-full w-full">
    <main>
        <section class="mx-auto max-w-xl">
            <h3 class="mb-4 text-xl font-bold text-center mt-10">Register/<a href="login" class="text-blue-400">Login</a> </h3>
            <div class="w-full">
                <div id="message"></div>
                <form id="registerForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username">
                        <p id="username_err" class="text-red-500 text-sm italic error mt-2"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email">
                        <p id="email_err" class="text-red-500 text-sm italic error mt-2"></p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="*********">
                        <p id="password_err" class="text-red-500 text-sm italic error mt-2"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                            Photo
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thumbnail" name="thumbnail" type="file">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="mt-3" alt="" height="80" width="120" id="imgTag" />
                        <p id="thumbnail_err" class="text-red-500 text-sm italic error mt-2"></p>
                    </div>


                    <div class="flex items-center justify-between mt-8">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" id="submitbtn" type="submit">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </main>
    <script src="../../public/js/validation.js"></script>
    <?php
    require './views/partials/_footer.php';
    ?>