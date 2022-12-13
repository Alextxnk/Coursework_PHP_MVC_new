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
                                <h3 class="mb-4 text-xl font-bold">Добавить Вспышку</h3>
                            </div>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <section class="mx-auto max-w-xl">
                                    <div class="w-full">
                                        <div id="message"></div>
                                        <form id="flashForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="model">
                                                    Модификация вспышки
                                                </label>
                                                <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="model" name="model" type="text" placeholder="YONGNUO YN560Li">
                                                <p id="model_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="flash_type">
                                                    Тип вспышки
                                                </label>
                                                <select name="flash_type" id="flash_type" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option disabled selected>Выберите Тип вспышки</option>
                                                    <option value="Обычная">Обычная</option>
                                                </select>
                                                <p class="text-red-500 text-xs italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cameras">
                                                    Совместимые камеры
                                                </label>
                                                <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cameras" name="cameras" type="text" placeholder="Canon">
                                                <p id="cameras_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="display">
                                                    Дисплей
                                                </label>
                                                <select name="display" id="display" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option disabled selected>Наличие дисплея</option>
                                                    <option value="Да">Да</option>
                                                    <option value="Нет">Нет</option>
                                                </select>
                                                <p class="text-red-500 text-xs italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="zoom">
                                                    Зум
                                                </label>
                                                <select name="zoom" id="zoom" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option disabled selected>Зум</option>
                                                    <option value="авто./ручной">авто./ручной</option>
                                                    <option value="авто.">авто.</option>
                                                </select>
                                                <p class="text-red-500 text-xs italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cost">
                                                    Цена
                                                </label>
                                                <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cost" name="cost" type="text" placeholder="16 200 ₽">
                                                <p id="cost_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                                                    Картинка товара
                                                </label>
                                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="thumbnail" name="thumbnail" type="file">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="mt-3" alt="" height="80" width="120" id="imgTag" />
                                                <p id="thumbnail_err" class="text-red-500 text-sm italic error mt-2"></p>
                                            </div>

                                            <div class="flex items-center justify-between mt-8">
                                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" id="submitbtn" type="submit">
                                                    Сохранить
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