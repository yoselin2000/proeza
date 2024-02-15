<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PassiveType;
use Illuminate\Database\Seeder;

class PassiveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $EAS = [
            [
                'name'      => 'Deudas con Terceros/Personales',
            ],
            [
                'name'      => 'Deudas Comerciales y de Servicios',
            ],
            [
                'name'      => 'Deudas con Otras Financieras S.R.L.',
            ],
            [
                'name'      => 'Proeza SRL.',
            ],
            [
                'name'      => 'Banco de Desarrollo Productivo S.A.M.',
            ],
            [
                'name'      => 'Banco BISA S.A.',
            ],
            [
                'name'      => 'Banco de Crédito de Bolivia S.A.',
            ],
            [
                'name'      => 'Banco de la Nación Argentina S. A.',
            ],
            [
                'name'      => 'Banco Económico S.A.',
            ],
            [
                'name'      => 'Banco Fassil S.A.',
            ],
            [
                'name'      => 'Banco Fortaleza S.A.',
            ],
            [
                'name'      => 'Banco Ganadero S.A.',
            ],
            [
                'name'      => 'Banco Mercantil Santa Cruz S.A.',
            ],
            [
                'name'      => 'Banco Nacional de Bolivia S.A.',
            ],
            [
                'name'      => 'Banco Fie S.A.',
            ],
            [
                'name'      => 'Banco Prodem S.A.',
            ],
            [
                'name'      => 'Banco Solidario S.A.',
            ],
            [
                'name'      => 'Banco Unión S.A.',
            ],
            [
                'name'      => 'Banco PYME de la Comunidad S.A.',
            ],
            [
                'name'      => 'Banco PYME Ecofuturo S.A.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "CACEF" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "Fátima" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "La Merced" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "La Sagrada Familia" R.L..',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "Madre y Maestra" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "Magisterio Rural de Chuquisaca" R.L..',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "Progreso" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "San Joaquin" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta "San Roque" R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Asunción Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Catedral de Tarija Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Catedral R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Comarapa Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Educadores Gran Chaco R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta El Chorolque Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Inca Huasi Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Jesús Nazareno R. L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Loyola Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Magisterio Rural Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Monseñor Félix Gainza Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Pío X Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Quillacollo Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San Antonio Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San Carlos Borromeo R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San josé de Bermejo Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San José de Punata Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San Martín de Porres Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San Mateo Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta San Pedro Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Abierta Trinidad R.L.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Societaria "San Martín" R.L.',
            ],
            [
                'name'      => 'El Progreso Entidad Financiera de Vivienda',
            ],
            [
                'name'      => 'La Primera Entidad Financiera de Vivienda',
            ],
            [
                'name'      => 'La Promotora Entidad Financiera de Vivienda',
            ],
            [
                'name'      => 'CIDRE IFD',
            ],
            [
                'name'      => 'CRECER IFD',
            ],
            [
                'name'      => 'DIACONÍA FRIF - IFD',
            ],
            [
                'name'      => 'FONDECO IFD',
            ],
            [
                'name'      => 'FUBODE IFD',
            ],
            [
                'name'      => 'Fundación Pro Mujer IFD',
            ],
            [
                'name'      => 'IDEPRO IFD',
            ],
            [
                'name'      => 'IMPRO IFD',
            ],
            [
                'name'      => 'Sembrar Sartawi IFD',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Cristo Rey Ltda.',
            ],
            [
                'name'      => 'Cooperativa de Ahorro y Crédito Hospicio Ltda.',
            ],
            [
                'name'      => 'CONTIGO S.R.L.',
            ],
            [
                'name'      => 'PRO APOYO',
            ],
            [
                'name'      => 'FIMIRAP SRL',
            ],
            [
                'name'      => 'Cooperativa de ahorro y crédito Sarco RL',
            ],
            [
                'name'      => 'CREDVA',
            ],
            [
                'name'      => 'Sembrador de talentos SRL',
            ],
        ];

        foreach ($EAS as $EA) {
            PassiveType::create([
                'name'      => $EA['name'],
            ]);
        }
    }
}
