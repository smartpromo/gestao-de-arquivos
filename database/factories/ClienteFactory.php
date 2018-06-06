<?php

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        "medico_id" => factory('App\Medico')->create(),
        "periodo" => $faker->date("d/m/Y", $max = 'now'),
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
