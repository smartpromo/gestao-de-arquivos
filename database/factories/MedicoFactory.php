<?php

$factory->define(App\Medico::class, function (Faker\Generator $faker) {
    return [
        "nome" => $faker->name,
        "email" => $faker->safeEmail,
        "fone" => $faker->name,
        "especialidade" => $faker->name,
        "crm" => $faker->randomNumber(2),
        "uf_do_crm" => $faker->name,
        "cpf" => $faker->name,
        "rg" => $faker->randomNumber(2),
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
