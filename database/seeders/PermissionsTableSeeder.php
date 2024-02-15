<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permission list
        Permission::create(['name' => 'permissions.index']);
        Permission::create(['name' => 'permissions.store']);
        Permission::create(['name' => 'permissions.update']);
        Permission::create(['name' => 'permissions.destroy']);
        //Role list
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.store']);
        Permission::create(['name' => 'roles.update']);
        Permission::create(['name' => 'roles.destroy']);
        //City list
        Permission::create(['name' => 'cities.index']);
        Permission::create(['name' => 'cities.store']);
        Permission::create(['name' => 'cities.update']);
        Permission::create(['name' => 'cities.destroy']);
        //Agency list
        Permission::create(['name' => 'agencies.index']);
        Permission::create(['name' => 'agencies.store']);
        Permission::create(['name' => 'agencies.update']);
        Permission::create(['name' => 'agencies.destroy']);
        //range list
        Permission::create(['name' => 'ranges.index']);
        Permission::create(['name' => 'ranges.store']);
        Permission::create(['name' => 'ranges.update']);
        Permission::create(['name' => 'ranges.destroy']);
        //User list
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.update']);
        Permission::create(['name' => 'users.destroy']);
        //accounts list
        Permission::create(['name' => 'accounts.index']);
        Permission::create(['name' => 'accounts.store']);
        Permission::create(['name' => 'accounts.update']);
        Permission::create(['name' => 'accounts.destroy']);
        //safes list
        Permission::create(['name' => 'safes.index']);
        Permission::create(['name' => 'safes.store']);
        Permission::create(['name' => 'safes.update']);
        Permission::create(['name' => 'safes.destroy']);
        //boxes list
        Permission::create(['name' => 'boxes.index']);
        Permission::create(['name' => 'boxes.store']);
        Permission::create(['name' => 'boxes.update']);
        Permission::create(['name' => 'boxes.destroy']);
        //products list
        Permission::create(['name' => 'products.index']);
        Permission::create(['name' => 'products.store']);
        Permission::create(['name' => 'products.update']);
        Permission::create(['name' => 'products.destroy']);
        //destinations list
        Permission::create(['name' => 'destinations.index']);
        Permission::create(['name' => 'destinations.store']);
        Permission::create(['name' => 'destinations.update']);
        Permission::create(['name' => 'destinations.destroy']);
        //categories list
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.store']);
        Permission::create(['name' => 'categories.update']);
        Permission::create(['name' => 'categories.destroy']);
        //applications list
        Permission::create(['name' => 'applications.index']);
        Permission::create(['name' => 'applications.store']);
        Permission::create(['name' => 'applications.update']);
        Permission::create(['name' => 'applications.destroy']);
        //clients list
        Permission::create(['name' => 'clients.index']);
        Permission::create(['name' => 'clients.store']);
        Permission::create(['name' => 'clients.update']);
        Permission::create(['name' => 'clients.destroy']);
        //participants list
        Permission::create(['name' => 'participants.index']);
        Permission::create(['name' => 'participants.store']);
        Permission::create(['name' => 'participants.update']);
        Permission::create(['name' => 'participants.destroy']);
        //evaluations list
        Permission::create(['name' => 'evaluations.index']);
        Permission::create(['name' => 'evaluations.store']);
        Permission::create(['name' => 'evaluations.update']);
        Permission::create(['name' => 'evaluations.destroy']);


        //Assign list*
        Permission::create(['name' => 'assigns.index']);
        Permission::create(['name' => 'assigns.store']);
        Permission::create(['name' => 'assigns.update']);
        Permission::create(['name' => 'assigns.destroy']);
        //Observed list*
        Permission::create(['name' => 'observeds.index']);
        Permission::create(['name' => 'observeds.store']);
        Permission::create(['name' => 'observeds.update']);
        Permission::create(['name' => 'observeds.destroy']);
        //Approved list*
        Permission::create(['name' => 'approveds.index']);
        Permission::create(['name' => 'approveds.store']);
        Permission::create(['name' => 'approveds.update']);
        Permission::create(['name' => 'approveds.destroy']);
        //Rejected list*
        Permission::create(['name' => 'rejecteds.index']);
        Permission::create(['name' => 'rejecteds.store']);
        Permission::create(['name' => 'rejecteds.update']);
        Permission::create(['name' => 'rejecteds.destroy']);
        //Disbursement list*
        Permission::create(['name' => 'disbursements.index']);
        Permission::create(['name' => 'disbursements.store']);
        Permission::create(['name' => 'disbursements.update']);
        Permission::create(['name' => 'disbursements.destroy']);


        //evalationsFamily list
        Permission::create(['name' => 'evalationsFamily.index']);
        Permission::create(['name' => 'evalationsFamily.store']);
        Permission::create(['name' => 'evalationsFamily.update']);
        Permission::create(['name' => 'evalationsFamily.destroy']);
        //activities list
        Permission::create(['name' => 'activities.index']);
        Permission::create(['name' => 'activities.store']);
        Permission::create(['name' => 'activities.update']);
        Permission::create(['name' => 'activities.destroy']);


        //credits list*
        Permission::create(['name' => 'credits.index']);
        Permission::create(['name' => 'credits.store']);
        Permission::create(['name' => 'credits.update']);
        Permission::create(['name' => 'credits.destroy']);
        //paymentPlans list*
        Permission::create(['name' => 'paymentPlans.index']);
        Permission::create(['name' => 'paymentPlans.store']);
        Permission::create(['name' => 'paymentPlans.update']);
        Permission::create(['name' => 'paymentPlans.destroy']);
        //recoveries list*
        Permission::create(['name' => 'recoveries.index']);
        Permission::create(['name' => 'recoveries.store']);
        Permission::create(['name' => 'recoveries.update']);
        Permission::create(['name' => 'recoveries.destroy']);



        //assets list*
        Permission::create(['name' => 'assignments.index']);
        Permission::create(['name' => 'assignments.store']);
        Permission::create(['name' => 'assignments.update']);
        Permission::create(['name' => 'assignments.destroy']);
        //assets list*
        Permission::create(['name' => 'companyElements.index']);
        Permission::create(['name' => 'companyElements.store']);
        Permission::create(['name' => 'companyElements.update']);
        Permission::create(['name' => 'companyElements.destroy']);
        //assets list*
        Permission::create(['name' => 'elementCategories.index']);
        Permission::create(['name' => 'elementCategories.store']);
        Permission::create(['name' => 'elementCategories.update']);
        Permission::create(['name' => 'elementCategories.destroy']);
        //assets list*
        Permission::create(['name' => 'elementComponents.index']);
        Permission::create(['name' => 'elementComponents.store']);
        Permission::create(['name' => 'elementComponents.update']);
        Permission::create(['name' => 'elementComponents.destroy']);
        //assets list*
        Permission::create(['name' => 'maintenanceHistories.index']);
        Permission::create(['name' => 'maintenanceHistories.store']);
        Permission::create(['name' => 'maintenanceHistories.update']);
        Permission::create(['name' => 'maintenanceHistories.destroy']);
        //assets list*
        Permission::create(['name' => 'returnComponents.index']);
        Permission::create(['name' => 'returnComponents.store']);
        Permission::create(['name' => 'returnComponents.update']);
        Permission::create(['name' => 'returnComponents.destroy']);




        //usrApplications list
        Permission::create(['name' => 'usrApplications.index']);

        //usrAssigns list
        Permission::create(['name' => 'usrAssigns.index']);

        //usrDisbursements list
        Permission::create(['name' => 'usrDisbursements.index']);

        //usrRecoveries list
        Permission::create(['name' => 'usrRecoveries.index']);

        //usrAssignments list
        Permission::create(['name' => 'usrAssignments.index']);
    }
}
