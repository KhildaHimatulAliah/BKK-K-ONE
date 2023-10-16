<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ManajemenPegawaiController;
use App\Http\Controllers\ManajemenkandidatController;


//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'landingpage'])->name('landingpage');
    Route::get('/semuaartickel', [AuthController::class, 'semuaArtikel'])->name('semuaartikel');
    Route::get('/additionaljobs', [AuthController::class, 'additionalJobs'])->name('additionaljobs');
    Route::get('/detail/{id}', [AuthController::class, 'detailjob'])->name('detailjob');
    Route::get('/artikelselengkapnya/{id}', [AuthController::class, 'artikelselengkapnya'])->name('artikelselengkapnya');

    Route::get('/log', [AuthController::class, 'login'])->name('login');
    Route::post('/log', [AuthController::class, 'dologin']);
    
    //untuk menampilkan formulir pendaftaran
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    
    //untuk memproses pendaftaran pengguna
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/getname/{username}', [RegisterController::class, 'getName']);

    
    //LUPA PASSWORD 

    // Menampilkan form lupa password
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

    // Mengirim email reset password
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Menampilkan form reset password
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    // Menyimpan password baru
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/superadmin', [SuperadminController::class, 'index']);
    // profile & reset password admin
    Route::get('/profilesaya', [SuperadminController::class, 'profilesaya']);
    Route::post('/simpan-gambar',  [SuperadminController::class, 'simpanGambar'])->name('simpan-gambar');
    Route::post('/resetpassword', [SuperadminController::class, 'repass'])->name('profilesaya');
    // home
    Route::get('/home', [PageController::class, 'home'])->name('superadmin.pageuser.home');
    Route::get('/updatehome/{id}', [PageController::class, 'edithome'])->name('home');
    Route::post('/newhome/{id}', [PageController::class, 'updatehome'])->name('edithome');
    // alur
    Route::get('/alur', [PageController::class, 'alur'])->name('superadmin.pageuser.alur');
    Route::get('/updatealur/{id}', [PageController::class, 'editalur'])->name('alur');
    Route::post('/newalur/{id}', [PageController::class, 'updatealur'])->name('editalur');
    // artikel
    Route::get('/pageartikel', [PageController::class, 'artikel'])->name('pageartikel');
    Route::get('/updateartikel/{id}', [PageController::class, 'editartikel'])->name('updateartikel');
    Route::post('/newartikel/{id}', [PageController::class, 'updateartikel'])->name('editartikel');
    Route::get('/ArtikelDelete/{id}', [PageController::class, 'ArtikelDelete']);
    Route::get('/tambahartikel', [PageController::class, 'tambahartikel'])->name('tambahartikel');
    Route::post('/insertdata', [PageController::class, 'insertdata'])->name('insertdata');
    

    // footer
    Route::get('/footer', [PageController::class, 'footer'])->name('superadmin.pageuser.footer');
    Route::get('/updatefooter/{id}', [PageController::class, 'editfooter'])->name('footer');
    Route::post('/newfooter/{id}', [PageController::class, 'updatefooter'])->name('editfooter');

    //data perusahaan 
    Route::get('/perusahaan', [PerusahaanController::class, 'dataperusahaan'])->name('superadmin.dataperusahaan');
    Route::get('/detailperusahaan', [PerusahaanController::class, 'detailperusahaan'])->name('superadmin.detailperusahaan');
    Route::get('/updateperusahaan/{id}', [PerusahaanController::class, 'editperusahaan'])->name('dataperusahaan');
    Route::post('/newperusahaan/{id}', [PerusahaanController::class, 'updateperusahaan'])->name('editperusahaan');
    Route::get('/deleteperusahaan/{id}', [PerusahaanController::class, 'deleteperusahaan'])->name('deleteperusahaan');
   
    Route::get('/tambahperusahaan', [PerusahaanController::class, 'tambahperusahaan'])->name('superadmin.tambahperusahaan');
    Route::post('/tambahdata', [PerusahaanController::class, 'tambahdata'])->name('tambahdata');
    Route::get('/unduhdataperusahaan', [PerusahaanController::class, 'exportexcel']);
 
    // manajemen user (pegawai)
    Route::get('/akunpegawai', [ManajemenPegawaiController::class, 'pegawai'])->name('superadmin.manajemenuser.pegawai');
    Route::get('/repaspegawai/{id}', [ManajemenPegawaiController::class, 'resetpassword'])->name('ubahpassword');
    Route::post('/passwordpegawai/{id}', [ManajemenPegawaiController::class, 'passwordpegawai'])->name('passwordkandidat');
    Route::get('/deletepegawai/{id}', [ManajemenPegawaiController::class, 'DeletePegawai']);
    Route::get('/tambahpegawai', [ManajemenPegawaiController::class, 'tambahpegawai'])->name('tambahpegawai');
    Route::post('/insertpegawai', [ManajemenPegawaiController::class, 'insertpegawai'])->name('insertpegawai');
    // EXCEL
    Route::get('/unduhdatapegawai', [ManajemenPegawaiController::class, 'exportexcel']);
    

    // manajemen user (kandidat)
    Route::get('/akunkandidat', [KandidatController::class, 'kandidat'])->name('superadmin.manajemenuser.kandidat');
    Route::get('/repaskandidat/{id}', [KandidatController::class, 'resetpassword'])->name('ubahpassword');
    Route::post('/passwordkandidat/{id}', [KandidatController::class, 'passwordkandidat'])->name('passwordkandidat');
    Route::get('/deletekandidat/{id}', [KandidatController::class, 'DeleteKandidat']);
     // EXCEL
    Route::get('/unduhdatakandidat', [KandidatController::class, 'exportexcel']);


      //manajemen kandidat
    Route::get('/manajemenkandidat', [ManajemenkandidatController::class, 'manajemenkandidat'])->name('superadmin.manajemenkandidat.index');
    Route::get('/detailkandidat/{id}', [ManajemenkandidatController::class, 'detailkandidat'])->name('superadmin.manajemenkandidat.detailkandidat');
    Route::post('/updatestatus', [ManajemenkandidatController::class, 'updatestatus'])->name('superadmin.manajemenkandidat.detailkandidat');
    Route::get('/kandidatdelete/{id}', [ManajemenkandidatController::class, 'KandidatDelete']);
     // EXCEL
     Route::get('/unduhkandidat/{id}', [ManajemenkandidatController::class, 'exportexcel']);

    //data lowongan
    Route::get('/datalowongan', [LowonganController::class, 'datalowongan'])->name('datalowongan');
    Route::get('/tambahlowongan', [LowonganController::class, 'tambahlowongan'])->name('superadmin.lowongan.tambahlowongan');
    Route::post('/insertlowongan', [LowonganController::class, 'insertlowongan'])->name('superadmin.lowongan.tambahlowongan');
    Route::get('/editlowongan/{id}', [LowonganController::class, 'editlowongan'])->name('editlowongan');
    Route::post('/updatelowongan/{id}', [LowonganController::class, 'updatelowongan'])->name('updatelowongan');
    Route::get('/deletelowongan/{id}', [LowonganController::class, 'deletelowonganAdmin'])->name('deletelowongan');

    //tahapan
    Route::get('/tahap', [LowonganController::class, 'tahap'])->name('tahap');
    Route::get('/detailtahapan/{id_lowongan}', [LowonganController::class, 'detailtahapan'])->name('detailtahapan');
    Route::post('/tambah-tahapan/{id_lowongan}', [LowonganController::class, 'tambahTahapan'])->name('tambahTahapan');
    Route::get('/deletetahapan/{id}', [LowonganController::class, 'deletetahapan'])->name('deletetahapan');

    
    //data jurusan 
    Route::get('/datajurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::get('/tambahjurusan', [JurusanController::class, 'tambahjurusan'])->name('tambahjurusan');
    Route::post('/insertjurusan', [JurusanController::class, 'insertjurusan'])->name('insertjurusan');
    Route::get('/editjur/{id}', [JurusanController::class, 'editjurusan'])->name('editjurusan');
    Route::post('/updatejurusan/{id}', [JurusanController::class, 'updatejurusan'])->name('updatejurusan');
    Route::get('/deletejurusan/{id}', [JurusanController::class, 'deletejurusan'])->name('deletejurusan');
    // EXCEL
    Route::get('/unduhdatajurusan', [JurusanController::class, 'exportexcel']);
    Route::post('/importjurusan', [JurusanController::class, 'importjurusan'])->name('importjurusan');
    Route::get('/templatejurusan/{filename}', [JurusanController::class, 'templateexcel'])->name('templatejurusan');

    //data NIS
    Route::get('/nis', [NisController::class, 'index'])->name('superadmin.nis.index');
    Route::get('/tambahnis', [NisController::class, 'tambahNis'])->name('superadmin.nis.tambahNis');
    Route::post('/newnis', [NisController::class, 'newNis'])->name('superadmin.nis.tambahNis');
    // editnis
    Route::get('/editnis/{id}', [NisController::class, 'editnis'])->name('editnis');
    Route::post('/updatenis/{id}', [NisController::class, 'updatenis'])->name('updatenis');
    // EXCEL
    Route::post('/importnis', [NisController::class, 'importnis'])->name('importnis');
    Route::get('/templateexcel/{filename}', [NisController::class, 'templateexcel'])->name('importtemplateexcelnis');
    Route::get('/unduhdatanis', [NisController::class, 'exportexcel']);


});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::get('/profile', [PegawaiController::class, 'profilesaya']);
    Route::post('/resetpassword', [PegawaiController::class, 'repass'])->name('repass');
    Route::post('/simpan-gambar',  [PegawaiController::class, 'simpanGambar'])->name('simpan-gambar');
   
    Route::get('/manajkandidat', [ManajemenkandidatController::class, 'manajemenkandidatPeg']);
    Route::get('/detailkandidat-pegawai/{id}', [ManajemenkandidatController::class, 'detailkandidatpeg']);
    Route::get('/unduhkandidat-peg/{id}', [ManajemenkandidatController::class, 'exportexcel']);

    // lowongan
    Route::get('/datalowonganpekerjaan', [LowonganController::class, 'datalowonganpeg'])->name('datalowonganpekerjaan');
    Route::get('/deletelowonganpeg/{id}', [LowonganController::class, 'deletelowonganpeg']);
    Route::get('/editlowonganpeg/{id}', [LowonganController::class, 'editlowonganpeg'])->name('editlowonganpeg');
    Route::post('/updatelowonganpeg/{id}', [LowonganController::class, 'updatelowonganpeg'])->name('updatelowonganpeg');
    Route::get('/tambahlowonganpeg', [LowonganController::class, 'tambahlowonganpeg'])->name('tambahlowonganpeg');
    Route::post('/insertlowonganpeg', [LowonganController::class, 'insertlowonganpeg'])->name('insertlowonganpeg');

     //tahapan
     Route::get('/tahapan-pegawai', [LowonganController::class, 'tahapanPeg'])->name('tahapan-pegawai');
     Route::get('/detailtahapan-pegawai/{id_lowongan}', [LowonganController::class, 'detailtahapanPeg'])->name('detailtahapan-pegawai');
     Route::post('/tambah-tahapan-pegawai/{id_lowongan}', [LowonganController::class, 'tambahTahapanPeg'])->name('tambah-tahapan-pegawai');
     
});

