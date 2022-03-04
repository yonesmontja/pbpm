<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TduController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SklController;
use App\Http\Controllers\KompetensiintiController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\SwotController;
use App\Http\Controllers\SwotanalysisController;
use App\Http\Controllers\LangkahstrategisController;
use App\Http\Controllers\KompetensidasarController;
use App\Http\Controllers\DependentDropdownController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PpknController;
use App\Http\Controllers\Str;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/postlogin',[AuthController::class,'postlogin'])->name('postlogin');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function()
{

	Route::get('/dashboard',[DashboardController::class,'index']);

	Route::get('/siswa',[SiswaController::class,'index']);
	Route::post('/siswa/create',[SiswaController::class,'create']);
	Route::get('/siswa/{siswa}/edit',[SiswaController::class,'edit']);
	Route::post('/siswa/{siswa}/update',[SiswaController::class,'update']);
	Route::get('/siswa/export_excel',[SiswaController::class,'export_excel']);
	Route::post('/siswa/import_excel',[SiswaController::class,'import_excel']);
	Route::get('/siswa/export_pdf',[SiswaController::class,'export_pdf']);

	Route::get('/test',[SiswaController::class,'test']);
	Route::post('/test/testcreate',[SiswaController::class,'testcreate']);
	Route::get('/test/{siswa}/edit',[SiswaController::class,'testedit']);
	Route::post('/test/{siswa}/update',[SiswaController::class,'testupdate']);
	Route::get('/test/{siswa}/delete',[SiswaController::class,'testdelete']);
	Route::get('/test/{siswa}/profile',[SiswaController::class,'testprofile']);
	Route::post('/test/{siswa}/addnilai',[SiswaController::class,'testaddnilai']);
	Route::get('/test/{siswa}/{idmapel}/testdeletenilai',[SiswaController::class,'testdeletenilai']);
	Route::get('/test/{id}/aktivasi',[SiswaController::class,'testaktivasi']);

	Route::get('/guru',[GuruController::class,'index']);
	Route::post('/guru/gurucreate',[GuruController::class,'gurucreate']);
	Route::get('/guru/{guru}/guruedit',[GuruController::class,'guruedit']);
	Route::post('/guru/{guru}/guruupdate',[GuruController::class,'guruupdate']);
	Route::get('/guru/{guru}/gurudelete',[GuruController::class,'gurudelete']);
	Route::get('/guru/{guru}/profile',[GuruController::class,'profile']);

	Route::get('/tdu',[TduController::class,'index']);
	Route::get('/kurikulum',[KurikulumController::class,'index']);
	Route::get('/kesiswaan',[KesiswaanController::class,'index']);
	Route::get('/widget',[WidgetController::class,'index']);

	Route::get('/jurnalringkasan',[JurnalController::class,'index']);
	Route::get('/jurnalsiswa',[JurnalController::class,'jurnalsiswa']);
	Route::get('/jurnalasrama',[JurnalController::class,'jurnalasrama']);
	Route::get('/jurnalbelajar',[JurnalController::class,'jurnalbelajar']);
	Route::get('/jurnalpost',[JurnalController::class,'jurnalpost']);
	Route::post('/jurnalcreate',[JurnalController::class,'jurnalcreate']);
	Route::get('/jurnal/{jurnal}/edit',[JurnalController::class,'jurnaledit']);
	Route::post('/jurnal/{jurnal}/update',[JurnalController::class,'jurnalupdate']);

	Route::get('/grafiknilai',[GrafikController::class,'grafiknilai']);
	Route::get('/grafikmateri',[GrafikController::class,'grafikmateri']);
	Route::get('/grafikkompetensi',[GrafikController::class,'grafikkompetensi']);

	Route::get('/kalender',[KalenderController::class,'kalender']);
	Route::get('/inbox',[MailboxController::class,'inbox']);
	Route::get('/compose',[MailboxController::class,'compose']);
	Route::get('/read',[MailboxController::class,'read']);

	Route::get('/profile/{id}/profile',[UserController::class,'profile1']);
	Route::get('/portofolio',[UserController::class,'portofolio']);
	Route::get('/projects',[UserController::class,'projects']);
	Route::get('/projects-add',[UserController::class,'projects_add']);
	Route::get('/projects-edit',[UserController::class,'projects_edit']);
	Route::get('/projects-detail',[UserController::class,'projects_detail']);
	Route::get('/user',[UserController::class,'user']);
	Route::get('/user/{id}/profile',[UserController::class,'userprofile']);
	Route::get('/my_profile/{id}/myprofile',[UserController::class,'my_profile']);
	Route::post('/user/create',[UserController::class,'create']);
	Route::get('/contacts',[UserController::class,'contacts']);
	Route::get('/user/{user}/edit',[UserController::class,'useredit']);
	Route::post('/user/{user}/update',[UserController::class,'userupdate']);

	Route::get('/skl',[SklController::class,'skl']);
	Route::post('/skl/sklcreate',[SklController::class,'sklcreate']);
	Route::get('/skl/{skl}/skldelete',[SklController::class,'skldelete']);
	Route::get('/skl/{skl}/skledit',[SklController::class,'skledit']);
	Route::post('/skl/{skl}/sklupdate',[SklController::class,'sklupdate']);

	Route::get('/kompetensiinti',[KompetensiintiController::class,'kompetensiinti']);
	Route::post('/kompetensiinti/kompetensiinticreate',[KompetensiintiConroller::class,'kompetensiinticreate']);
	Route::get('/kompetensiinti/{ki}/kompetensiintidelete',[KompetensiintiConroller::class,'kompetensiintidelete']);
	Route::get('/kompetensiinti/{ki}/kompetensiintiedit',[KompetensiintiConroller::class,'kompetensiintiedit']);
	Route::post('/kompetensiinti/{ki}/kompetensiintiupdate',[KompetensiintiConroller::class,'kompetensiintiupdate']);

	Route::get('/kompetensidasar',[KompetensidasarController::class,'kompetensidasar']);
	Route::post('/kompetensidasar/kompetensidasarcreate',[KompetensidasarController::class,'kompetensidasarcreate']);
	Route::get('/kompetensidasar/get/{id}',[KompetensidasarController::class,'getStates']);

	Route::get('/visi',[VisiController::class,'visi']);
	Route::post('/visi/visicreate',[VisiController::class,'visicreate']);
	Route::get('/visi/{visi}/visidelete',[VisiController::class,'visidelete']);
	Route::get('/visi/{visi}/visiedit',[VisiController::class,'visiedit']);
	Route::post('/visi/{visi}/visiupdate',[VisiController::class,'visiupdate']);
	Route::get('/visi/{visi}/visiprofile',[VisiController::class,'visiprofile']);
	Route::post('/visi/{visi}/visimisiadd',[VisiController::class,'visimisiadd']);

	Route::get('/misi',[MisiController::class,'misi']);
	Route::post('/misi/misicreate',[MisiController::class,'misicreate']);
	Route::get('/misi/{misi}/misidelete',[MisiController::class,'misidelete']);
	Route::get('/misi/{misi}/misiedit',[MisiController::class,'misiedit']);
	Route::post('/misi/{misi}/misiupdate',[MisiController::class,'misiupdate']);
	Route::get('/misi/{misi}/misiprofile',[MisiController::class,'misiprofile']);
	Route::post('/misi/{misi}/visimisiadd',[MisiController::class,'visimisiadd']);

	Route::get('/tujuan',[TujuanController::class,'tujuan']);
	Route::post('/tujuan/tujuancreate',[TujuanController::class,'tujuancreate']);
	Route::get('/tujuan/{tujuan}/tujuandelete',[TujuanController::class,'tujuandelete']);
	Route::get('/tujuan/{tujuan}/tujuanedit',[TujuanController::class,'tujuanedit']);
	Route::post('/tujuan/{tujuan}/tujuanupdate',[TujuanController::class,'tujuanupdate']);

	Route::get('/nilai',[NilaiController::class,'nilai']);
	Route::post('/nilai/nilaicreate',[NilaiController::class,'nilaicreate']);
	Route::get('/nilai/{nilai}/nilaidelete',[NilaiController::class,'nilaidelete']);
	Route::get('/nilai/{nilai}/nilaiedit',[NilaiController::class,'nilaiedit']);
	Route::post('/nilai/{nilai}/nilaiupdate',[NilaiController::class,'nilaiupdate']);

	Route::get('/sasaran',[SasaranController::class,'sasaran']);
	Route::post('/sasaran/sasarancreate',[SasaranController::class,'sasarancreate']);
	Route::get('/sasaran/{sasaran}/sasarandelete',[SasaranController::class,'sasarandelete']);
	Route::get('/sasaran/{sasaran}/sasaranedit',[SasaranController::class,'sasaranedit']);
	Route::post('/sasaran/{sasaran}/sasaranupdate',[SasaranController::class,'sasaranupdate']);

	Route::get('/swot',[SwotController::class,'swot']);
	Route::post('/swot/swotcreate',[SwotController::class,'swotcreate']);
	Route::get('/swot/{swot}/swotdelete',[SwotController::class,'swotdelete']);
	Route::get('/swot/{swot}/swotedit',[SwotController::class,'swotedit']);
	Route::post('/swot/{swot}/swotupdate',[SwotController::class,'swotupdate']);

	Route::get('/swotanalysis',[SwotanalysisController::class,'swotanalysis']);
	Route::post('/swotanalysis/swotanalysiscreate',[SwotanalysisController::class,'swotanalysiscreate']);
	Route::get('/swotanalysis/{swotanalysis}/swotanalysisdelete',[SwotanalysisController::class,'swotanalysisdelete']);
	Route::get('/swotanalysis/{swotanalysis}/swotanalysisedit',[SwotanalysisController::class,'swotanalysisedit']);
	Route::post('/swotanalysis/{swotanalysis}/swotanalysisupdate',[SwotanalysisController::class,'swotanalysisupdate']);

	Route::get('/langkahstrategis',[LangkahstrategisController::class,'langkahstrategis']);
	Route::post('/langkahstrategis/langkahstrategiscreate',[LangkahstrategisController::class,'langkahstrategiscreate']);
	Route::get('/langkahstrategis/{langkahstrategis}/langkahstrategisdelete',[LangkahstrategisController::class,'langkahstrategisdelete']);
	Route::get('/langkahstrategis/{langkahstrategis}/langkahstrategisedit',[LangkahstrategisController::class,'langkahstrategisedit']);
	Route::post('/langkahstrategis/{langkahstrategis}/langkahstrategisupdate',[LangkahstrategisController::class,'langkahstrategisupdate']);	

	Route::get('dependent-dropdown', 'DependentDropdownController@index')
    ->name('dependent-dropdown.index');
	Route::post('/dependent-dropdown', [DependentDropdownController::class,'store'])->name('dependent-dropdown.store');
	Route::get('/merk',[PagesController::class,'index']);
	Route::get('/merk/{id}',[PagesController::class,'merkAjax']);

	Route::get('/spmi',[LangkahstrategisController::class,'spmi']);
	Route::post('/spmi/spmicreate',[LangkahstrategisController::class,'spmicreate']);
	Route::get('/spmi/{spmi}/spmiedit',[LangkahstrategisController::class,'spmiedit']);
	Route::get('/spmi/{spmi}/spmidelete',[LangkahstrategisController::class,'spmidelete']);
	Route::post('/spmi/{spmi}/spmiupdate',[LangkahstrategisController::class,'spmiupdate']);

	  // Nilai PPKn
	Route::group(['prefix' => '/ppkn'], function () {
		Route::get('/', [PpknController::class,'index'])->name('ppkn.index');
		Route::post('/', [PpknController::class,'import'])->name('ppkn.import');
		Route::get('/{id}/edit', [PpknController::class,'edit'])->name('ppkn.edit');
		Route::post('/{id}/edit', [PpknController::class,'update'])->name('ppkn.update');
		Route::delete('/{id}/delete', [PpknController::class,'delete'])->name('ppkn.destroy');
	});

});

Route::group(['middleware' => ['auth','checkRole:admin,siswa']], function()
{
	Route::get('/dashboard',[DashboardController::class,'index']);
});

Route::get('/{slug}',[
	'uses' => 'App\Http\Controllers\JurnalController@singlepost',
	'as' => 'site.single.post'
]);

