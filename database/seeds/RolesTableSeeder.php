<?php

use App\Role;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrateur',
                'display_name' => 'Administrateur',
                'description' => 'Utilisateur a acces à toutes les fonctionnalités du systeme'
            ],
            [
                'name' => 'Utilisateur-normal',
                'display_name' => 'Utilisateur normal',
                'description' => 'Utilisateur peut créer des donnees dans le systeme'
            ]
            
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}