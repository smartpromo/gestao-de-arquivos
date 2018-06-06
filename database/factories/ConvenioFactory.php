<?php

$factory->define(App\Convenio::class, function (Faker\Generator $faker) {
    return [
        "convenio" => $faker->name,
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
