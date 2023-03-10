<?php


use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfessionistController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BraintreeController;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [ProfessionistController::class, 'create']);
        Route::resource('professionists', ProfessionistController::class)->parameters(['professionists' => 'professionist:slug']);
        Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
        Route::resource('leads', LeadController::class)->parameters(['leads' => 'lead:id']);
        Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technologies:slug'])->except('show', 'create', 'edit');
        Route::resource('reviews', ReviewController::class)->parameters(['reviews' => 'review:id'])->except( 'create', 'edit');
        Route::get('Braintree', [BraintreeController::class, 'generate'])->name('generatetoken');
        Route::post('process-payment', [BraintreeController::class, 'processPayment'])->name('braintree');
        Route::resource('payments', PlanController::class)->except('create', 'edit');
    });


// Route::get('{any?}', function () {
//     return redirect()->route('admin.dashboard');
// })->where('any', '.*');


/* Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */

require __DIR__ . '/auth.php';
