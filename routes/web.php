<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PiServiceController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\RegulationListController;
use App\Http\Controllers\Backend\MasterData\RegulationController;
use App\Http\Controllers\Backend\MasterData\PublicInformation\ParentPiListController;
use App\Http\Controllers\Backend\MasterData\PublicInformation\AnytimeInformationController;
use App\Http\Controllers\Backend\MasterData\PublicInformation\PeriodicInformationController;
use App\Http\Controllers\Backend\MasterData\PublicInformation\ImmediatelyInformationController;
use App\Http\Controllers\Backend\MasterData\PublicInformation\OtherInformationController;
use App\Http\Controllers\Backend\PublicInformation\PublicInformationListController;
use App\Http\Controllers\Backend\PublicInformation\AnytimeInformationListController;
use App\Http\Controllers\Backend\PublicInformation\PeriodicInformationListController;
use App\Http\Controllers\Backend\PublicInformation\ImmediatelyInformationListController;
use App\Http\Controllers\Backend\PublicInformation\OtherInformationListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('/modal-regulation-list/{id}', [FrontendController::class, 'modalRegulationList']);
Route::get('/modal-public-information-list/{id}', [FrontendController::class, 'modalPiList']);
Route::get('/modal-anytime-information-list/{id}', [FrontendController::class, 'modalAnytimeInformationList']);
Route::get('/modal-periodic-information-list/{id}', [FrontendController::class, 'modalPeriodicInformationList']);
Route::get('/modal-immediately-information-list/{id}', [FrontendController::class, 'modalImmediatelyInformationList']);
Route::get('/modal-other-information-list/{id}', [FrontendController::class, 'modalOtherInformationList']);

