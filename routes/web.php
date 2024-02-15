<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\RangeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\SafeController;
use App\Http\Controllers\Admin\BoxController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Credit\ApplicationController;
use App\Http\Controllers\Credit\ClientController;
use App\Http\Controllers\Credit\ParticipantController;
use App\Http\Controllers\Credit\EvaluationController;

use App\Http\Controllers\Revision\AssignController;
use App\Http\Controllers\Revision\ObservedController;
use App\Http\Controllers\Revision\ApprovedController;
use App\Http\Controllers\Revision\RejectedController;
use App\Http\Controllers\Revision\DisbursementController;

use App\Http\Controllers\Evaluation\ChildrenController;
use App\Http\Controllers\Evaluation\ReferenceController;
use App\Http\Controllers\Evaluation\HomeAddressController;
use App\Http\Controllers\Evaluation\WarrantyController;
use App\Http\Controllers\Evaluation\ElementController;
use App\Http\Controllers\Evaluation\DocumentController;
use App\Http\Controllers\Evaluation\ReceptionController;
use App\Http\Controllers\Evaluation\ArchiveTypeController;
use App\Http\Controllers\Evaluation\ArchiveController;
use App\Http\Controllers\Evaluation\AssetTypeController;
use App\Http\Controllers\Evaluation\PassiveTypeController;
use App\Http\Controllers\Evaluation\CurrentAssetController;
use App\Http\Controllers\Evaluation\FamilyFixedAssetController;
use App\Http\Controllers\Evaluation\FamilyPassiveController;
use App\Http\Controllers\Evaluation\ExpenseTypeController;
use App\Http\Controllers\Evaluation\FamilyExpenseController;
use App\Http\Controllers\Evaluation\EvaluationAssetController;
use App\Http\Controllers\Evaluation\EvaluationPassiveController;
use App\Http\Controllers\Evaluation\CaedecController;
use App\Http\Controllers\Evaluation\ActivityController;

use App\Http\Controllers\Activity\InventoryController;
use App\Http\Controllers\Activity\AverageSaleController;
use App\Http\Controllers\Activity\SaleController;
use App\Http\Controllers\Activity\CashController;
use App\Http\Controllers\Activity\ShoppingController;
use App\Http\Controllers\Activity\SaleDetailController;
use App\Http\Controllers\Activity\ComplementTypeController;
use App\Http\Controllers\Activity\ComplementController;
use App\Http\Controllers\Activity\BusinessExpenseController;
use App\Http\Controllers\Activity\BusinessCurrentAssetController;
use App\Http\Controllers\Activity\BusinessFixedAssetController;
use App\Http\Controllers\Activity\BusinessPassiveController;
use App\Http\Controllers\Activity\BusinessAddressController;
use App\Http\Controllers\Activity\ArticleController;
use App\Http\Controllers\Activity\SupplyController;
use App\Http\Controllers\Activity\VehicleController;
use App\Http\Controllers\Activity\ComponentDetailController;
use App\Http\Controllers\Activity\ComponentController;
use App\Http\Controllers\Activity\TransportController;
use App\Http\Controllers\Activity\TransportDetailController;
use App\Http\Controllers\Activity\MaintenanceDetailController;
use App\Http\Controllers\Activity\MaintenanceController;
use App\Http\Controllers\Activity\CompanyController;
use App\Http\Controllers\Activity\DebtController;

use App\Http\Controllers\Portfolio\CreditController;
use App\Http\Controllers\Portfolio\PaymentPlanController;
use App\Http\Controllers\Portfolio\RecoveryController;

use App\Http\Controllers\Print\PrintController;

use App\Http\Controllers\Asset\AssignmentController;
use App\Http\Controllers\Asset\ElementCategoryController;
use App\Http\Controllers\Asset\CompanyElementController;
use App\Http\Controllers\Asset\ElementComponentController;
use App\Http\Controllers\Asset\MaintenanceHistoryController;
use App\Http\Controllers\Asset\ReturnComponentController;

use App\Http\Controllers\Qr\QrController;

use App\Http\Controllers\Print\PrintComponentQrController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});

