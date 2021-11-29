<?php



use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Creer',
                'display_name' => 'Créer un enregistrement',
                'description' => 'L utilisateur peut créer un enregistrement dans la base de données'
            ],
            [
                'name' => 'Modifier',
                'display_name' => 'Modifier un enregistrement',
                'description' => 'L utilisateur peut modifier un enregistrement de base de données existant'
            ],
            [
                'name' => 'Supprimer',
                'display_name' => 'Supprimer un enregistrement',
                'description' => 'L utilisateur peut supprimmer un enregistrement de base de données existant'
            ],
            [
                'name' => 'Utilisateurs',
                'display_name' => 'Gerer les utilisateurs',
                'description' => 'L utilisateur peut gérer l ensemble des utilisateurs'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}