<?php

use Illuminate\Database\Seeder;

class MedicoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'nome' => 'SMART P D E ME', 'email' => 'admin@example.com', 'fone' => '50070160', 'especialidade' => 'ORT', 'crm' => 52030190, 'uf_do_crm' => 'PE', 'cpf' => '039.647.804-21', 'rg' => 55555,],
            ['id' => 3, 'nome' => 'Teste', 'email' => 'dominio@smartpromo.net.br', 'fone' => '50070160', 'especialidade' => 'ORT', 'crm' => 5555, 'uf_do_crm' => 'tt', 'cpf' => null, 'rg' => null,],

        ];

        foreach ($items as $item) {
            \App\Medico::create($item);
        }
    }
}
