<?php

$factory->define(App\Relatorio::class, function (Faker\Generator $faker) {
    return [
        "medico_id" => factory('App\Medico')->create(),
        "data_inicial" => $faker->date("d/m/Y", $max = 'now'),
        "data_final" => $faker->date("d/m/Y", $max = 'now'),
        "valor_total" => $faker->randomNumber(2),
        "created_by_id" => factory('App\User')->create(),
    ];
});
