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
    <title>iStockphoto</title>
    <link rel="shortcut icon" href="../../public/img/favicon_store.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../public/css/admin_style.css">
</head>

<body class="bg-gray-500 h-full w-full">