Route::middleware(['auth'])->group(function () {

    // Admin
	// Permission
	Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index')
        ->middleware('permission:permissions.index');
    Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store')
        ->middleware('permission:permissions.store');
    Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update')
        ->middleware('permission:permissions.update');
    Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')
        ->middleware('permission:permissions.destroy');

	// Role
	Route::get('roles', [RoleController::class, 'index'])->name('roles.index')
        ->middleware('permission:roles.index');
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store')
        ->middleware('permission:roles.store');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update')
        ->middleware('permission:roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    // City
    Route::get('cities', [CityController::class, 'index'])->name('cities.index')
        ->middleware('permission:cities.index');
    Route::post('cities/store', [CityController::class, 'store'])->name('cities.store')
        ->middleware('permission:cities.store');
    Route::put('cities/{city}', [CityController::class, 'update'])->name('cities.update')
        ->middleware('permission:cities.update');
    Route::delete('cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy')
        ->middleware('permission:cities.destroy');

    // Agency
    Route::get('agencies', [AgencyController::class, 'index'])->name('agencies.index')
        ->middleware('permission:agencies.index');
    Route::post('agencies/store', [AgencyController::class, 'store'])->name('agencies.store')
        ->middleware('permission:agencies.store');
    Route::put('agencies/{agency}', [AgencyController::class, 'update'])->name('agencies.update')
        ->middleware('permission:agencies.update');
    Route::delete('agencies/{agency}', [AgencyController::class, 'destroy'])->name('agencies.destroy')
        ->middleware('permission:agencies.destroy');

    // Range
    Route::get('ranges', [RangeController::class, 'index'])->name('ranges.index')
        ->middleware('permission:ranges.index');
    Route::post('ranges/store', [RangeController::class, 'store'])->name('ranges.store')
        ->middleware('permission:ranges.store');
    Route::put('ranges/{range}', [RangeController::class, 'update'])->name('ranges.update')
        ->middleware('permission:ranges.update');
    Route::delete('ranges/{range}', [RangeController::class, 'destroy'])->name('ranges.destroy')
        ->middleware('permission:ranges.destroy');

    // User
    Route::get('users', [UserController::class, 'index'])->name('users.index')
        ->middleware('permission:users.index');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store')
        ->middleware('permission:users.store');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')
        ->middleware('permission:users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')
        ->middleware('permission:users.destroy');

    // Account
    Route::get('accounts', [AccountController::class, 'index'])->name('accounts.index')
        ->middleware('permission:accounts.index');
    Route::post('accounts/store', [AccountController::class, 'store'])->name('accounts.store')
        ->middleware('permission:accounts.store');
    Route::put('accounts/{account}', [AccountController::class, 'update'])->name('accounts.update')
        ->middleware('permission:accounts.update');
    Route::delete('accounts/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy')
        ->middleware('permission:accounts.destroy');

    // Safe
    Route::get('safes', [SafeController::class, 'index'])->name('safes.index')
        ->middleware('permission:safes.index');
    Route::post('safes/store', [SafeController::class, 'store'])->name('safes.store')
        ->middleware('permission:safes.store');
    Route::put('safes/{safe}', [SafeController::class, 'update'])->name('safes.update')
        ->middleware('permission:safes.update');
    Route::delete('safes/{safe}', [SafeController::class, 'destroy'])->name('safes.destroy')
        ->middleware('permission:safes.destroy');

    // Box
    Route::get('boxes', [BoxController::class, 'index'])->name('boxes.index')
        ->middleware('permission:boxes.index');
    Route::post('boxes/store', [BoxController::class, 'store'])->name('boxes.store')
        ->middleware('permission:boxes.store');
    Route::put('boxes/{box}', [BoxController::class, 'update'])->name('boxes.update')
        ->middleware('permission:boxes.update');
    Route::delete('boxes/{box}', [BoxController::class, 'destroy'])->name('boxes.destroy')
        ->middleware('permission:boxes.destroy');

    // Product
    Route::get('products', [ProductController::class, 'index'])->name('products.index')
        ->middleware('permission:products.index');
    Route::post('products/store', [ProductController::class, 'store'])->name('products.store')
        ->middleware('permission:products.store');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update')
        ->middleware('permission:products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')
        ->middleware('permission:products.destroy');

    // Destination
    Route::get('destinations', [DestinationController::class, 'index'])->name('destinations.index')
        ->middleware('permission:destinations.index');
    Route::post('destinations/store', [DestinationController::class, 'store'])->name('destinations.store')
        ->middleware('permission:destinations.store');
    Route::put('destinations/{destination}', [DestinationController::class, 'update'])->name('destinations.update')
        ->middleware('permission:destinations.update');
    Route::delete('destinations/{destination}', [DestinationController::class, 'destroy'])->name('destinations.destroy')
        ->middleware('permission:destinations.destroy');

    // Category
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index')
        ->middleware('permission:categories.index');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store')
        ->middleware('permission:categories.store');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update')
        ->middleware('permission:categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')
        ->middleware('permission:categories.destroy');


    // Credits
    // Applications
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index')
        ->middleware('permission:applications.index');
    Route::post('applications/store', [ApplicationController::class, 'store'])->name('applications.store')
        ->middleware('permission:applications.store');
    Route::put('applications/{application}', [ApplicationController::class, 'update'])->name('applications.update')
        ->middleware('permission:applications.update');
    Route::delete('applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy')
        ->middleware('permission:applications.destroy');

    // Client
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index')
        ->middleware('permission:clients.index');
    Route::post('clients/store', [ClientController::class, 'store'])->name('clients.store')
        ->middleware('permission:clients.store');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update')
        ->middleware('permission:clients.update');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy')
        ->middleware('permission:clients.destroy');

    // Participant
    Route::get('participants', [ParticipantController::class, 'index'])->name('participants.index')
        ->middleware('permission:participants.index');
    Route::post('participants/store', [ParticipantController::class, 'store'])->name('participants.store')
        ->middleware('permission:participants.store');
    Route::put('participants/{participant}', [ParticipantController::class, 'update'])->name('participants.update')
        ->middleware('permission:participants.update');
    Route::delete('participants/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy')
        ->middleware('permission:participants.destroy');

    // Evaluation
    Route::get('evaluations', [EvaluationController::class, 'index'])->name('evaluations.index')
        ->middleware('permission:evaluations.index');
    Route::post('evaluations/store', [EvaluationController::class, 'store'])->name('evaluations.store')
        ->middleware('permission:evaluations.store');
    Route::put('evaluations/{evaluation}', [EvaluationController::class, 'update'])->name('evaluations.update')
        ->middleware('permission:evaluations.update');
    Route::delete('evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy')
        ->middleware('permission:evaluations.destroy');


    // Revision
    // Assing
    Route::get('assigns', [AssignController::class, 'index'])->name('assigns.index')
        ->middleware('permission:assigns.index');
    Route::post('assigns/store', [AssignController::class, 'store'])->name('assigns.store')
        ->middleware('permission:assigns.store');
    Route::put('assigns/{assign}', [AssignController::class, 'update'])->name('assigns.update')
        ->middleware('permission:assigns.update');
    Route::delete('assigns/{assign}', [AssignController::class, 'destroy'])->name('assigns.destroy')
        ->middleware('permission:assigns.destroy');

    // Observed
    Route::get('observeds', [ObservedController::class, 'index'])->name('observeds.index')
        ->middleware('permission:observeds.index');
    Route::post('observeds/store', [ObservedController::class, 'store'])->name('observeds.store')
        ->middleware('permission:observeds.store');
    Route::put('observeds/{observed}', [ObservedController::class, 'update'])->name('observeds.update')
        ->middleware('permission:observeds.update');
    Route::delete('observeds/{observed}', [ObservedController::class, 'destroy'])->name('observeds.destroy')
        ->middleware('permission:observeds.destroy');

    // Approved
    Route::get('approveds', [ApprovedController::class, 'index'])->name('approveds.index')
        ->middleware('permission:approveds.index');
    Route::post('approveds/store', [ApprovedController::class, 'store'])->name('approveds.store')
        ->middleware('permission:approveds.store');
    Route::put('approveds/{approved}', [ApprovedController::class, 'update'])->name('approveds.update')
        ->middleware('permission:approveds.update');
    Route::delete('approveds/{approved}', [ApprovedController::class, 'destroy'])->name('approveds.destroy')
        ->middleware('permission:approveds.destroy');

    // Rejected
    Route::get('rejecteds', [RejectedController::class, 'index'])->name('rejecteds.index')
        ->middleware('permission:rejecteds.index');
    Route::post('rejecteds/store', [RejectedController::class, 'store'])->name('rejecteds.store')
        ->middleware('permission:rejecteds.store');
    Route::put('rejecteds/{rejected}', [RejectedController::class, 'update'])->name('rejecteds.update')
        ->middleware('permission:rejecteds.update');
    Route::delete('rejecteds/{rejected}', [RejectedController::class, 'destroy'])->name('rejecteds.destroy')
        ->middleware('permission:rejecteds.destroy');

    // Disbursement
    Route::get('disbursements', [DisbursementController::class, 'index'])->name('disbursements.index')
        ->middleware('permission:disbursements.index');
    Route::post('disbursements/store', [DisbursementController::class, 'store'])->name('disbursements.store')
        ->middleware('permission:disbursements.store');
    Route::put('disbursements/{disbursement}', [DisbursementController::class, 'update'])->name('disbursements.update')
        ->middleware('permission:disbursements.update');
    Route::delete('disbursements/{disbursement}', [DisbursementController::class, 'destroy'])->name('disbursements.destroy')
        ->middleware('permission:disbursements.destroy');


    // evalationsFamily
    // childrens
    Route::get('childrens', [ChildrenController::class, 'index'])->name('childrens.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('childrens/store', [ChildrenController::class, 'store'])->name('childrens.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('childrens/{children}', [ChildrenController::class, 'update'])->name('childrens.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('childrens/{children}', [ChildrenController::class, 'destroy'])->name('childrens.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // references
    Route::get('references', [ReferenceController::class, 'index'])->name('references.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('references/store', [ReferenceController::class, 'store'])->name('references.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('references/{reference}', [ReferenceController::class, 'update'])->name('references.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('references/{reference}', [ReferenceController::class, 'destroy'])->name('references.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // home_addresses
    Route::get('home_addresses', [HomeAddressController::class, 'index'])->name('home_addresses.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('home_addresses/store', [HomeAddressController::class, 'store'])->name('home_addresses.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('home_addresses/{homeAddress}', [HomeAddressController::class, 'update'])->name('home_addresses.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('home_addresses/{homeAddress}', [HomeAddressController::class, 'destroy'])->name('home_addresses.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // warranties
    Route::get('warranties', [WarrantyController::class, 'index'])->name('warranties.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('warranties/store', [WarrantyController::class, 'store'])->name('warranties.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('warranties/{warranty}', [WarrantyController::class, 'update'])->name('warranties.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('warranties/{warranty}', [WarrantyController::class, 'destroy'])->name('warranties.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // elements
    Route::get('elements', [ElementController::class, 'index'])->name('elements.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('elements/store', [ElementController::class, 'store'])->name('elements.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('elements/{element}', [ElementController::class, 'update'])->name('elements.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('elements/{element}', [ElementController::class, 'destroy'])->name('elements.destroy')
        ->middleware('permission:evalationsFamily.destroy');
    Route::get('obtener-documentos/{id}', [ElementController::class, 'obtenerDocumentos']);

    // documents
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('documents/{document}', [DocumentController::class, 'update'])->name('documents.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // receptions
    Route::get('receptions', [ReceptionController::class, 'index'])->name('receptions.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('receptions/store', [ReceptionController::class, 'store'])->name('receptions.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('receptions/{reception}', [ReceptionController::class, 'update'])->name('receptions.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('receptions/{reception}', [ReceptionController::class, 'destroy'])->name('receptions.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // archive_types
    Route::get('archive_types', [ArchiveTypeController::class, 'index'])->name('archive_types.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('archive_types/store', [ArchiveTypeController::class, 'store'])->name('archive_types.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('archive_types/{archiveType}', [ArchiveTypeController::class, 'update'])->name('archive_types.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('archive_types/{archiveType}', [ArchiveTypeController::class, 'destroy'])->name('archive_types.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // archives
    Route::get('archives', [ArchiveController::class, 'index'])->name('archives.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('archives/store', [ArchiveController::class, 'store'])->name('archives.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('archives/{archive}', [ArchiveController::class, 'update'])->name('archives.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('archives/{archive}', [ArchiveController::class, 'destroy'])->name('archives.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // asset_types
    Route::get('asset_types', [AssetTypeController::class, 'index'])->name('asset_types.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('asset_types/store', [AssetTypeController::class, 'store'])->name('asset_types.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('asset_types/{assetType}', [AssetTypeController::class, 'update'])->name('asset_types.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('asset_types/{assetType}', [AssetTypeController::class, 'destroy'])->name('asset_types.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // passive_types
    Route::get('passive_types', [PassiveTypeController::class, 'index'])->name('passive_types.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('passive_types/store', [PassiveTypeController::class, 'store'])->name('passive_types.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('passive_types/{passiveType}', [PassiveTypeController::class, 'update'])->name('passive_types.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('passive_types/{passiveType}', [PassiveTypeController::class, 'destroy'])->name('passive_types.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // family_fixed_assets
    Route::get('family_fixed_assets', [FamilyFixedAssetController::class, 'index'])->name('family_fixed_assets.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('family_fixed_assets/store', [FamilyFixedAssetController::class, 'store'])->name('family_fixed_assets.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('family_fixed_assets/{familyFixedAsset}', [FamilyFixedAssetController::class, 'update'])->name('family_fixed_assets.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('family_fixed_assets/{familyFixedAsset}', [FamilyFixedAssetController::class, 'destroy'])->name('family_fixed_assets.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // family_passives
    Route::get('family_passives', [FamilyPassiveController::class, 'index'])->name('family_passives.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('family_passives/store', [FamilyPassiveController::class, 'store'])->name('family_passives.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('family_passives/{familyPassive}', [FamilyPassiveController::class, 'update'])->name('family_passives.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('family_passives/{familyPassive}', [FamilyPassiveController::class, 'destroy'])->name('family_passives.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // expense_types
    Route::get('expense_types', [ExpenseTypeController::class, 'index'])->name('expense_types.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('expense_types/store', [ExpenseTypeController::class, 'store'])->name('expense_types.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('expense_types/{expenseType}', [ExpenseTypeController::class, 'update'])->name('expense_types.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('expense_types/{expenseType}', [ExpenseTypeController::class, 'destroy'])->name('expense_types.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // family_expenses
    Route::get('family_expenses', [FamilyExpenseController::class, 'index'])->name('family_expenses.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('family_expenses/store', [FamilyExpenseController::class, 'store'])->name('family_expenses.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('family_expenses/{familyExpense}', [FamilyExpenseController::class, 'update'])->name('family_expenses.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('family_expenses/{familyExpense}', [FamilyExpenseController::class, 'destroy'])->name('family_expenses.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // evaluation_assets
    Route::get('evaluation_assets', [EvaluationAssetController::class, 'index'])->name('evaluation_assets.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('evaluation_assets/store', [EvaluationAssetController::class, 'store'])->name('evaluation_assets.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('evaluation_assets/{evaluationAsset}', [EvaluationAssetController::class, 'update'])->name('evaluation_assets.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('evaluation_assets/{evaluationAsset}', [EvaluationAssetController::class, 'destroy'])->name('evaluation_assets.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // evaluation_passives
    Route::get('evaluation_passives', [EvaluationPassiveController::class, 'index'])->name('evaluation_passives.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('evaluation_passives/store', [EvaluationPassiveController::class, 'store'])->name('evaluation_passives.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('evaluation_passives/{evaluationPassive}', [EvaluationPassiveController::class, 'update'])->name('evaluation_passives.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('evaluation_passives/{evaluationPassive}', [EvaluationPassiveController::class, 'destroy'])->name('evaluation_passives.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // Caedec
    Route::get('caedecs', [CaedecController::class, 'index'])->name('caedecs.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('caedecs/store', [CaedecController::class, 'store'])->name('caedecs.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('caedecs/{caedec}', [CaedecController::class, 'update'])->name('caedecs.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('caedecs/{caedec}', [CaedecController::class, 'destroy'])->name('caedecs.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // Activity
    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index')
        ->middleware('permission:evalationsFamily.index');
    Route::post('activities/store', [ActivityController::class, 'store'])->name('activities.store')
        ->middleware('permission:evalationsFamily.store');
    Route::put('activities/{activity}', [ActivityController::class, 'update'])->name('activities.update')
        ->middleware('permission:evalationsFamily.update');
    Route::delete('activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy')
        ->middleware('permission:evalationsFamily.destroy');

    // companies
    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index')
        ->middleware('permission:activities.index');
    Route::post('companies/store', [CompanyController::class, 'store'])->name('companies.store')
        ->middleware('permission:activities.store');
    Route::put('companies/{company}', [CompanyController::class, 'update'])->name('companies.update')
        ->middleware('permission:activities.update');
    Route::delete('companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy')
        ->middleware('permission:activities.destroy');

    //Activity
    // Inventory
    Route::get('inventories', [InventoryController::class, 'index'])->name('inventories.index')
        ->middleware('permission:activities.index');
    Route::post('inventories/store', [InventoryController::class, 'store'])->name('inventories.store')
        ->middleware('permission:activities.store');
    Route::put('inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update')
        ->middleware('permission:activities.update');
    Route::delete('inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventories.destroy')
        ->middleware('permission:activities.destroy');

    // AverageSale
    Route::get('average_sales', [AverageSaleController::class, 'index'])->name('average_sales.index')
        ->middleware('permission:activities.index');
    Route::post('average_sales/store', [AverageSaleController::class, 'store'])->name('average_sales.store')
        ->middleware('permission:activities.store');
    Route::put('average_sales/{averageSale}', [AverageSaleController::class, 'update'])->name('average_sales.update')
        ->middleware('permission:activities.update');
    Route::delete('average_sales/{averageSale}', [AverageSaleController::class, 'destroy'])->name('average_sales.destroy')
        ->middleware('permission:activities.destroy');

    // Sale
    Route::get('sales', [SaleController::class, 'index'])->name('sales.index')
        ->middleware('permission:activities.index');
    Route::post('sales/store', [SaleController::class, 'store'])->name('sales.store')
        ->middleware('permission:activities.store');
    Route::put('sales/{sale}', [SaleController::class, 'update'])->name('sales.update')
        ->middleware('permission:activities.update');
    Route::delete('sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy')
        ->middleware('permission:activities.destroy');

    // Cash
    Route::get('cashes', [CashController::class, 'index'])->name('cashes.index')
        ->middleware('permission:activities.index');
    Route::post('cashes/store', [CashController::class, 'store'])->name('cashes.store')
        ->middleware('permission:activities.store');
    Route::put('cashes/{cash}', [CashController::class, 'update'])->name('cashes.update')
        ->middleware('permission:activities.update');
    Route::delete('cashes/{cash}', [CashController::class, 'destroy'])->name('cashes.destroy')
        ->middleware('permission:activities.destroy');

    // Shopping
    Route::get('shoppings', [ShoppingController::class, 'index'])->name('shoppings.index')
        ->middleware('permission:activities.index');
    Route::post('shoppings/store', [ShoppingController::class, 'store'])->name('shoppings.store')
        ->middleware('permission:activities.store');
    Route::put('shoppings/{shopping}', [ShoppingController::class, 'update'])->name('shoppings.update')
        ->middleware('permission:activities.update');
    Route::delete('shoppings/{shopping}', [ShoppingController::class, 'destroy'])->name('shoppings.destroy')
        ->middleware('permission:activities.destroy');

    // saleDetails
    Route::get('saleDetails', [SaleDetailController::class, 'index'])->name('saleDetails.index')
        ->middleware('permission:activities.index');
    Route::post('saleDetails/store', [SaleDetailController::class, 'store'])->name('saleDetails.store')
        ->middleware('permission:activities.store');
    Route::put('saleDetails/{saleDetail}', [SaleDetailController::class, 'update'])->name('saleDetails.update')
        ->middleware('permission:activities.update');
    Route::delete('saleDetails/{saleDetail}', [SaleDetailController::class, 'destroy'])->name('saleDetails.destroy')
        ->middleware('permission:activities.destroy');

    // complementType
    Route::get('complement_types', [ComplementTypeController::class, 'index'])->name('complement_types.index')
    ->middleware('permission:activities.index');
    Route::post('complement_types/store', [ComplementTypeController::class, 'store'])->name('complement_types.store')
    ->middleware('permission:activities.store');
    Route::put('complement_types/{complementType}', [ComplementTypeController::class, 'update'])->name('complement_types.update')
    ->middleware('permission:activities.update');
    Route::delete('complement_types/{complementType}', [ComplementTypeController::class, 'destroy'])->name('complement_types.destroy')
    ->middleware('permission:activities.destroy');

    // Complement
    Route::get('complements', [ComplementController::class, 'index'])->name('complements.index')
        ->middleware('permission:activities.index');
    Route::post('complements/store', [ComplementController::class, 'store'])->name('complements.store')
        ->middleware('permission:activities.store');
    Route::put('complements/{complement}', [ComplementController::class, 'update'])->name('complements.update')
        ->middleware('permission:activities.update');
    Route::delete('complements/{complement}', [ComplementController::class, 'destroy'])->name('complements.destroy')
        ->middleware('permission:activities.destroy');

    // BusinessExpense
    Route::get('business_expenses', [BusinessExpenseController::class, 'index'])->name('business_expenses.index')
        ->middleware('permission:activities.index');
    Route::post('business_expenses/store', [BusinessExpenseController::class, 'store'])->name('business_expenses.store')
        ->middleware('permission:activities.store');
    Route::put('business_expenses/{businessExpense}', [BusinessExpenseController::class, 'update'])->name('business_expenses.update')
        ->middleware('permission:activities.update');
    Route::delete('business_expenses/{businessExpense}', [BusinessExpenseController::class, 'destroy'])->name('business_expenses.destroy')
        ->middleware('permission:activities.destroy');

    // BusinessFixedAsset
    Route::get('business_current_assets', [BusinessCurrentAssetController::class, 'index'])->name('business_current_assets.index')
        ->middleware('permission:activities.index');
    Route::post('business_current_assets/store', [BusinessCurrentAssetController::class, 'store'])->name('business_current_assets.store')
        ->middleware('permission:activities.store');
    Route::put('business_current_assets/{businessCurrentAsset}', [BusinessCurrentAssetController::class, 'update'])->name('business_current_assets.update')
        ->middleware('permission:activities.update');
    Route::delete('business_current_assets/{businessCurrentAsset}', [BusinessCurrentAssetController::class, 'destroy'])->name('business_current_assets.destroy')
        ->middleware('permission:activities.destroy');

    // BusinessFixedAsset
    Route::get('business_fixed_assets', [BusinessFixedAssetController::class, 'index'])->name('business_fixed_assets.index')
        ->middleware('permission:activities.index');
    Route::post('business_fixed_assets/store', [BusinessFixedAssetController::class, 'store'])->name('business_fixed_assets.store')
        ->middleware('permission:activities.store');
    Route::put('business_fixed_assets/{businessFixedAsset}', [BusinessFixedAssetController::class, 'update'])->name('business_fixed_assets.update')
        ->middleware('permission:activities.update');
    Route::delete('business_fixed_assets/{businessFixedAsset}', [BusinessFixedAssetController::class, 'destroy'])->name('business_fixed_assets.destroy')
        ->middleware('permission:activities.destroy');

    // BusinessPassive
    Route::get('business_passives', [BusinessPassiveController::class, 'index'])->name('business_passives.index')
        ->middleware('permission:activities.index');
    Route::post('business_passives/store', [BusinessPassiveController::class, 'store'])->name('business_passives.store')
        ->middleware('permission:activities.store');
    Route::put('business_passives/{businessPassive}', [BusinessPassiveController::class, 'update'])->name('business_passives.update')
        ->middleware('permission:activities.update');
    Route::delete('business_passives/{businessPassive}', [BusinessPassiveController::class, 'destroy'])->name('business_passives.destroy')
        ->middleware('permission:activities.destroy');

    // BusinessAddress
    Route::get('business_addresses', [BusinessAddressController::class, 'index'])->name('business_addresses.index')
        ->middleware('permission:activities.index');
    Route::post('business_addresses/store', [BusinessAddressController::class, 'store'])->name('business_addresses.store')
        ->middleware('permission:activities.store');
    Route::put('business_addresses/{businessAddress}', [BusinessAddressController::class, 'update'])->name('business_addresses.update')
        ->middleware('permission:activities.update');
    Route::delete('business_addresses/{businessAddress}', [BusinessAddressController::class, 'destroy'])->name('business_addresses.destroy')
        ->middleware('permission:activities.destroy');

    // Article
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index')
        ->middleware('permission:activities.index');
    Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store')
        ->middleware('permission:activities.store');
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update')
        ->middleware('permission:activities.update');
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')
        ->middleware('permission:activities.destroy');


    // Supply
    Route::get('supplies', [SupplyController::class, 'index'])->name('supplies.index')
        ->middleware('permission:activities.index');
    Route::post('supplies/store', [SupplyController::class, 'store'])->name('supplies.store')
        ->middleware('permission:activities.store');
    Route::put('supplies/{supply}', [SupplyController::class, 'update'])->name('supplies.update')
        ->middleware('permission:activities.update');
    Route::delete('supplies/{supply}', [SupplyController::class, 'destroy'])->name('supplies.destroy')
        ->middleware('permission:activities.destroy');

    // Vehicle
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles.index')
        ->middleware('permission:activities.index');
    Route::post('vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store')
        ->middleware('permission:activities.store');
    Route::put('vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update')
        ->middleware('permission:activities.update');
    Route::delete('vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy')
        ->middleware('permission:activities.destroy');

    // component_details
    Route::get('component_details', [ComponentDetailController::class, 'index'])->name('component_details.index')
        ->middleware('permission:activities.index');
    Route::post('component_details/store', [ComponentDetailController::class, 'store'])->name('component_details.store')
        ->middleware('permission:activities.store');
    Route::put('component_details/{componentDetail}', [ComponentDetailController::class, 'update'])->name('component_details.update')
        ->middleware('permission:activities.update');
    Route::delete('component_details/{componentDetail}', [ComponentDetailController::class, 'destroy'])->name('component_details.destroy')
        ->middleware('permission:activities.destroy');

    // components
    Route::get('components', [ComponentController::class, 'index'])->name('components.index')
        ->middleware('permission:activities.index');
    Route::post('components/store', [ComponentController::class, 'store'])->name('components.store')
        ->middleware('permission:activities.store');
    Route::put('components/{component}', [ComponentController::class, 'update'])->name('components.update')
        ->middleware('permission:activities.update');
    Route::delete('components/{component}', [ComponentController::class, 'destroy'])->name('components.destroy')
        ->middleware('permission:activities.destroy');

    // transports
    Route::get('transports', [TransportController::class, 'index'])->name('transports.index')
        ->middleware('permission:activities.index');
    Route::post('transports/store', [TransportController::class, 'store'])->name('transports.store')
        ->middleware('permission:activities.store');
    Route::put('transports/{transport}', [TransportController::class, 'update'])->name('transports.update')
        ->middleware('permission:activities.update');
    Route::delete('transports/{transport}', [TransportController::class, 'destroy'])->name('transports.destroy')
        ->middleware('permission:activities.destroy');

    // transportDetails
    Route::get('transport_details', [TransportDetailController::class, 'index'])->name('transport_details.index')
        ->middleware('permission:activities.index');
    Route::post('transport_details/store', [TransportDetailController::class, 'store'])->name('transport_details.store')
        ->middleware('permission:activities.store');
    Route::put('transport_details/{transportDetail}', [TransportDetailController::class, 'update'])->name('transport_details.update')
        ->middleware('permission:activities.update');
    Route::delete('transport_details/{transportDetail}', [TransportDetailController::class, 'destroy'])->name('transport_details.destroy')
        ->middleware('permission:activities.destroy');

    // maintenanceDetails
    Route::get('maintenance_details', [MaintenanceDetailController::class, 'index'])->name('maintenance_details.index')
        ->middleware('permission:activities.index');
    Route::post('maintenance_details/store', [MaintenanceDetailController::class, 'store'])->name('maintenance_details.store')
        ->middleware('permission:activities.store');
    Route::put('maintenance_details/{maintenanceDetail}', [MaintenanceDetailController::class, 'update'])->name('maintenance_details.update')
        ->middleware('permission:activities.update');
    Route::delete('maintenance_details/{maintenanceDetail}', [MaintenanceDetailController::class, 'destroy'])->name('maintenance_details.destroy')
        ->middleware('permission:activities.destroy');

    // maintenances
    Route::get('maintenances', [MaintenanceController::class, 'index'])->name('maintenances.index')
        ->middleware('permission:activities.index');
    Route::post('maintenances/store', [MaintenanceController::class, 'store'])->name('maintenances.store')
        ->middleware('permission:activities.store');
    Route::put('maintenances/{maintenance}', [MaintenanceController::class, 'update'])->name('maintenances.update')
        ->middleware('permission:activities.update');
    Route::delete('maintenances/{maintenance}', [MaintenanceController::class, 'destroy'])->name('maintenances.destroy')
        ->middleware('permission:activities.destroy');

    // debts
    Route::get('debts', [DebtController::class, 'index'])->name('debts.index')
        ->middleware('permission:activities.index');
    Route::post('debts/store', [DebtController::class, 'store'])->name('debts.store')
        ->middleware('permission:activities.store');
    Route::put('debts/{debt}', [DebtController::class, 'update'])->name('debts.update')
        ->middleware('permission:activities.update');
    Route::delete('debts/{debt}', [DebtController::class, 'destroy'])->name('debts.destroy')
        ->middleware('permission:activities.destroy');

    // activos jose
    // assignments
    Route::get('assignments', [AssignmentController::class, 'index'])->name('assignments.index')
        ->middleware('permission:assignments.index');
    Route::post('assignments/store', [AssignmentController::class, 'store'])->name('assignments.store')
        ->middleware('permission:assignments.store');
    Route::put('assignments/{assignment}', [AssignmentController::class, 'update'])->name('assignments.update')
        ->middleware('permission:assignments.update');
    Route::delete('assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('assignments.destroy')
        ->middleware('permission:assignments.destroy');

    // elementCategorys
    Route::get('elementCategories', [ElementCategoryController::class, 'index'])->name('elementCategories.index')
    ->middleware('permission:companyElements.index');
    Route::post('elementCategories/store', [ElementCategoryController::class, 'store'])->name('elementCategories.store')
        ->middleware('permission:companyElements.store');
    Route::put('elementCategories/{elementCategory}', [ElementCategoryController::class, 'update'])->name('elementCategories.update')
        ->middleware('permission:companyElements.update');
    Route::delete('elementCategories/{elementCategory}', [ElementCategoryController::class, 'destroy'])->name('elementCategories.destroy')
        ->middleware('permission:companyElements.destroy');
    // ruta complementaria
    Route::get('obtener-companyElements/{id}', [ElementCategoryController::class, 'obtenerCompanyElements']);

    // companyElements
    Route::get('companyElements', [CompanyElementController::class, 'index'])->name('companyElements.index')
    ->middleware('permission:elementCategories.index');
    Route::post('companyElements/store', [CompanyElementController::class, 'store'])->name('companyElements.store')
        ->middleware('permission:elementCategories.store');
    Route::put('companyElements/{companyElement}', [CompanyElementController::class, 'update'])->name('companyElements.update')
        ->middleware('permission:elementCategories.update');
    Route::delete('companyElements/{companyElement}', [CompanyElementController::class, 'destroy'])->name('companyElements.destroy')
        ->middleware('permission:elementCategories.destroy');

    // elementComponents
    Route::get('elementComponents', [ElementComponentController::class, 'index'])->name('elementComponents.index')
    ->middleware('permission:elementComponents.index');
    Route::post('elementComponents/store', [ElementComponentController::class, 'store'])->name('elementComponents.store')
        ->middleware('permission:elementComponents.store');
    Route::put('elementComponents/{elementComponent}', [ElementComponentController::class, 'update'])->name('elementComponents.update')
        ->middleware('permission:elementComponents.update');
    Route::delete('elementComponents/{elementComponent}', [ElementComponentController::class, 'destroy'])->name('elementComponents.destroy')
        ->middleware('permission:elementComponents.destroy');

    // maintenanceHistories
    Route::get('maintenanceHistories', [MaintenanceHistoryController::class, 'index'])->name('maintenanceHistories.index')
    ->middleware('permission:maintenanceHistories.index');
    Route::post('maintenanceHistories/store', [MaintenanceHistoryController::class, 'store'])->name('maintenanceHistories.store')
        ->middleware('permission:maintenanceHistories.store');
    Route::put('maintenanceHistories/{maintenanceHistory}', [MaintenanceHistoryController::class, 'update'])->name('maintenanceHistories.update')
        ->middleware('permission:maintenanceHistories.update');
    Route::delete('maintenanceHistories/{maintenanceHistory}', [MaintenanceHistoryController::class, 'destroy'])->name('maintenanceHistories.destroy')
        ->middleware('permission:maintenanceHistories.destroy');

    // returnComponents
    Route::get('returnComponents', [ReturnComponentController::class, 'index'])->name('returnComponents.index')
    ->middleware('permission:returnComponents.index');
    Route::post('returnComponents/store', [ReturnComponentController::class, 'store'])->name('returnComponents.store')
        ->middleware('permission:returnComponents.store');
    Route::put('returnComponents/{returnComponent}', [ReturnComponentController::class, 'update'])->name('returnComponents.update')
        ->middleware('permission:returnComponents.update');
    Route::delete('returnComponents/{returnComponent}', [ReturnComponentController::class, 'destroy'])->name('returnComponents.destroy')
        ->middleware('permission:returnComponents.destroy');

    // QR
    Route::get('qrs/qr/{elementComponent}', [QrController::class, 'qr'])->name('qrs.qr');

    //Print QR
    Route::get('prints/assignment/{assignment}', [PrintComponentQrController::class, 'assignment'])->name('prints.assignment');
    Route::get('prints/returnComponent/{returnComponent}', [PrintComponentQrController::class, 'returnComponent'])->name('prints.returnComponent');


    //cartera
    // Credit
    Route::get('credits', [CreditController::class, 'index'])->name('credits.index')
        ->middleware('permission:credits.index');
    Route::post('credits/store', [CreditController::class, 'store'])->name('credits.store')
        ->middleware('permission:credits.store');
    Route::put('credits/{credit}', [CreditController::class, 'update'])->name('credits.update')
        ->middleware('permission:credits.update');
    Route::delete('credits/{credit}', [CreditController::class, 'destroy'])->name('credits.destroy')
        ->middleware('permission:credits.destroy');
    Route::get('credits/{credit}', [CreditController::class, 'show'])->name('credits.show')
        ->middleware('permission:credits.index');

    // PaymentPlan
    Route::get('paymentPlans', [PaymentPlanController::class, 'index'])->name('paymentPlans.index')
        ->middleware('permission:paymentPlans.index');
    Route::post('paymentPlans/store', [PaymentPlanController::class, 'store'])->name('paymentPlans.store')
        ->middleware('permission:paymentPlans.store');
    Route::put('paymentPlans/{paymentPlan}', [PaymentPlanController::class, 'update'])->name('paymentPlans.update')
        ->middleware('permission:paymentPlans.update');
    Route::delete('paymentPlans/{paymentPlan}', [PaymentPlanController::class, 'destroy'])->name('paymentPlans.destroy')
        ->middleware('permission:paymentPlans.destroy');

    // Recovery
    Route::get('recoveries', [RecoveryController::class, 'index'])->name('recoveries.index')
        ->middleware('permission:recoveries.index');
    Route::post('recoveries/store', [RecoveryController::class, 'store'])->name('recoveries.store')
        ->middleware('permission:recoveries.store');
    Route::put('recoveries/{recovery}', [RecoveryController::class, 'update'])->name('recoveries.update')
        ->middleware('permission:recoveries.update');
    Route::delete('recoveries/{recovery}', [RecoveryController::class, 'destroy'])->name('recoveries.destroy')
        ->middleware('permission:recoveries.destroy');


    // User Route

    // Applications
    Route::get('usrApplications', [App\Http\Controllers\User\ApplicationController::class, 'index'])->name('usrApplications.index')
        ->middleware('permission:usrApplications.index');
    Route::get('usrApplications/{application}', [App\Http\Controllers\User\ApplicationController::class, 'show'])->name('usrApplications.show');
        // ->middleware('permission:usrApplications.index');

    // Assign
    Route::get('usrAssigns', [App\Http\Controllers\User\AssignController::class, 'index'])->name('usrAssigns.index')
        ->middleware('permission:usrAssigns.index');
    Route::get('usrAssigns/store/{application}', [App\Http\Controllers\User\AssignController::class, 'store'])->name('usrAssigns.store')
        ->middleware('permission:assigns.store');

    // Assign
    Route::get('usrDisbursements', [App\Http\Controllers\User\DisbursementController::class, 'index'])->name('usrDisbursements.index')
        ->middleware('permission:usrDisbursements.index');

    // Recoveries
    Route::get('usrRecoveries', [App\Http\Controllers\User\RecoveryController::class, 'index'])->name('usrRecoveries.index')
        ->middleware('permission:usrRecoveries.index');
        // Se debe modificar el permiso
    Route::get('usrRecoveries/{credit}', [App\Http\Controllers\User\RecoveryController::class, 'show'])->name('usrRecoveries.show')
        ->middleware('permission:usrRecoveries.index');
    Route::post('usrRecoveries/store', [App\Http\Controllers\User\RecoveryController::class, 'store'])->name('usrRecoveries.store')
        ->middleware('permission:usrRecoveries.index');







    // ElementComponent
    Route::get('usrAssignments', [App\Http\Controllers\User\AssignmentController::class, 'index'])->name('usrAssignments.index')
        ->middleware('permission:usrAssignments.index');






    // Evaluations
    Route::get('hoja1/{evaluation}', [App\Http\Controllers\User\EvaluationController::class, 'hoja1'])->name('hoja1.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('hoja2/{evaluation}', [App\Http\Controllers\User\EvaluationController::class, 'hoja2'])->name('hoja2.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('hoja3/{activity}', [App\Http\Controllers\User\EvaluationController::class, 'hoja3'])->name('hoja3.show');
    // ->middleware('permission:usrEvaluations.index');


    Route::get('inventario/{activity}', [App\Http\Controllers\User\EvaluationController::class, 'inventario'])->name('inventario.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('ventas/{activity}', [App\Http\Controllers\User\EvaluationController::class, 'ventas'])->name('ventas.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('costos/{activity}', [App\Http\Controllers\User\EvaluationController::class, 'costos'])->name('costos.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('transporte/{activity}', [App\Http\Controllers\User\EvaluationController::class, 'transporte'])->name('transporte.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('empresa/{activity}', [App\Http\Controllers\User\EvaluationController::class, 'empresa'])->name('empresa.show');
    // ->middleware('permission:usrEvaluations.index');
    Route::get('indicadores/{evaluation}', [App\Http\Controllers\User\EvaluationController::class, 'indicadores'])->name('indicadores.show');
    // ->middleware('permission:usrEvaluations.index');



    // Print
    Route::get('prints/solicitud/{application}', [PrintController::class, 'solicitud'])->name('prints.solicitud');
    Route::get('prints/address/{participant}', [PrintController::class, 'address'])->name('prints.address');
    Route::get('prints/statement/{participant}', [PrintController::class, 'statement'])->name('prints.statement');

    Route::get('prints/client/{evaluation}', [PrintController::class, 'client'])->name('prints.client');
    Route::get('prints/activity/{activity}', [PrintController::class, 'activity'])->name('prints.activity');
    Route::get('prints/inventory/{activity}', [PrintController::class, 'inventory'])->name('prints.inventory');
    Route::get('prints/sales/{activity}', [PrintController::class, 'sales'])->name('prints.sales');
    Route::get('prints/costs/{activity}', [PrintController::class, 'costs'])->name('prints.costs');
    Route::get('prints/transport/{activity}', [PrintController::class, 'transport'])->name('prints.transport');
    Route::get('prints/company/{activity}', [PrintController::class, 'company'])->name('prints.company');

});

//informacion QR
Route::get('qrs/informacion/{elementComponent}', [QrController::class, 'informacion'])->name('qrs.informacion');

