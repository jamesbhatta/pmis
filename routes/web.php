<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EconomicProgressController;
use App\Http\Controllers\PhysicalProgressController;
use App\Http\Controllers\ProjectAcheivementController;
use App\Http\Controllers\BudgetSourceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProjectPhotoController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes(['register' => false]);
// Route::redirect('/', '');
Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/Physical-Infrastruture', [IndexController::class,'physicalInfrastructure'])->name('physical-infrastruture');
Route::get('/Physical-Infrastruture/all-physical-infrastructure-offices/{organization}', [IndexController::class,'allPhysicalInfrastructureOfficeList'])->name('physical-infrastruture.all-offices');
Route::get('/Water-Resources', [IndexController::class,'waterResources'])->name('water-resources');
Route::get('/Water-And-Sanitation', [IndexController::class,'waterAndSanitation'])->name('water-and-sanitation');
Route::get('/Pathraiya-Mohana-Irrigation', [IndexController::class,'pathraiyaMohanIrrigation'])->name('pathraiya-mohana-irrigation');
Route::get('/Urban-Development-and-Building-Construction', [IndexController::class,'urbanDevelopmentandBuildingConstruction'])->name('urban-development-and-building-construction');
Route::get('/Transport-Management-Office', [IndexController::class,'transportManagementOffice'])->name('transport-management-office');
Route::get('/View-Details/{id}', [IndexController::class,'viewDetails'])->name('view-details');
Route::get('/All-Projects/{id}', [IndexController::class,'allProjects'])->name('all-projects');

Route::get('/registration', 'FrontendController@index')->name('organization.new');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('language/{locale}', 'LanguageController@setLocale')->name('locale');
Route::get('set-active-fiscal-year/{fiscalYear}', 'MiscController@setActiveFiscalYear')->name('set-active-fiscal-year');

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'user' => 'UserController',
        'province' => 'ProvinceController',
        'district' => 'DistrictController',
        'municipality' => 'MunicipalityController',
        'ward' => 'WardController',
    ]);

    Route::get('organization', [OrganizationController::class, 'index'])->name('organization.index');
    Route::get('organization/create', [OrganizationController::class, 'create'])->name('organization.create');
    Route::post('organization', [OrganizationController::class, 'store'])->name('organization.store');
    Route::get('organization/{organization}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('organization/{organization}', [OrganizationController::class, 'update'])->name('organization.update');
    Route::delete('organization/{organization}', [OrganizationController::class, 'destroy'])->name('organization.destroy');

    // project routes
    Route::get('project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('project/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

    // Budget source routes
    Route::get('budget-source', [BudgetSourceController::class, 'index'])->name('budget-source.index');
    Route::post('budget-source', [BudgetSourceController::class, 'store'])->name('budget-source.store');
    Route::delete('budget-source/{budgetSource}', [BudgetSourceController::class, 'destroy'])->name('budget-source.destroy');
    Route::get('budget-source/{budgetSource}/edit', [BudgetSourceController::class, 'edit'])->name('budget-source.edit');
    Route::put('budget-source/{budgetSource}/update', [BudgetSourceController::class, 'update'])->name('budget-source.update');

    Route::get('project/{project}/physical-progress', [PhysicalProgressController::class, 'show'])->name('project.physical-progress.show');
    Route::post('project/{project}/physical-progress', [PhysicalProgressController::class, 'update'])->name('project.physical-progress.update');

    Route::get('project/{project}/economic-progress', [EconomicProgressController::class, 'show'])->name('project.economic-progress.show');
    Route::post('project/{project}/economic-progress', [EconomicProgressController::class, 'store'])->name('project.economic-progress.store');

    Route::get('project/{project}/acheivements', [ProjectAcheivementController::class, 'show'])->name('project.acheivements.show');
    Route::post('project/{project}/acheivements', [ProjectAcheivementController::class, 'update'])->name('project.acheivements.update');

    Route::get('project/{project}/photos', [ProjectPhotoController::class, 'show'])->name('project.photos.show');
    Route::post('project/{project}/photos', [ProjectPhotoController::class, 'update'])->name('project.photos.update');

    // Report
    Route::get('report', [ReportController::class, 'index'])->name('report');
    Route::get('report/progress', [ReportController::class, 'progressReport'])->name('report.progress-report');
    Route::get('report/indicator', [ReportController::class, 'indicatorReport'])->name('report.indicator-report');


    // Route::get('/data/{key}', 'TableController@index');
    // Route::post('/data/{key}', 'TableController@store');
    Route::get('data/{slug}/create', 'ResourceTemplateController@create');
    Route::post('data/{slug}', 'ResourceTemplateController@store');

    Route::get('resources', 'ResourceController@index')->name('resources.index');
    Route::get('resources/create', 'ResourceController@create')->name('resources.create');
    Route::post('resources', 'ResourceController@store')->name('resources.store');
    Route::get('resources/{slug}/edit', 'ResourceController@edit')->name('resources.edit');

    Route::post('resources/{slug}/fields', 'ResourceController@saveFields')->name('resources.fields.store');


    Route::get('fiscal-year/{fiscalYear?}', 'FiscalYearController@index')->name('fiscal-year.index');
    Route::post('fiscal-year', 'FiscalYearController@store')->name('fiscal-year.store');
    Route::put('fiscal-year/{fiscalYear}', 'FiscalYearController@update')->name('fiscal-year.update');
    Route::delete('fiscal-year/{fiscalYear}', 'FiscalYearController@destroy')->name('fiscal-year.destroy');

    // Route::delete('document', 'DocumentController@destroy')->name('ajax.document.destroy');

    Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
    Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

    // Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
    // Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

    Route::get('settings-items', 'SettingsController@items')->name('settings.items');
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::post('settings', 'SettingsController@sync')->name('settings.sync');

    Route::get('configuration-checklist', 'ConfigurationChecklistController@index')->name('configuration-checklist.index');
    Route::resource('project-type', ProjectTypeController::class);
    Route::delete('project-type', ProjectTypeController::class)->name('project-type.destroy');
    // Route::get('/project-type/{projectType}/edit', [ProjectTypeController::class, 'edit'])->name('project-type.edit');
});

Route::group(['middleware' => ['auth', 'role:super-admin']], function () {
    Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
});
