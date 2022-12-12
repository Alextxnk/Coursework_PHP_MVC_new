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
                                <h3 class="mb-2 text-xl font-bold">Фирма <?= $firm->id; ?></h3>
                            </div>
                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Секция:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $firm->body; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="lg:flex items-center border-b pb-2">
                                <div class="min-w-max">
                                    <h2 class="font-bold text-lg mr-4">Запись создана:</h2>
                                </div>
                                <div class="w-3/5">
                                    <p>
                                        <?= $firm->created_at; ?>
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