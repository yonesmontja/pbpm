<?php

use Carbon\Carbon;

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

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Penilaian;
use App\Http\Controllers\Str;
use App\Models\Kompetensiinti;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SklController;
use App\Http\Controllers\TduController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\MisiController;
use App\Http\Controllers\PpknController;
use App\Http\Controllers\SwotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\MoodleController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\TujuanController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\TahunpelController;
use App\Http\Controllers\UsertestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FastEventController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\SwotanalysisController;
use App\Http\Controllers\KompetensiintiController;
use App\Http\Controllers\KompetensidasarController;
use App\Http\Controllers\LangkahstrategisController;
use App\Http\Controllers\DependentDropdownController;

Route::get('/', [HeroController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard_siswa',[DashboardController::class,'dashboard_siswa'])->name('dashboard_siswa');
Route::get('/dashboard_guru',[DashboardController::class,'dashboard_guru'])->name('dashboard_guru');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/postlogin',[AuthController::class,'postlogin'])->name('postlogin');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/reset',[AuthController::class,'reset'])->name('reset');

Route::group(['middleware' => ['auth','checkRole:admin']], function()
{
    Route::get('/hero', [HeroController::class, 'hero']);
    Route::post('/hero/herocreate', [HeroController::class, 'herocreate']);
    Route::get('/nilai', [NilaiController::class, 'nilai']);
    Route::get('/rombel', [RombelController::class, 'index']);
    Route::post('/rombel/rombelcreate', [RombelController::class, 'rombelcreate']);
    Route::get('/rombel/{rombel}/profile', [RombelController::class, 'rombelprofile']);

    Route::get('/rombel_siswa', [RombelController::class, 'rombel_siswa']);
    Route::post('/rombel/rombelsiswacreate', [RombelController::class, 'rombelsiswacreate']);

    Route::get('/testimony', [TestimonyController::class, 'testimony']);
    Route::post('/testimony/testimonycreate', [TestimonyController::class, 'testimonycreate']);

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('posting',PostingController::class);
    Route::resource('usertest',UsertestController::class);
    Route::resource('mapel',MapelController::class);
    Route::resource('tahunpel',TahunpelController::class);

	Route::get('/siswa',[SiswaController::class,'index']);
	Route::post('/siswa/create',[SiswaController::class,'create']);
	Route::get('/siswa/{siswa}/edit',[SiswaController::class,'edit']);
	Route::post('/siswa/{siswa}/update',[SiswaController::class,'update']);

	Route::get('/siswa/export_excel',[SiswaController::class,'export_excel']);
	Route::post('/siswa/import_excel',[SiswaController::class,'import_excel']);
	//Route::get('/siswa/export_pdf',[SiswaController::class,'export_pdf']);
    Route::get('/siswa/{id}/export_pdf',[SiswaController::class,'cetak_pdf']);
    Route::get('/siswa/{id}/cover_pdf',[SiswaController::class,'cover_pdf']);
    Route::get('/siswa/{id}/biodata_pdf',[SiswaController::class,'biodata_pdf']);



    Route::get('/sekolah',[SekolahController::class,'index']);
	Route::post('/sekolah/sekolahcreate',[SekolahController::class,'sekolahcreate']);
	Route::get('/sekolah/{sekolah}/sekolahedit',[SekolahController::class,'sekolahedit']);
	Route::post('/sekolah/{sekolah}/sekolahupdate',[SekolahController::class,'sekolahupdate']);
	Route::get('/sekolah/{sekolah}/sekolahdelete',[SekolahController::class,'sekolahdelete']);
	Route::get('/sekolah/{sekolah}/profile',[SekolahController::class,'profile']);

	Route::get('/guru',[GuruController::class,'index']);
	Route::post('/guru/gurucreate',[GuruController::class,'gurucreate']);
	Route::get('/guru/{guru}/guruedit',[GuruController::class,'guruedit']);
	Route::post('/guru/{guru}/guruupdate',[GuruController::class,'guruupdate']);
	Route::get('/guru/{guru}/gurudelete',[GuruController::class,'gurudelete']);


	Route::get('/penilaian',[PenilaianController::class,'index']);
	Route::post('/penilaian/penilaiancreate',[PenilaianController::class,'penilaiancreate']);
	Route::get('/penilaian/{penilaian}/penilaianedit',[PenilaianController::class,'penilaianedit']);
	Route::post('/penilaian/{penilaian}/penilaianupdate',[PenilaianController::class,'penilaianupdate']);
	Route::get('/penilaian/{penilaian}/penilaiandelete',[PenilaianController::class,'penilaiandelete']);
	Route::get('/penilaian/{penilaian}/profile',[PenilaianController::class,'profile']);

    Route::get('/level',[LevelController::class,'index']);
	Route::post('/level/levelcreate',[LevelController::class,'levelcreate']);
	Route::get('/level/{level}/leveledit',[LevelController::class,'leveledit']);
	Route::post('/level/{level}/levelupdate',[LevelController::class,'levelupdate']);
	Route::get('/level/{level}/leveldelete',[LevelController::class,'leveldelete']);
	Route::get('/level/{level}/profile',[LevelController::class,'profile']);

    Route::get('/kelas',[KelasController::class,'index']);
	Route::post('/kelas/kelascreate',[KelasController::class,'kelascreate']);
	Route::get('/kelas/{kelas}/kelasedit',[KelasController::class,'kelasedit']);
	Route::post('/kelas/{kelas}/kelasupdate',[KelasController::class,'kelasupdate']);
	Route::get('/kelas/{kelas}/kelasdelete',[KelasController::class,'kelasdelete']);
	Route::get('/kelas/{kelas}/profile',[KelasController::class,'profile']);




	Route::get('/jurnalringkasan',[JurnalController::class,'index'])->name('jurnalringkasan');
	Route::get('/jurnalsiswa',[JurnalController::class,'jurnalsiswa'])->name('jurnalsiswa');
	Route::get('/jurnalkelas',[JurnalController::class,'jurnalkelas'])->name('jurnalkelas');
	Route::get('/jurnalbelajar',[JurnalController::class,'jurnalbelajar'])->name('jurnalbelajar');
	Route::get('/jurnalpost',[JurnalController::class,'jurnalpost'])->name('jurnalpost');
	Route::post('/jurnalcreate',[JurnalController::class,'jurnalcreate']);
	Route::get('/jurnal/{jurnal}/edit',[JurnalController::class,'jurnaledit']);
	Route::post('/jurnal/{jurnal}/update',[JurnalController::class,'jurnalupdate']);
	Route::get('/jurnal/{jurnal}/delete',[JurnalController::class,'jurnaldelete']);

	Route::get('/grafiknilai',[GrafikController::class,'grafiknilai'])->name('grafiknilai');
	Route::get('/grafikmateri',[GrafikController::class,'grafikmateri'])->name('grafikmateri');
	Route::get('/grafikkompetensi',[GrafikController::class,'grafikkompetensi'])->name('grafikkompetensi');

	Route::get('/kalender',[KalenderController::class,'kalender']);
    Route::get('full-calender',[KalenderController::class,'index']);
    Route::post('full-calender/action', [KalenderController::class, 'action']);
	Route::get('/jadwal',[JadwalController::class,'index'])->name('kalender.jadwal');
    Route::post('store',[JadwalController::class,'store'])->name('eventStore');
	Route::get('/incalendar',[KalenderController::class,'incalendar'])->name('kalender.incalendar');
	Route::post('/instorecalendar',[KalenderController::class,'instorecalendar'])->name('kalender.instorecalendar');
	Route::patch('/inupdatecalendar/{id}',[KalenderController::class,'inupdatecalendar'])->name('kalender.inupdatecalendar');
	Route::delete('/indeletecalendar/{id}',[KalenderController::class,'indeletecalendar'])->name('kalender.indeletecalendar');

	Route::get('/calendar',[FullCalendarController::class,'index']);
	Route::get('/load-events',[EventController::class,'loadEvents'])->name('routeLoadEvents');
	Route::put('/event-update', [EventController::class,'update'])->name('routeEventUpdate');
	Route::post('/event-store', [EventController::class,'store'])->name('routeEventStore');
	Route::delete('/event-destroy', [EventController::class,'destroy'])->name('routeEventDelete');
	Route::delete('/fast-event-destroy', [FastEventController::class,'destroy'])->name('routeFastEventDelete');
	Route::put('/fast-event-update', [FastEventController::class,'update'])->name('routeFastEventUpdate');
	Route::post('/fast-event-store', [FastEventController::class,'store'])->name('routeFastEventStore');
	Route::get('/inbox',[MailboxController::class,'inbox']);
	Route::get('/compose',[MailboxController::class,'compose']);
	Route::get('/read',[MailboxController::class,'read']);

	Route::get('/profile/{id}/profile',[UserController::class,'profile1']);
	Route::get('/portofolio',[UserController::class,'portofolio']);

	Route::get('/projects',[ProjectController::class,'projects']);
	Route::get('/projects-add',[ProjectController::class,'projects_add']);
    Route::post('/projects-create',[ProjectController::class,'projects_create']);
	Route::get('/projects-edit',[ProjectController::class,'projects_edit']);
	Route::get('/projects/{id}/detail',[ProjectController::class,'projects_detail']);
    //Route::get('/getSiswa/{id}', [ProjectController::class, 'getSiswa']);

    Route::get('online-user',[UserController::class,'index']);
	Route::get('/user',[UserController::class,'user']);
	Route::get('/user/{id}/profile',[UserController::class,'userprofile']);
	Route::get('/my_profile/{id}/myprofile',[UserController::class,'my_profile']);
	Route::post('/user/create',[UserController::class,'create']);
	Route::get('/contacts',[UserController::class,'contacts']);
	Route::get('/user/{user}/edit',[UserController::class,'useredit']);
	Route::post('/user/{user}/update',[UserController::class,'userupdate']);
    Route::get('/user/{user}/delete',[UserController::class,'userdelete']);
    Route::get('/input_to', function () {
        return view('user.form');
    });
    Route::post("save_user",[UserController::class,"save_user"]);

	Route::get('/skl',[SklController::class,'skl']);
	Route::post('/skl/sklcreate',[SklController::class,'sklcreate']);
	Route::get('/skl/{skl}/skldelete',[SklController::class,'skldelete']);
	Route::get('/skl/{skl}/skledit',[SklController::class,'skledit']);
	Route::post('/skl/{skl}/sklupdate',[SklController::class,'sklupdate']);

	Route::get('/kompetensiinti',[KompetensiintiController::class,'kompetensiinti']);
	Route::post('/kompetensiinti/kompetensiinticreate',[KompetensiintiController::class,'kompetensiinticreate']);
	Route::get('/kompetensiinti/{ki}/kompetensiintidelete',[KompetensiintiController::class,'kompetensiintidelete']);
	Route::get('/kompetensiinti/{ki}/kompetensiintiedit',[KompetensiintiController::class,'kompetensiintiedit']);
	Route::post('/kompetensiinti/{ki}/kompetensiintiupdate',[KompetensiintiController::class,'kompetensiintiupdate']);

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





    Route::get('/audit',[NilaiController::class,'audit']);

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

Route::group(['middleware' => ['auth', 'checkRole:guru,admin']], function () {
    Route::get('/moodle', [MoodleController::class, 'moodle']);
    Route::get('/rombel/{rombel}', [RombelController::class, 'show']);
    Route::post('/extra/import_extra_excel', [NilaiController::class, 'import_extra_excel']);
    Route::get('/extra', [NilaiController::class, 'extra']);
    Route::post('/extra/extracreate', [NilaiController::class, 'extracreate']);
    Route::get('/extra/{extra}/extradelete', [NilaiController::class, 'extradelete']);
    Route::get('/extra/{extra}/extraedit', [NilaiController::class, 'extraedit']);
    Route::post('/extra/{extra}/extraupdate', [NilaiController::class, 'extraupdate']);
    Route::get('/extra_filter', function () {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data_extra = App\Models\Extra::whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $data_extra = App\Models\Extra::latest()->get();
        }
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $penilaian = Penilaian::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        return view('nilai.extrafilter', compact('data_extra', 'mapel', 'siswa', 'penilaian', 'guru', 'kelas', 'kompetensiinti'));
    });

    Route::get('/guru/{guru}/profile', [GuruController::class, 'profile']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/user/{id}/profile', [UserController::class, 'userprofile']);
    Route::get('/my_profile/{id}/myprofile', [UserController::class, 'my_profile']);
    Route::get('/user/{user}/edit', [UserController::class, 'useredit']);
    Route::post('/user/{user}/update', [UserController::class, 'userupdate']);
    Route::post('/siswa/editnilai', [SiswaController::class, 'editnilai'])->name('siswa.editnilai');
    Route::get('/test/{siswa}/profile', [SiswaController::class, 'testprofile'])->name('testsiswaprofile');
    //Route::get('/test/{siswa}/profile', [SiswaController::class, 'testprofile']);
    Route::get('/test', [SiswaController::class, 'test']);
    Route::post('/test/testcreate', [SiswaController::class, 'testcreate']);
    Route::get('/test/{siswa}/edit', [SiswaController::class, 'testedit']);
    Route::post('/test/{siswa}/update', [SiswaController::class, 'testupdate']);
    Route::get('/test/{siswa}/delete', [SiswaController::class, 'testdelete']);
    Route::post('/test/{siswa}/addnilai', [SiswaController::class, 'testaddnilai']);
    Route::get('/test/{siswa}/{idmapel}/testdeletenilai', [SiswaController::class, 'testdeletenilai']);
    Route::get('/test/{id}/aktivasi', [SiswaController::class, 'testaktivasi']);

    Route::get('/tdu', [DashboardController::class, 'index'])->name('tdu');
    Route::get('/kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::get('/kesiswaan', [KesiswaanController::class, 'index'])->name('kesiswaan');
    Route::get('/widget', [WidgetController::class, 'index']);


    Route::get('/isinilai/{id}', [NilaiController::class, 'isinilai'])->name('isinilai');
    Route::get('/getSiswa/{id}', [NilaiController::class, 'getSiswa']);
    Route::get('/getNamaSiswa/{id}', [NilaiController::class, 'getNamaSiswa']);
    Route::get('/getNamaDepan/{id}', [NilaiController::class, 'getNamaDepan']);
    Route::get('/getNamaBelakang/{id}', [NilaiController::class, 'getNamaBelakang']);
    Route::get('/nilai_filter', function () {
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = App\Models\Nilai::whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $data = App\Models\Nilai::latest()->get();
        }
        $kompetensiinti = Kompetensiinti::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $penilaian = Penilaian::all();
        $guru = Guru::all();
        $kelas = Kelas::all();
        return view('nilai.filter', compact('data', 'mapel', 'siswa', 'penilaian', 'guru', 'kelas', 'kompetensiinti'));
    });
    Route::post('/nilai/import_excel', [NilaiController::class, 'import_excel']);
    Route::get('/nilai/export_excel', [NilaiController::class, 'export_excel']);
    Route::post('/nilai/nilaicreate', [NilaiController::class, 'nilaicreate']);
    Route::get('/nilai/{nilai}/nilaidelete', [NilaiController::class, 'nilaidelete']);
    Route::get('/nilai/{nilai}/nilaiedit', [NilaiController::class, 'nilaiedit']);
    Route::post('/nilai/{nilai}/nilaiupdate', [NilaiController::class, 'nilaiupdate']);

});

Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,guru']], function ()
{
	Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/user/{id}/profile',[UserController::class,'userprofile']);
	Route::get('/my_profile/{id}/myprofile',[UserController::class,'my_profile']);
    Route::get('/user/{user}/edit',[UserController::class,'useredit']);
	Route::post('/user/{user}/update',[UserController::class,'userupdate']);
    Route::get('/test/{siswa}/profile', [SiswaController::class, 'testprofile'])->name('testsiswaprofile');
});

Route::get('audits', [AuditController::class,'index'])
    ->middleware('auth', \App\Http\Middleware\AllowOnlyAdmin::class);

Route::get('/{slug}',[
	'uses' => 'App\Http\Controllers\JurnalController@singlepost',
	'as' => 'site.single.post'
]);