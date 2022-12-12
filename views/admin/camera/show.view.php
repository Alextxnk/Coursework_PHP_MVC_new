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
                            <div class="flex justify-between border-b">
                                <h3 class="mb-2 text-xl font-bold">Фотоаппарат <?= $camera->id; ?></h3>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Модификация фотоаппарата:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->model; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Тип фотоаппарата:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->camera_type; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Разрешение матрицы:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->matrix_resolution; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Тип матрицы:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->matrix_type; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Максимальное разрешение:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->max_resolution; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Цена:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->cost; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Картинка товара:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <img src="/<?= $camera->thumbnail; ?>" class="mt-3" alt="" width="300" id="imgTag" />
                                    </p>
                                </div>
                            </div>

                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Запись создана:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $camera->created_at; ?>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
require '_footer.php';
?>