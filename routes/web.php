<?php

use App\Http\Controllers\AnnouncementContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\IndoRegionController;
use App\Http\Controllers\FileController;
use App\Http\Middleware\KualifikasiRole;
use App\Http\Controllers\FotopelamarController;
use App\Http\Controllers\HomeController;




use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\FreelanceController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\JuniorDevController;
use App\Http\Controllers\Admin\MobileDevController;
use App\Http\Controllers\Admin\PesertaMagangController;
use App\Http\Controllers\Admin\SeniorDevController;
use App\Http\Controllers\Admin\CreateLowonganController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\ListPengumumanController;
use App\Http\Controllers\Admin\ListLowonganController;
use App\Http\Controllers\Admin\ListQuizController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\ListSoalController;
use App\Http\Controllers\Admin\SoalController;
use App\Models\Lowongan;
use App\Models\Dokumen;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {

    Route::get('/dashboardadmin', [HomeAdminController::class, 'index'])->name('admin.homeadmin')->middleware('verified');

    Route::get('/peserta-magang', [PesertaMagangController::class, 'index']);
    Route::get('/data-peserta-magang/{id}', [PesertaMagangController::class, 'tampil_data'])->name('magang.tampil_data');

    Route::get('/pelamar-freelance', [FreelanceController::class, 'index']);
    Route::get('/data-pelamar-freelance/{id}', [FreelanceController::class, 'tampil_data'])->name('freelance.tampil_data');

    Route::get('/pelamar-junior-web', [JuniorDevController::class, 'index']);
    Route::get('/data-pelamar-JuniorWeb/{id}', [JuniorDevController::class, 'tampil_data'])->name('juniorDev.tampil_data');

    Route::get('/pelamar-mobile', [MobileDevController::class, 'index']);
    Route::get('/data-pelamar-Mobile/{id}', [MobileDevController::class, 'tampil_data'])->name('mobileDev.tampil_data');

    Route::get('/pelamar-senior-web', [SeniorDevController::class, 'index']);
    Route::get('/data-pelamar-SeniorWeb/{id}', [SeniorDevController::class, 'tampil_data'])->name('seniorDev.tampil_data');


    Route::get('/create-lowongan', [CreateLowonganController::class, 'index'])->name('admin.createlowongan.index')->middleware('verified');
    Route::PUT('/create-lowongan-post', [CreateLowonganController::class, 'store'])->name('admin.createlowongan.store');

    Route::get('/create-pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman.index')->middleware('verified');
    Route::PUT('/create-pengumuman-post', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');


    Route::get('/list-lowongan', [ListLowonganController::class, 'index'])->name('admin.listlowongan.index')->middleware('verified');
    Route::delete('/list-lowongandrop/{id}', [ListLowonganController::class, 'destroy'])->name('droplowongan.destroy');
    Route::get('changeeStatus', [ListLowonganController::class, 'changeeStatus']);

    Route::get('/edit-lowongan/{id}', [ListLowonganController::class, 'edit'])->name('editlowongan.edit')->middleware('verified');
    Route::PUT('/edit-lowongann/{id}', [ListLowonganController::class, 'update'])->name('admin.listlowongan.update');

    Route::get('/edit-pengumuman/{id}', [ListPengumumanController::class, 'edit'])->name('editpengumuman.edit')->middleware('verified');
    Route::PUT('/edit-pengumuman/{id}', [ListPengumumanController::class, 'update'])->name('admin.listpengumuman.update');

    Route::get('/list-pengumuman', [ListPengumumanController::class, 'index'])->name('admin.listpengumuman.index')->middleware('verified');
    Route::delete('/list-lowongan/{id}', [ListPengumumanController::class, 'destroy'])->name('droppengumuman.destroy');
    Route::get('changeStatus', [ListPengumumanController::class, 'changeStatus']);

    Route::get('/create-quiz', [QuizController::class, 'index'])->name('admin.quiz.index')->middleware('verified');
    Route::PUT('/create-quiz-post', [QuizController::class, 'store'])->name('admin.quiz.store');

    Route::get('/edit-quiz/{id}', [ListQuizController::class, 'edit'])->name('editquiz.edit')->middleware('verified');
    Route::PUT('/edit-quiz/{id}', [ListQuizController::class, 'update'])->name('admin.listquiz.update');

    Route::get('/list-quiz', [ListQuizController::class, 'index'])->name('admin.listquiz.index')->middleware('verified');
    Route::delete('/list-quiz/{id}', [ListQuizController::class, 'destroy'])->name('dropquiz.destroy');
    Route::get('changeStatus', [ListQuizController::class, 'changeStatus']);

    Route::get('/create-soal', [SoalController::class, 'index'])->name('admin.soal.index')->middleware('verified');
    Route::PUT('/create-soal-post', [SoalController::class, 'store'])->name('admin.soal.store');

    Route::get('/edit-soal/{id}', [ListSoalController::class, 'edit'])->name('editsoal.edit')->middleware('verified');
    Route::PUT('/edit-soal/{id}', [ListSoalController::class, 'update'])->name('admin.listsoal.update');

    Route::get('/list-soal', [ListSoalController::class, 'index'])->name('admin.listsoal.index')->middleware('verified');
    Route::delete('/list-soal/{id}', [ListSoalController::class, 'destroy'])->name('dropsoal.destroy');
    Route::get('changeStatus', [ListSoalController::class, 'changeStatus']);

    Route::delete('/dashboardadmin/{id}', [HomeAdminController::class, 'destroy'])->name('dropuser.destroy');
});

