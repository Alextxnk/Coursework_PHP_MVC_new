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
                            <h3 class="mb-4 text-xl font-bold">Edit Category</h3>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <section class="mx-auto max-w-xl">
                                <div class="w-full">
                                    <div id="message"></div>
                                    <form id="updateCategory" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">

                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                                Name
                                            </label>
                                            <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" value="<?= $category->name; ?>">
                                            <p id="name_err" class="text-red-500 text-sm italic error mt-2"></p>
                                        </div>

                                        <input type="hidden" name="id" value="<?= $category->id; ?>">

                                        <div class="flex items-center justify-between mt-8">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
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