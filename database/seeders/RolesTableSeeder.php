<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
		$admin = Role::create(['name' => 'admin', 'post' => 'admin', 'acronym' => 'admin']);
		 $admin->givePermissionTo([
        	'permissions.index',
        	'permissions.store',
        	'permissions.update',
            'permissions.destroy',

        	'roles.index',
        	'roles.store',
        	'roles.update',
            'roles.destroy',

        	'cities.index',
        	'cities.store',
        	'cities.update',
        	'cities.destroy',

        	'agencies.index',
        	'agencies.store',
        	'agencies.update',
        	'agencies.destroy',

        	'ranges.index',
        	'ranges.store',
        	'ranges.update',
        	'ranges.destroy',

            'users.index',
        	'users.store',
        	'users.update',
        	'users.destroy',

            'accounts.index',
        	'accounts.store',
        	'accounts.update',
        	'accounts.destroy',

            'safes.index',
        	'safes.store',
        	'safes.update',
        	'safes.destroy',

            'boxes.index',
        	'boxes.store',
        	'boxes.update',
        	'boxes.destroy',

            'products.index',
        	'products.store',
        	'products.update',
        	'products.destroy',

            'destinations.index',
        	'destinations.store',
        	'destinations.update',
        	'destinations.destroy',

            'categories.index',
        	'categories.store',
        	'categories.update',
        	'categories.destroy',

            'applications.index',
        	'applications.store',
        	'applications.update',
        	'applications.destroy',

            'clients.index',
        	'clients.store',
        	'clients.update',
        	'clients.destroy',

            'participants.index',
        	'participants.store',
        	'participants.update',
        	'participants.destroy',

            'evaluations.index',
        	'evaluations.store',
        	'evaluations.update',
        	'evaluations.destroy',

        	'assigns.index',
        	'assigns.store',
        	'assigns.update',
        	'assigns.destroy',

            'observeds.index',
            'observeds.store',
            'observeds.update',
            'observeds.destroy',

            'approveds.index',
            'approveds.store',
            'approveds.update',
            'approveds.destroy',

            'rejecteds.index',
            'rejecteds.store',
            'rejecteds.update',
            'rejecteds.destroy',

            'disbursements.index',
            'disbursements.store',
            'disbursements.update',
            'disbursements.destroy',

            'evalationsFamily.index',
        	'evalationsFamily.store',
        	'evalationsFamily.update',
        	'evalationsFamily.destroy',

            'activities.index',
        	'activities.store',
        	'activities.update',
        	'activities.destroy',

            'credits.index',
            'credits.store',
            'credits.update',
            'credits.destroy',

            'paymentPlans.index',
            'paymentPlans.store',
            'paymentPlans.update',
            'paymentPlans.destroy',

            'recoveries.index',
            'recoveries.store',
            'recoveries.update',
            'recoveries.destroy',

            'usrApplications.index',
            'usrAssigns.index',
            'usrDisbursements.index',
            'usrRecoveries.index',
            'usrAssignments.index',

            'assignments.index',
            'assignments.store',
            'assignments.update',
            'assignments.destroy',

            'companyElements.index',
            'companyElements.store',
            'companyElements.update',
            'companyElements.destroy',

            'elementCategories.index',
            'elementCategories.store',
            'elementCategories.update',
            'elementCategories.destroy',

            'elementComponents.index',
            'elementComponents.store',
            'elementComponents.update',
            'elementComponents.destroy',

            'maintenanceHistories.index',
            'maintenanceHistories.store',
            'maintenanceHistories.update',
            'maintenanceHistories.destroy',

            'returnComponents.index',
            'returnComponents.store',
            'returnComponents.update',
            'returnComponents.destroy',

        ]);
		$ES = Role::create(['name' => 'Encargado Sucursal', 'post' => 'admin', 'acronym' => 'admin']);
        $ES->givePermissionTo([
            'observeds.store',

            'approveds.store',

            'rejecteds.store',

            'usrAssigns.index',
        ]);
		$AS = Role::create(['name' => 'Asesor', 'post' => 'admin', 'acronym' => 'admin']);
        $AS->givePermissionTo([

        	'applications.store',
        	'applications.update',
        	'applications.destroy',

            'clients.index',
        	'clients.store',

        	'participants.store',
        	'participants.update',
        	'participants.destroy',

        	'evaluations.store',
        	'evaluations.update',
        	'evaluations.destroy',

        	'evalationsFamily.store',
        	'evalationsFamily.update',
        	'evalationsFamily.destroy',

        	'activities.store',
        	'activities.update',
        	'activities.destroy',

        	'assigns.store',

            'usrApplications.index',
        ]);
		$OP = Role::create(['name' => 'Operaciones', 'post' => 'admin', 'acronym' => 'admin' ]);
        $OP->givePermissionTo([
            'disbursements.store',

            'usrDisbursements.index',
        ]);
		$TH = Role::create(['name' => 'Talento humano', 'post' => 'Jefatura Nacional de administracion y talento humano', 'acronym' => 'JNATH' ]);
        $TH->givePermissionTo([
            'usrAssignments.index',
        ]);
    }
}
