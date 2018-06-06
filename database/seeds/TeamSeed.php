<?php

use Illuminate\Database\Seeder;

class TeamSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Clinica 1',],
            ['id' => 2, 'name' => 'Clinica 2',],
            ['id' => 3, 'name' => 'Clinica 3',],

        ];

        foreach ($items as $item) {
            \App\Team::create($item);
        }
    }
}