// untuk user
Route::group(['middleware' =>['auth', 'checkrole:3']], function() {
    Route::get('/kandidat', [UserController::class, 'index']);
    //reset password
    Route::post('/resetpassword', [UserController::class, 'repass'])->name('repass');
    Route::get('/profileuser', [UserController::class, 'profile']);
    Route::post('/simpan-gambarkandidat',  [UserController::class, 'simpanGambarkandidat'])->name('simpan-gambarkandidat');
    //editprofileuser
    Route::get('/edit/{id}', [UserController::class, 'editprofile'])->name('profileuser');
    // update
    Route::post('/updateprofile/{id}', [UserController::class, 'updateprofile'])->name('profileuser');
    //data profile
    Route::get('/export-pdf', [UserController::class,'exportPdf'])->name('profile.export');

    // datalamaran
    Route::get('/datalamaran', [UserController::class, 'datalamaran']);

    // tahapseleksi
    Route::get('/tahapseleksi', [UserController::class, 'tahapseleksi']);
    Route::get('/tahapan/{id_lowongan}', [UserController::class, 'tahapan']);

    // lowongankerja
    Route::get('/lowongankerja', [UserController::class, 'lowongankerja']);
    Route::get('/detaillowongan/{id}', [UserController::class, 'detail']);
    Route::post('/detaillowongan', [UserController::class, 'addPengajuan']);

    //datadiri pdf kandidat
    Route::get('/export-pdf', [UserController::class,'exportPdf'])->name('profile.export');
});

Route::get('/getperusahaan/{id}', [PerusahaanController::class, 'getperusahaan'])->name('superadmin.getperusahaan');