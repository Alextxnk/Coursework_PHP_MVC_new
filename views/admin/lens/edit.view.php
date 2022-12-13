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
                                <h3 class="mb-4 text-xl font-bold">Редактировать Объектив</h3>
                            </div>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <section class="mx-auto max-w-xl">
                                    <div class="w-full">
                                        <div id="message"></div>
                                        <form id="updateLens" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="model">
                                                    Модификация объектива
                                                </label>
                                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="model" name="model" type="text" value="<?= $lens->model; ?>">
                                                <p id="model_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="lens_type">
                                                    Тип объектива
                                                </label>
                                                <select name="lens_type" id="lens_type" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option disabled selected>Выберите Тип фотоаппарата</option>
                                                    <option value="Zoom-объектив">Zoom-объектив</option>
                                                    <option value="Фикс">Фикс</option>
                                                </select>
                                                <p class="text-red-500 text-xs italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="min_distance">
                                                    Мин. фокус. расст., мм
                                                </label>
                                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="min_distance" name="min_distance" type="text" value="<?= $lens->min_distance; ?>">
                                                <p id="min_distance_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="max_distance">
                                                    Макс. фокус. расст., мм
                                                </label>
                                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="max_distance" name="max_distance" type="text" value="<?= $lens->max_distance; ?>">
                                                <p id="max_distance_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cost">
                                                    Цена
                                                </label>
                                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cost" name="cost" type="text" value="<?= $lens->cost; ?>">
                                                <p id="cost_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                                                    Картинка товара
                                                </label>
                                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thumbnail" name="thumbnail" type="file" value="<?= $lens->thumbnail; ?>">
                                                <img src="/<?= $lens->thumbnail; ?>" class="mt-3" alt="" height="80" width="120" id="imgTag" />
                                                <p id="thumbnail_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <input type="hidden" name="id" value="<?= $lens->id; ?>">

                                            <div class="flex items-center justify-between mt-8">
                                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                                    Обновить
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
    <script src="../../../public/js/validation.js"></script>
<?php
require '_footer.php';
?>