Auth::routes(['register' => false]);
// Auth::routes();

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::get('/admin/profile/show-profiles', [ProfileController::class, 'showProfiles']);
    Route::post('/admin/profile/add', [ProfileController::class, 'store']);
    Route::get('/admin/profile/read-profile/{id}', [ProfileController::class, 'read']);
    Route::get('/admin/profile/modal-edit/{id}', [ProfileController::class, 'modalEdit']);
    Route::post('/admin/profile/edit/{id}', [ProfileController::class, 'edit']);
    Route::get('/admin/profile/modal-delete/{id}', [ProfileController::class, 'modalDelete']);
    Route::delete('/admin/profile/delete/{id}', [ProfileController::class, 'delete']);

    // Contact
    Route::get('/admin/contact', [ContactController::class, 'index']);
    Route::get('/admin/contact/show-contacts', [ContactController::class, 'showContacts']);
    Route::post('/admin/contact/add', [ContactController::class, 'store']);
    Route::get('/admin/contact/modal-edit/{id}', [ContactController::class, 'modalEdit']);
    Route::post('/admin/contact/edit/{id}', [ContactController::class, 'edit']);
    Route::get('/admin/contact/modal-delete/{id}', [ContactController::class, 'modalDelete']);
    Route::delete('/admin/contact/delete/{id}', [ContactController::class, 'delete']);

    // Regulation List
    Route::get('/admin/regulation-list', [RegulationListController::class, 'index']);
    Route::post('/admin/regulation-list/add', [RegulationListController::class, 'store']);
    Route::get('/admin/regulation-list/modal-edit/{id}', [RegulationListController::class, 'modalEdit']);
    Route::post('/admin/regulation-list/edit/{id}', [RegulationListController::class, 'edit']);
    Route::get('/admin/regulation-list/modal-delete/{id}', [RegulationListController::class, 'modalDelete']);
    Route::delete('/admin/regulation-list/delete/{id}', [RegulationListController::class, 'delete']);

    // Anytime Information List
    Route::get('/admin/public-information/anytime-information-list', [AnytimeInformationListController::class, 'index']);
    Route::post('/admin/public-information/anytime-information-list/add', [AnytimeInformationListController::class, 'store']);
    Route::get('/admin/public-information/anytime-information-list/modal-edit/{id}', [AnytimeInformationListController::class, 'modalEdit']);
    Route::post('/admin/public-information/anytime-information-list/edit/{id}', [AnytimeInformationListController::class, 'edit']);
    Route::get('/admin/public-information/anytime-information-list/modal-delete/{id}', [AnytimeInformationListController::class, 'modalDelete']);
    Route::delete('/admin/public-information/anytime-information-list/delete/{id}', [AnytimeInformationListController::class, 'delete']);

    // Periodic Information List
    Route::get('/admin/public-information/periodic-information-list', [PeriodicInformationListController::class, 'index']);
    Route::post('/admin/public-information/periodic-information-list/add', [PeriodicInformationListController::class, 'store']);
    Route::get('/admin/public-information/periodic-information-list/modal-edit/{id}', [PeriodicInformationListController::class, 'modalEdit']);
    Route::post('/admin/public-information/periodic-information-list/edit/{id}', [PeriodicInformationListController::class, 'edit']);
    Route::get('/admin/public-information/periodic-information-list/modal-delete/{id}', [PeriodicInformationListController::class, 'modalDelete']);
    Route::delete('/admin/public-information/periodic-information-list/delete/{id}', [PeriodicInformationListController::class, 'delete']);

    // Immediately Information List
    Route::get('/admin/public-information/immediately-information-list', [ImmediatelyInformationListController::class, 'index']);
    Route::post('/admin/public-information/immediately-information-list/add', [ImmediatelyInformationListController::class, 'store']);
    Route::get('/admin/public-information/immediately-information-list/modal-edit/{id}', [ImmediatelyInformationListController::class, 'modalEdit']);
    Route::post('/admin/public-information/immediately-information-list/edit/{id}', [ImmediatelyInformationListController::class, 'edit']);
    Route::get('/admin/public-information/immediately-information-list/modal-delete/{id}', [ImmediatelyInformationListController::class, 'modalDelete']);
    Route::delete('/admin/public-information/immediately-information-list/delete/{id}', [ImmediatelyInformationListController::class, 'delete']);

    // Other Information List
    Route::get('/admin/public-information/other-information-list', [OtherInformationListController::class, 'index']);
    Route::post('/admin/public-information/other-information-list/add', [OtherInformationListController::class, 'store']);
    Route::get('/admin/public-information/other-information-list/modal-edit/{id}', [OtherInformationListController::class, 'modalEdit']);
    Route::post('/admin/public-information/other-information-list/edit/{id}', [OtherInformationListController::class, 'edit']);
    Route::get('/admin/public-information/other-information-list/modal-delete/{id}', [OtherInformationListController::class, 'modalDelete']);
    Route::delete('/admin/public-information/other-information-list/delete/{id}', [OtherInformationListController::class, 'delete']);

    // Public Information Service
    Route::get('/admin/pi-service', [PiServiceController::class, 'index']);
    Route::get('/admin/pi-service/show-pi-services', [PiServiceController::class, 'showPiServices']);
    Route::post('/admin/pi-service/add', [PiServiceController::class, 'store']);
    Route::get('/admin/pi-service/read-profile/{id}', [PiServiceController::class, 'read']);
    Route::get('/admin/pi-service/modal-edit/{id}', [PiServiceController::class, 'modalEdit']);
    Route::post('/admin/pi-service/edit/{id}', [PiServiceController::class, 'edit']);
    Route::get('/admin/pi-service/modal-delete/{id}', [PiServiceController::class, 'modalDelete']);
    Route::delete('/admin/pi-service/delete/{id}', [PiServiceController::class, 'delete']);

    // FAQ
    Route::get('/admin/faq', [FaqController::class, 'index']);
    Route::post('/admin/faq/add', [FaqController::class, 'store']);
    Route::get('/admin/faq/read-faq/{id}', [FaqController::class, 'read']);
    Route::get('/admin/faq/modal-edit/{id}', [FaqController::class, 'modalEdit']);
    Route::post('/admin/faq/edit/{id}', [FaqController::class, 'edit']);
    Route::get('/admin/faq/modal-delete/{id}', [FaqController::class, 'modalDelete']);
    Route::delete('/admin/faq/delete/{id}', [FaqController::class, 'delete']);

    // Master Data - Regulation
    Route::get('/admin/master-data/regulation', [RegulationController::class, 'index']);
    Route::get('/admin/master-data/regulation/show-regulations', [RegulationController::class, 'showRegulations']);
    Route::post('/admin/master-data/regulation/add', [RegulationController::class, 'store']);
    Route::get('/admin/master-data/regulation/modal-edit/{id}', [RegulationController::class, 'modalEdit']);
    Route::post('/admin/master-data/regulation/edit', [RegulationController::class, 'edit']);
    Route::get('/admin/master-data/regulation/modal-delete/{id}', [RegulationController::class, 'modalDelete']);
    Route::delete('/admin/master-data/regulation/delete/{id}', [RegulationController::class, 'delete']);

    // Master Data - Public Information - Anytime Information
    Route::get('/admin/master-data/pi/anytime-information', [AnytimeInformationController::class, 'index']);
    Route::get('/admin/master-data/pi/anytime-information/show-anytime-information', [AnytimeInformationController::class, 'showAnytimeInformation']);
    Route::post('/admin/master-data/pi/anytime-information/add', [AnytimeInformationController::class, 'store']);
    Route::get('/admin/master-data/pi/anytime-information/modal-edit/{id}', [AnytimeInformationController::class, 'modalEdit']);
    Route::post('/admin/master-data/pi/anytime-information/edit', [AnytimeInformationController::class, 'edit']);
    Route::get('/admin/master-data/pi/anytime-information/modal-delete/{id}', [AnytimeInformationController::class, 'modalDelete']);
    Route::delete('/admin/master-data/pi/anytime-information/delete/{id}', [AnytimeInformationController::class, 'delete']);

    // Master Data - Public Information - Periodic Information
    Route::get('/admin/master-data/pi/periodic-information', [PeriodicInformationController::class, 'index']);
    Route::get('/admin/master-data/pi/periodic-information/show-periodic-information', [PeriodicInformationController::class, 'showPeriodicInformation']);
    Route::post('/admin/master-data/pi/periodic-information/add', [PeriodicInformationController::class, 'store']);
    Route::get('/admin/master-data/pi/periodic-information/modal-edit/{id}', [PeriodicInformationController::class, 'modalEdit']);
    Route::post('/admin/master-data/pi/periodic-information/edit', [PeriodicInformationController::class, 'edit']);
    Route::get('/admin/master-data/pi/periodic-information/modal-delete/{id}', [PeriodicInformationController::class, 'modalDelete']);
    Route::delete('/admin/master-data/pi/periodic-information/delete/{id}', [PeriodicInformationController::class, 'delete']);

    // Master Data - Public Information - Immediately Information
    Route::get('/admin/master-data/pi/immediately-information', [ImmediatelyInformationController::class, 'index']);
    Route::get('/admin/master-data/pi/immediately-information/show-immediately-information', [ImmediatelyInformationController::class, 'showImmediatelyInformation']);
    Route::post('/admin/master-data/pi/immediately-information/add', [ImmediatelyInformationController::class, 'store']);
    Route::get('/admin/master-data/pi/immediately-information/modal-edit/{id}', [ImmediatelyInformationController::class, 'modalEdit']);
    Route::post('/admin/master-data/pi/immediately-information/edit', [ImmediatelyInformationController::class, 'edit']);
    Route::get('/admin/master-data/pi/immediately-information/modal-delete/{id}', [ImmediatelyInformationController::class, 'modalDelete']);
    Route::delete('/admin/master-data/pi/immediately-information/delete/{id}', [ImmediatelyInformationController::class, 'delete']);

    // Master Data - Public Information - Other Information
    Route::get('/admin/master-data/pi/other-information', [OtherInformationController::class, 'index']);
    Route::get('/admin/master-data/pi/other-information/show-other-information', [OtherInformationController::class, 'showOtherInformation']);
    Route::post('/admin/master-data/pi/other-information/add', [OtherInformationController::class, 'store']);
    Route::get('/admin/master-data/pi/other-information/modal-edit/{id}', [OtherInformationController::class, 'modalEdit']);
    Route::post('/admin/master-data/pi/other-information/edit', [OtherInformationController::class, 'edit']);
    Route::get('/admin/master-data/pi/other-information/modal-delete/{id}', [OtherInformationController::class, 'modalDelete']);
    Route::delete('/admin/master-data/pi/other-information/delete/{id}', [OtherInformationController::class, 'delete']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
