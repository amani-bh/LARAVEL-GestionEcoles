<?php

use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursController;
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










Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::resource('cours_teacher', \App\Http\Controllers\CoursController::class);
// Route::put('coursnewupdate/{id}', [\App\Http\Controllers\CoursController::class, 'update'])->name('newupdate');
// Route::get('/course', function () {
//     return view('FrontOfficeLayout/Pages/Courses/course');
// });
Route::get('/course',[CoursController::class, 'all']);


Route::get('/admin', function () {
    return view('BackOfficeLayout/Pages/dashboard');
});

Route::resource('clubs', \App\Http\Controllers\ClubController::class);
Route::get('/ai', function(){
    return view('FrontOfficeLayout/Pages/Evenement/index');
});


Route::resource('clubs', \App\Http\Controllers\ClubController::class);
Route::resource('classes', \App\Http\Controllers\ClasseController::class);
Route::resource('back', \App\Http\Controllers\ClasseBackController::class);

Route::post('add-rating',[\App\Http\Controllers\RatingControlleur::class,'add']);



Route::resource('evenements',\App\Http\Controllers\EvenementController::class);

/*
Route::get('/ClubAdmin', function () {
    $clubs= Club::paginate(3);
    return view('BackOfficeLayout.Pages.Club.index', compact('clubs'));
});*/

Route::get('ClubAdmin', [\App\Http\Controllers\ClubController::class, 'listClub'])
->name('clubadmin');

Route::post('destroyClubAdmin/{id}', [\App\Http\Controllers\ClubController::class, 'destroyAdmin'])
->name('destroyclubadmin');

Route::get('EventAdmin', [\App\Http\Controllers\EvenementController::class, 'listEvent'])
->name('eventadmin');

Route::post('destroyEventAdmin/{id}', [\App\Http\Controllers\EvenementController::class,
'destroyEventAdmin'])
->name('destroyeventadmin');

Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

Route::resource('commentaires', \App\Http\Controllers\CommentaireController::class);

Route::resource('evenements',\App\Http\Controllers\EvenementController::class);
Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);

Route::resource('show_section', \App\Http\Controllers\SectionController::class);
Route::get('add_course', function () { return view('default');});


Route::get('/AdminCourse', [CoursController::class, 'allAdmin']);

// Route::get('/commentaires', [CoursController::class, 'store']);
Route::get('/delete_course/{id}', [CoursController::class, 'destroy']);
Route::get('/delete_course_admin/{id}', [CoursController::class, 'destroyAdmin']);
Route::get('/edit_course/{id}', [CoursController::class, 'edit']);
Route::post('/update_course/{id}', [CoursController::class, 'update']);
// Route::resource('course_update', \App\Http\Controllers\CoursController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('reclamationadmin',\App\Http\Controllers\ReclamationController::class);
Route::get('reclamation', [\App\Http\Controllers\ReclamationController::class, 'clientList'])->name('reclamation');
Route::post('reclamation/{id}', [\App\Http\Controllers\ReclamationController::class, 'destroyClient'])->name('destroyclient');
Route::get('reclamation/{id}', [\App\Http\Controllers\ReclamationController::class, 'clientShow'])->name('clientshow');

Route::resource('etablissement',\App\Http\Controllers\EtablissementController::class);
Route::get('detailetablissement', [\App\Http\Controllers\EtablissementController::class, 'detailEtabl'])->name('detailEtabl');

Route::resource('blog',\App\Http\Controllers\BlogController::class);
Route::get('blogadmin', [\App\Http\Controllers\BlogController::class, 'blogList'])->name('blogadmin');
Route::get('blogadmin/{id}', [\App\Http\Controllers\BlogController::class, 'showAdmin'])->name('showblogadmin');
Route::post('blogadmin/{id}', [\App\Http\Controllers\BlogController::class, 'destroyBlog'])->name('destroyadmin');


Route::resource('commentblog',\App\Http\Controllers\CommentBlogController::class);
Route::post('addcommentblog/{idBlog}', [\App\Http\Controllers\CommentBlogController::class, 'addComment'])->name('addcommentblog');
Route::delete('deletecommenntadminblog/{idBlog}', [\App\Http\Controllers\CommentBlogController::class, 'destroyAdmin'])->name('destroycommentblogadmin');
Route::get('/reclamationPDF/{id}', [\App\Http\Controllers\ReclamationController::class,'reclamationPDF'])->name('reclamationPDF');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/', [HomeController::class, 'index']);
// });

