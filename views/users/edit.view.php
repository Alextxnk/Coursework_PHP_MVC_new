<?php

require '_header.php';

?>
<main>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 md:grid md:grid-cols-5 gap-4">
                    <?php
                    require './views/partials/_nav.php';
                    ?>
                    <div class="col-span-4">
                        <div class="flex justify-between mb-4">
                            <h3 class="mb-4 text-xl font-bold">Edit Post</h3>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <section class="mx-auto max-w-xl">
                                <div class="w-full">
                                    <div id="message"></div>

                                    <form id="updateUser" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">

                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                                Username
                                            </label>
                                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" value="<?= $user->username; ?>">
                                            <p id="username_err" class="text-red-500 text-sm italic error mt-2"></p>
                                        </div>

                                        <div class=" mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                                Email
                                            </label>
                                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" value="<?= $user->email; ?>">
                                            <p id="email_err" class="text-red-500 text-sm italic error mt-2"></p>
                                        </div>

                                        <div class=" mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                                                Thumbnail
                                            </label>
                                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thumbnail" name="thumbnail" type="file" value="<?= $user->thumbnail; ?>">
                                            <img src="/<?= $user->thumbnail; ?>" class="mt-3" alt="" height="80" width="120" id="imgTag" />
                                            <p id="thumbnail_err" class="text-red-500 text-sm italic error mt-2"></p>
                                        </div>

                                        <input type="hidden" name="id" value="<?= $user->id; ?>">

                                        <div class="flex items-center justify-between mt-8">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" id="submitbtn" type="submit">
                                                Update Data
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
<script src="../../public/js/validation.js"></script>
<?php
require '_footer.php';
?>