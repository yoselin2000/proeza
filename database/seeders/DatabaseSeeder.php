<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AgenciesTableSeeder::class);
        $this->call(RangesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DestinationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(EvaluationsTableSeeder::class);
        $this->call(CaedecsTableSeeder::class);


        $this->call(AssetTypesTableSeeder::class);
        $this->call(PassiveTypesTableSeeder::class);
        $this->call(ExpenseTypesTableSeeder::class);
        $this->call(ComplementTypesTableSeeder::class);
        $this->call(MaintenanceDetailsTableSeeder::class);
        $this->call(ComponentDetailsTableSeeder::class);

        $this->call(WarrantiesTableSeeder::class);
        $this->call(ElementsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(ElementCategoriesTableSeeder::class);
        $this->call(CompanyElementsTableSeeder::class);


        // $this->call(RecoveriesTableSeeder::class);

    }
}
