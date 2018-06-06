<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$1cXhDqslfW3HIMgHZMmllOAOx7oHV5TWVcdSNO595ygUN0uGop8zS', 'role_id' => 1, 'remember_token' => '', 'team_id' => null, 'approved' => 1,],
            ['id' => 2, 'name' => 'Secretaria 1', 'email' => 'secretaria1@hotmail.com', 'password' => '$2y$10$VL1RILclixGanRjNs6hzwuUzz.znAcWj4ipvBprTijxYCMk5Zsy/2', 'role_id' => 3, 'remember_token' => null, 'team_id' => 1, 'approved' => 1,],
            ['id' => 3, 'name' => 'Secretaria 2', 'email' => 'secretaria2@hotmail.com', 'password' => '$2y$10$eN.AzQCRfbdZI8XbaXCo5OxLJEBAitNZynnZVS6/7pM9SwTZTvJru', 'role_id' => 3, 'remember_token' => null, 'team_id' => 2, 'approved' => 1,],
            ['id' => 4, 'name' => 'Medico 1', 'email' => 'medico1@hotmail.com', 'password' => '$2y$10$ZlsaH/sz/VCtb82fKFjSle/w5tYRpkDwf.10NOzoOqHSZ8P6WKv9e', 'role_id' => 2, 'remember_token' => null, 'team_id' => 1, 'approved' => 1,],
            ['id' => 5, 'name' => 'Médico 2', 'email' => 'medico2@hotmail.com', 'password' => '$2y$10$Jb3KAxiiReKV4W8CHqeN2uFWZJNSyy47xBo5naKk/xnodWwsFgpVq', 'role_id' => 2, 'remember_token' => null, 'team_id' => 2, 'approved' => 1,],
            ['id' => 6, 'name' => 'Gerente', 'email' => 'gerente@hotmail.com', 'password' => '$2y$10$9dnRp02pTUzpGlznBzyuD.SioMveZfiVd7bpTuMUOe3oCshGCBkMG', 'role_id' => 4, 'remember_token' => null, 'team_id' => null, 'approved' => 1,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
