<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ConvenioSeed::class);
        $this->call(MedicoSeed::class);
        $this->call(TeamSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(GuiaSeed::class);
        $this->call(RelatorioSeed::class);

    }
}