Route::group(['middleware' => ['auth', 'CekLevel:user']], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('verified');

    Route::get('/info/lowongan', [AnnouncementContoller::class, 'infolowongan'])->name('lowongan')->middleware('verified');
    Route::get('/info/lowongan/{lowongan:id}', [AnnouncementContoller::class, 'dlowongan'])->name('detail-lowongan');
    Route::get('/search', [App\Http\Controllers\AnnouncementContoller::class, 'search'])->middleware('verified');
    Route::post('/info/lowongan/apply/{lowongan:id}', [AnnouncementContoller::class, 'apply'])->name('apply-user')->middleware('verified');

    Route::get('/history/{id}', [AnnouncementContoller::class, 'history'])->name('history')->middleware('verified');
    Route::get('/info/annoucment', [AnnouncementContoller::class, 'annoucment'])->name('annoucment')->middleware('verified');
    Route::get('/info/annoucment/{pengumuman:id}', [AnnouncementContoller::class, 'dannoucment'])->name('detail-annoucment')->middleware('verified');

    Route::resource('biodata', BiodataController::class)->middleware('verified');
    Route::resource('pendidikan', PendidikanController::class)->middleware('verified');
    Route::resource('dokumen', DokumenController::class)->middleware('verified');
    

    Route::get('/foto-pelamar', [FotopelamarController::class, 'fotoPelamar'])->name('fotopelamar.fotoPelamar');
    Route::post('/foto-pelamar', [FotopelamarController::class, 'upload'])->name('fotopelamar.upload');
    Route::delete('/foto-pelamar/{id}', [FotopelamarController::class, 'destroy'])->name('fotopelamar.destroy');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin,user']], function () {

    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');
});

// Route::post('biodata', BiodataController::class);

Route::post('/getkabupaten', [BiodataController::class, 'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatan', [BiodataController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('/getdesa', [BiodataController::class, 'getdesa'])->name('getdesa');

Auth::routes(['verify' => true]);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboardadmin', [App\Http\Controllers\Admin\HomeAdminController::class, 'index']);

// Route::get('/biodata1', [App\Http\Controllers\HomeController::class, 'dashBoard'])->name('biodata1');
// Route::get('/pendidikan1', [App\Http\Controllers\HomeController::class, 'penDidikan'])->name('pendidikan1');
// Route::get('/updokumen1', [App\Http\Controllers\HomeController::class, 'upDokumen'])->name('updokumen1');

// Route::resource('fotopelamar', FotopelamarController::class);

// Route::get('/mail', function () {
//     return view('mails.user-verif');
// });

// Email Verification Routes...

//  Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//  Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//  Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
