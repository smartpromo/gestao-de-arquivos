<?php

use Illuminate\Database\Seeder;

class ConvenioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'convenio' => 'Unimed',],

        ];

        foreach ($items as $item) {
            \App\Convenio::create($item);
        }
    }
}
