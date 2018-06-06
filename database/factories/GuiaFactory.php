<?php

$factory->define(App\Guia::class, function (Faker\Generator $faker) {
    return [
        "medico_id" => factory('App\Medico')->create(),
        "nome_do_pacinte" => $faker->name,
        "convenio_id" => factory('App\Convenio')->create(),
        "horario_inicial" => $faker->date("H:i:s", $max = 'now'),
        "horario_final" => $faker->date("H:i:s", $max = 'now'),
        "horario_especial" => 0,
        "via" => collect(["Selecione o tipo de via","ÚNICA","MESMA","DIFERENTE",])->random(),
        "tipo_de_guia" => collect(["Selecione o tipo de guia","Consulta","SADT","Honorários",])->random(),
        "acomodacoes" => collect(["Selecione o tipo de acomodação","APARTAMENTO","ENFERMARIA",])->random(),
        "created_by_id" => factory('App\User')->create(),
        "created_by_team_id" => factory('App\Team')->create(),
    ];
});
