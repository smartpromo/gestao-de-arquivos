<?php

use Illuminate\Database\Seeder;

class GuiaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'medico_id' => 2, 'nome_do_pacinte' => 'Leonardo', 'convenio_id' => 2, 'horario_inicial' => '23:25:34', 'horario_final' => '23:25:35', 'horario_especial' => 1, 'local_address' => 'Recife - Paratibe, Recife - PE, Brasil', 'local_latitude' => -8.0578381, 'local_longitude' => -34.8828969, 'via' => 'ÚNICA', 'tipo_de_guia' => 'SADT', 'acomodacoes' => 'ENFERMARIA', 'guia' => '/tmp/phpWuzuYY', 'created_by_id' => null, 'created_by_team_id' => null,],
            ['id' => 3, 'medico_id' => 2, 'nome_do_pacinte' => 'Italo', 'convenio_id' => 2, 'horario_inicial' => '', 'horario_final' => '', 'horario_especial' => 0, 'local_address' => 'Reino Unido', 'local_latitude' => 55.378051, 'local_longitude' => -3.435973, 'via' => 'ÚNICA', 'tipo_de_guia' => 'Selecione o tipo de guia', 'acomodacoes' => 'Selecione o tipo de acomodação', 'guia' => '/tmp/phpLQtgmR', 'created_by_id' => null, 'created_by_team_id' => null,],
            ['id' => 4, 'medico_id' => 2, 'nome_do_pacinte' => 'Leonardo', 'convenio_id' => 2, 'horario_inicial' => '23:37:41', 'horario_final' => '23:37:42', 'horario_especial' => 0, 'local_address' => 'Recife - Paratibe, Recife - PE, Brasil', 'local_latitude' => -8.0578381, 'local_longitude' => -34.8828969, 'via' => 'ÚNICA', 'tipo_de_guia' => 'Consulta', 'acomodacoes' => 'APARTAMENTO', 'guia' => '/tmp/phpEV6PJz', 'created_by_id' => 1, 'created_by_team_id' => null,],

        ];

        foreach ($items as $item) {
            \App\Guia::create($item);
        }
    }
}
