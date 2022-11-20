<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\Dashboard\AgentController;
use App\Http\Controllers\Dashboard\StateController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\EnquryController;
use App\Http\Controllers\Dashboard\OfficeController;
use App\Http\Controllers\Dashboard\StatusController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\WorkflowController;
use App\Http\Controllers\User\CompanySettingController;
use App\Http\Controllers\Dashboard\ApplicationController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\PartnerTypeController;
use App\Http\Controllers\Dashboard\ProductTypeController;
use App\Http\Controllers\Dashboard\RevenueTypeController;
use App\Http\Controllers\Dashboard\OfficeCheckinController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/task-note-store', function (\Illuminate\Http\Request $request) {
        $note = \App\Models\Dashboard\TaskNote::create([
            'note' => $request->note,
            'user_id' => auth()->id(),
        ]);
        return back();
    })->name('task.note.store');
    Route::get('/task-note-store/{id}', function ($id) {
        $note = \App\Models\Dashboard\TaskNote::find($id);
        $note->delete();
        return back();
    })->name('task.note.delete');

    Route::post('status-search',[ StatusController::class ,'search'])->name('status.search');
    Route::resource('status',StatusController::class)->except('create','edit','show');

    Route::post('branch-search',[ BranchController::class ,'search'])->name('branch.search');
    Route::resource('branch',BranchController::class)->except('create','edit','show');

    Route::post('appointment-search',[ AppointmentController::class ,'search'])->name('appointment.search');
    Route::resource('appointment',AppointmentController::class)->except('create','edit','show');

    Route::post('contact-search',[ ContactController::class ,'search'])->name('contact.search');
    Route::resource('contact',ContactController::class)->except('create','edit','show');

    Route::post('workflow-search',[ WorkflowController::class ,'search'])->name('workflow.search');
    Route::resource('workflow',WorkflowController::class)->except('create','edit','show');

    Route::get('download/{document}',[ApplicationController::class, 'downloadD']);

    Route::get('application-taskcheck/{task}/{application}', [ApplicationController::class, 'checkApplicationTask'])->name('application.task.store');
    Route::post('application-payment-schedule-store', [ApplicationController::class, 'paymentScheduleStore'])->name('application.payment.schedule.store');
    Route::post('application-search',[ ApplicationController::class ,'search'])->name('application.search');
    Route::get('application/{id}',[ApplicationController::class,'index'])->name('application.index');
    Route::resource('application',ApplicationController::class)->except('index','create');



    // Route::get('download/{file_name}',function($file_name){
    //     return $file_name;
    //         $file = Storage::disk('public')->get($file_name);

    //         return (new Response($file, 200))
    //               ->header('Content-Type', 'image/jpeg');
    // });


    Route::post('revenue-type-search',[ RevenueTypeController::class ,'search'])->name('revenueType.search');
    Route::resource('revenue-type',RevenueTypeController::class)
        ->name('index','revenueType.index')
        ->name('store','revenueType.store')
        ->name('update','revenueType.update')
        ->name('destroy','revenueType.destroy')
        ->except('create','edit','show');

    Route::post('product-type-search',[ ProductTypeController::class ,'search'])->name('productType.search');
    Route::resource('product-type',ProductTypeController::class)
        ->name('index','productType.index')
        ->name('store','productType.store')
        ->name('update','productType.update')
        ->name('destroy','productType.destroy')
        ->except('create','edit','show');

    Route::post('product-search',[ ProductController::class ,'search'])->name('product.search');
    Route::resource('product',ProductController::class)->except('create','edit','show');

    Route::post('partner-type-search',[ PartnerTypeController::class ,'search'])->name('partnerType.search');
    Route::resource('partner-type',PartnerTypeController::class)
        ->name('index','partnerType.index')
        ->name('store','partnerType.store')
        ->name('update','partnerType.update')
        ->name('destroy','partnerType.destroy')
        ->except('create','edit','show');

    Route::post('partner-search',[ PartnerController::class ,'search'])->name('partner.search');
    Route::resource('partner',PartnerController::class)->except('create','edit','show');

    Route::post('category-search',[ CategoryController::class ,'search'])->name('category.search');
    Route::resource('category',CategoryController::class)->except('create','edit','show');

    Route::post('enqury-search',[ EnquryController::class ,'search'])->name('enqury.search');
    Route::resource('enqury',EnquryController::class)->except('create','edit','show');

    Route::post('country-search',[ CountryController::class ,'search'])->name('country.search');
    Route::resource('country',CountryController::class)->except('create','edit','show');

    Route::post('state-search',[ StateController::class ,'search'])->name('state.search');
    Route::resource('state',StateController::class)->except('create','edit','show');

    Route::post('city-search',[ CityController::class ,'search'])->name('city.search');
    Route::resource('city',CityController::class)->except('create','edit','show');

    Route::post('client-search',[ ClientController::class ,'search'])->name('client.search');
    Route::resource('client',ClientController::class);
    // ->except('create','edit','show','store');

    Route::post('task-search',[ TaskController::class ,'search'])->name('task.search');
    Route::resource('task',TaskController::class)->except('create','edit','show');

    Route::post('agent-search',[ AgentController::class ,'search'])->name('agent.search');
    Route::resource('agent',AgentController::class)->except('create','edit','show');

    Route::post('office-search',[ OfficeController::class ,'search'])->name('office.search');
    Route::resource('office',OfficeController::class)->except('create','edit','show');

    Route::post('officeCheckin-search',[ OfficeCheckinController::class ,'search'])->name('officeCheckin.search');
    Route::resource('officeCheckin',OfficeCheckinController::class)->except('create','edit','show');


//    User Management
    Route::resource('roles', RoleController::class);
    Route::resource('user', UserController::class);
    Route::get('settings/company-settings', [CompanySettingController::class, 'editCompanySetting'])->name('company.edit');
    Route::post('settings/company-setting', [CompanySettingController::class, 'updateCompanySetting'])->name('company.update');
});

Route::get('migrate',function(){
    Artisan::call('migrate');
    dd('done');
});

Route::get('migrate-fresh',function(){
    Artisan::call('migrate:fresh --seed');
    dd('done');
});

Route::get('optimize',function(){
    Artisan::call('optimize');
    Artisan::call('optimize:clear');
    dd('done');
});

Route::get('seed',function(){
    Artisan::call('db:seed', [
        '--class' => CountrySeeder::class
    ]);
});

Route::get('rollback',function(){
    Artisan::call('migrate:rollback --step=3');
    dd('done');
});

Route::get('storage-link',function(){
    Artisan::call('storage:link');
    dd('done');
});

// Route::get('drop',function(){
//     Schema::dropIfExists('contacts');
//     dd('done');
// });

require __DIR__.'/auth.php';
