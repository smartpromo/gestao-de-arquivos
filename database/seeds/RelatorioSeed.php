<?php

use Illuminate\Database\Seeder;

class RelatorioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'medico_id' => 2, 'data_inicial' => '01/01/2018', 'data_final' => '01/05/2018', 'relatorio' => '/tmp/phpdc4tpD', 'valor_total' => '25000.00'],
            ['id' => 3, 'medico_id' => 2, 'data_inicial' => '02/05/2018', 'data_final' => '28/05/2018', 'relatorio' => '/tmp/phpd582D8', 'valor_total' => '15.00'],
            ['id' => 4, 'medico_id' => 2, 'data_inicial' => '08/05/2018', 'data_final' => '31/05/2018', 'relatorio' => '/tmp/phpEcR54J', 'valor_total' => '5000.00'],
            ['id' => 5, 'medico_id' => 3, 'data_inicial' => '31/05/2018', 'data_final' => '31/05/2018', 'relatorio' => '/tmp/phpZluBOK', 'valor_total' => '15.00'],

        ];

        foreach ($items as $item) {
            \App\Relatorio::create($item);
        }
    }
}
