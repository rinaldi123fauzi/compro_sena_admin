<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\VendorController;
//use Illuminate\Support\Facades\Auth; 

//Auth::routes();
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

/* #Login */
Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('index')->middleware('guest');
Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('index_login')->middleware('guest');


Route::get('download-report/{filename}', [App\Http\Controllers\AnnualreportController::class, 'downloadreport']);



Route::post('checklogin', [App\Http\Controllers\LoginController::class, 'checklogin']);
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout')->middleware('auth');



Route::prefix('vendor')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\VendorController::class, 'list'])->name('vendor.list');
    Route::get('/add', [App\Http\Controllers\VendorController::class, 'add'])->name('vendor.add');
    Route::post('/store', [App\Http\Controllers\VendorController::class, 'store'])->name('vendor.store');

    Route::get('/edit/{id}', [App\Http\Controllers\VendorController::class, 'edit'])->name('vendor.edit');

    Route::put('/update/{id}', [App\Http\Controllers\VendorController::class, 'update'])->name('vendor.update');

    Route::get('/destroy/{id}', [App\Http\Controllers\VendorController::class, 'destroy'])->name('vendor.destroy');
});



Route::prefix('regional')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\RegionalController::class, 'list'])->name('regional.list');
    Route::get('/add', [App\Http\Controllers\RegionalController::class, 'add'])->name('regional.add');
    Route::post('/store', [App\Http\Controllers\RegionalController::class, 'store'])->name('regional.store');

    Route::get('/edit/{id}', [App\Http\Controllers\RegionalController::class, 'edit'])->name('regional.edit');

    Route::put('/update/{id}', [App\Http\Controllers\RegionalController::class, 'update'])->name('regional.update');

    Route::get('/destroy/{id}', [App\Http\Controllers\RegionalController::class, 'destroy'])->name('regional.destroy');
});


Route::prefix('project')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\ProjectController::class, 'list'])->name('project.list');
    Route::get('/add', [App\Http\Controllers\ProjectController::class, 'add'])->name('project.add');
    Route::post('/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');

    Route::get('/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');

    Route::put('/update/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');

    Route::get('/destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
});


Route::prefix('highlight-project')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\HighlightProjectController::class, 'index'])->name('highlight-project.index');
    Route::get('/add', [App\Http\Controllers\HighlightProjectController::class, 'add'])->name('highlight-project.add');
    Route::post('/store', [App\Http\Controllers\HighlightProjectController::class, 'store'])->name('highlight-project.store');
    Route::get('/edit/{id}', [App\Http\Controllers\HighlightProjectController::class, 'edit'])->name('highlight-project.edit');
    Route::put('/update/{id}', [App\Http\Controllers\HighlightProjectController::class, 'update'])->name('highlight-project.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\HighlightProjectController::class, 'destroy'])->name('highlight-project.destroy');
});


Route::prefix('capability')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\CapabilityController::class, 'index'])->name('capability.index');
    Route::get('/add', [App\Http\Controllers\CapabilityController::class, 'add'])->name('capability.add');
    Route::post('/store', [App\Http\Controllers\CapabilityController::class, 'store'])->name('capability.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CapabilityController::class, 'edit'])->name('capability.edit');
    Route::put('/update/{id}', [App\Http\Controllers\CapabilityController::class, 'update'])->name('capability.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\CapabilityController::class, 'destroy'])->name('capability.destroy');

    // Layanan routes (nested under capability)
    Route::get('/{capability_id}/layanan', [App\Http\Controllers\LayananController::class, 'index'])->name('layanan.index');
    Route::get('/{capability_id}/layanan/add', [App\Http\Controllers\LayananController::class, 'add'])->name('layanan.add');
    Route::post('/{capability_id}/layanan/store', [App\Http\Controllers\LayananController::class, 'store'])->name('layanan.store');
    Route::get('/{capability_id}/layanan/{id}/edit', [App\Http\Controllers\LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/{capability_id}/layanan/{id}/update', [App\Http\Controllers\LayananController::class, 'update'])->name('layanan.update');
    Route::get('/{capability_id}/layanan/{id}/destroy', [App\Http\Controllers\LayananController::class, 'destroy'])->name('layanan.destroy');

    /* #Software Title */
    Route::get('/editsoftwaretitle', [App\Http\Controllers\CapabilityController::class, 'editsoftwaretitle'])->name('capability.editsoftwaretitle');
    Route::put('/updatesoftwaretitle', [App\Http\Controllers\CapabilityController::class, 'updatesoftwaretitle'])->name('capability.updatesoftwaretitle');

    /* #Tools Title */
    Route::get('/edittoolstitle', [App\Http\Controllers\CapabilityController::class, 'edittoolstitle'])->name('capability.edittoolstitle');
    Route::put('/updatetoolstitle', [App\Http\Controllers\CapabilityController::class, 'updatetoolstitle'])->name('capability.updatetoolstitle');
});


Route::prefix('disiplin')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\DisiplinController::class, 'index'])->name('disiplin.index');
    Route::get('/add', [App\Http\Controllers\DisiplinController::class, 'add'])->name('disiplin.add');
    Route::post('/store', [App\Http\Controllers\DisiplinController::class, 'store'])->name('disiplin.store');
    Route::get('/edit/{id}', [App\Http\Controllers\DisiplinController::class, 'edit'])->name('disiplin.edit');
    Route::put('/update/{id}', [App\Http\Controllers\DisiplinController::class, 'update'])->name('disiplin.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\DisiplinController::class, 'destroy'])->name('disiplin.destroy');
});


Route::prefix('software-hardware')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\SoftwareHardwareController::class, 'index'])->name('software_hardware.index');
    Route::get('/add', [App\Http\Controllers\SoftwareHardwareController::class, 'add'])->name('software_hardware.create');
    Route::post('/store', [App\Http\Controllers\SoftwareHardwareController::class, 'store'])->name('software_hardware.store');
    Route::get('/edit/{softwareHardware}', [App\Http\Controllers\SoftwareHardwareController::class, 'edit'])->name('software_hardware.edit');
    Route::put('/update/{softwareHardware}', [App\Http\Controllers\SoftwareHardwareController::class, 'update'])->name('software_hardware.update');
    Route::delete('/destroy/{softwareHardware}', [App\Http\Controllers\SoftwareHardwareController::class, 'destroy'])->name('software_hardware.destroy');
});


Route::prefix('proyek')->middleware('auth')->group(function () {
    Route::get('/list', [App\Http\Controllers\ProyekController::class, 'list'])->name('proyek.list');


    Route::get('/add', [App\Http\Controllers\ProyekController::class, 'add'])->name('proyek.add');
    Route::post('/store', [App\Http\Controllers\ProyekController::class, 'store'])->name('proyek.store');

    Route::get('/edit/{id}', [App\Http\Controllers\ProyekController::class, 'edit'])->name('proyek.edit');
    Route::put('/update/{id}', [App\Http\Controllers\ProyekController::class, 'update'])->name('proyek.update');

    Route::get('/destroy/{id}', [App\Http\Controllers\ProyekController::class, 'destroy'])->name('proyek.destroy');

    Route::get('/detail/{id}', [App\Http\Controllers\ProyekController::class, 'detail'])->name('proyek.detail');
});



Route::prefix('template')->middleware('guest')->group(function () {
    Route::get('/login', [App\Http\Controllers\TemplateController::class, 'login'])->name('template.login');
    Route::get('/dashboard', [App\Http\Controllers\TemplateController::class, 'dashboard'])->name('template.dashboard');
    Route::get('/user', [App\Http\Controllers\TemplateController::class, 'user'])->name('template.user');
    Route::get('/adduser', [App\Http\Controllers\TemplateController::class, 'adduser'])->name('template.adduser');

    Route::get('/addnews', [App\Http\Controllers\TemplateController::class, 'addnews'])->name('template.addnews');
    Route::get('/homepage', [App\Http\Controllers\TemplateController::class, 'homepage'])->name('template.homepage');
});


Route::prefix('berita')->middleware('guest')->group(function () {
    Route::get('/add', [App\Http\Controllers\BeritaController::class, 'add'])->name('berita.add');
});


Route::prefix('home')->middleware('auth')->group(function () {
    // Home Slider - Only edit functionality
    Route::get('/slider', [App\Http\Controllers\HomeSliderController::class, 'edit'])->name('home-slider.edit');
    Route::put('/slider', [App\Http\Controllers\HomeSliderController::class, 'update'])->name('home-slider.update');

    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
    Route::put('/about_update', [App\Http\Controllers\HomeController::class, 'about_update'])->name('home.about_update');

    /* #Counter */
    Route::get('/counter_list', [App\Http\Controllers\HomeController::class, 'counter_list'])->name('home.counter_list');
    Route::get('/counter_add', [App\Http\Controllers\HomeController::class, 'counter_add'])->name('home.counter_add');
    Route::post('/counter_store', [App\Http\Controllers\HomeController::class, 'counter_store'])->name('home.counter_store');
    Route::get('/counter_edit/{id}', [App\Http\Controllers\HomeController::class, 'counter_edit'])->name('home.counter_edit');
    Route::put('/counter_update/{id}', [App\Http\Controllers\HomeController::class, 'counter_update'])->name('home.counter_update');
    Route::get('/counter_destroy/{id}', [App\Http\Controllers\HomeController::class, 'counter_destroy'])->name('home.counter_destroy');

    /* #Capability */
    Route::get('/capability_list', [App\Http\Controllers\HomeController::class, 'capability_list'])->name('home.capability_list');
    Route::get('/capability_add', [App\Http\Controllers\HomeController::class, 'capability_add'])->name('home.capability_add');
    Route::post('/capability_store', [App\Http\Controllers\HomeController::class, 'capability_store'])->name('home.capability_store');
    Route::get('/capability_edit/{id}', [App\Http\Controllers\HomeController::class, 'capability_edit'])->name('home.capability_edit');
    Route::put('/capability_update/{id}', [App\Http\Controllers\HomeController::class, 'capability_update'])->name('home.capability_update');
    Route::get('/capability_destroy/{id}', [App\Http\Controllers\HomeController::class, 'capability_destroy'])->name('home.capability_destroy');


    Route::get('/editcapabilitiestitle', [App\Http\Controllers\HomeController::class, 'editcapabilitiestitle'])->name('home.editcapabilitiestitle');
    Route::put('/updatecapabilitiestitle', [App\Http\Controllers\HomeController::class, 'updatecapabilitiestitle'])->name('home.updatecapabilitiestitle');

    /* #Counter Title */
    Route::get('/editcountertitle', [App\Http\Controllers\HomeController::class, 'editcountertitle'])->name('home.editcountertitle');
    Route::put('/updatecountertitle', [App\Http\Controllers\HomeController::class, 'updatecountertitle'])->name('home.updatecountertitle');

    /* #Client Title */
    Route::get('/editclienttitle', [App\Http\Controllers\HomeController::class, 'editclienttitle'])->name('home.editclienttitle');
    Route::put('/updateclienttitle', [App\Http\Controllers\HomeController::class, 'updateclienttitle'])->name('home.updateclienttitle');




    /* #Client */
    Route::get('/client_list', [App\Http\Controllers\HomeController::class, 'client_list'])->name('home.client_list');
    Route::get('/client_add', [App\Http\Controllers\HomeController::class, 'client_add'])->name('home.client_add');
    Route::post('/client_store', [App\Http\Controllers\HomeController::class, 'client_store'])->name('home.client_store');
    Route::get('/client_edit/{id}', [App\Http\Controllers\HomeController::class, 'client_edit'])->name('home.client_edit');
    Route::put('/client_update/{id}', [App\Http\Controllers\HomeController::class, 'client_update'])->name('home.client_update');
    Route::get('/client_destroy/{id}', [App\Http\Controllers\HomeController::class, 'client_destroy'])->name('home.client_destroy');
});



Route::prefix('about')->middleware('auth')->group(function () {
    Route::get('/about', [App\Http\Controllers\AboutController::class, 'about'])->name('about.about');
    Route::put('/about_update', [App\Http\Controllers\AboutController::class, 'about_update'])->name('about.about_update');
    Route::get('/visimisi', [App\Http\Controllers\AboutController::class, 'visimisi'])->name('about.visimisi');
    Route::put('/visimisi_update', [App\Http\Controllers\AboutController::class, 'visimisi_update'])->name('about.visimisi_update');

    Route::get('/akhlak', [App\Http\Controllers\AboutController::class, 'akhlak'])->name('about.akhlak');
    Route::post('/akhlak_store', [App\Http\Controllers\AboutController::class, 'akhlak_store'])->name('about.akhlak_store');

    Route::get('/akhlak_edit/{id}', [App\Http\Controllers\AboutController::class, 'akhlak_edit'])->name('about.akhlak_edit');
    Route::put('/akhlak_update/{id}', [App\Http\Controllers\AboutController::class, 'akhlak_update'])->name('about.akhlak_update');

    Route::get('/akhlak_destroy/{id}', [App\Http\Controllers\AboutController::class, 'akhlak_destroy'])->name('about.akhlak_destroy');

    Route::get('/direksidankomisaris', [App\Http\Controllers\AboutController::class, 'direksidankomisaris'])->name('about.direksidankomisaris');
    Route::post('/direksidankomisaris_store', [App\Http\Controllers\AboutController::class, 'direksidankomisaris_store'])->name('about.direksidankomisaris_store');

    Route::get('/direksidankomisaris_edit/{id}', [App\Http\Controllers\AboutController::class, 'direksidankomisaris_edit'])->name('about.direksidankomisaris_edit');
    Route::put('/direksidankomisaris_update/{id}', [App\Http\Controllers\AboutController::class, 'direksidankomisaris_update'])->name('about.direksidankomisaris_update');

    Route::get('/direksidankomisaris_destroy/{id}', [App\Http\Controllers\AboutController::class, 'direksidankomisaris_destroy'])->name('about.direksidankomisaris_destroy');

    Route::get('/piagam', [App\Http\Controllers\AboutController::class, 'piagam'])->name('about.piagam');
    Route::post('/piagam_store', [App\Http\Controllers\AboutController::class, 'piagam_store'])->name('about.piagam_store');
    Route::get('/piagam_edit/{id}', [App\Http\Controllers\AboutController::class, 'piagam_edit'])->name('about.piagam_edit');
    Route::put('/piagam_update/{id}', [App\Http\Controllers\AboutController::class, 'piagam_update'])->name('about.piagam_update');
    Route::get('/piagam_destroy/{id}', [App\Http\Controllers\AboutController::class, 'piagam_destroy'])->name('about.piagam_destroy');

    Route::get('/komitmendankebijakan', [App\Http\Controllers\AboutController::class, 'komitmendankebijakan'])->name('about.komitmendankebijakan');
    Route::post('/komitmendankebijakan_store', [App\Http\Controllers\AboutController::class, 'komitmendankebijakan_store'])->name('about.komitmendankebijakan_store');
    Route::get('/komitmendankebijakan_edit/{id}', [App\Http\Controllers\AboutController::class, 'komitmendankebijakan_edit'])->name('about.komitmendankebijakan_edit');
    Route::put('/komitmendankebijakan_update/{id}', [App\Http\Controllers\AboutController::class, 'komitmendankebijakan_update'])->name('about.komitmendankebijakan_update');
    Route::get('/komitmendankebijakan_destroy/{id}', [App\Http\Controllers\AboutController::class, 'komitmendankebijakan_destroy'])->name('about.komitmendankebijakan_destroy');



    Route::get('/editakhlaktitle', [App\Http\Controllers\AboutController::class, 'editakhlaktitle'])->name('about.editakhlaktitle');
    Route::put('/updateakhlaktitle', [App\Http\Controllers\AboutController::class, 'updateakhlaktitle'])->name('about.updateakhlaktitle');


    Route::get('/piagamtitle', [App\Http\Controllers\AboutController::class, 'piagamtitle'])->name('about.piagamtitle');
    Route::put('/updatepiagamtitle', [App\Http\Controllers\AboutController::class, 'updatepiagamtitle'])->name('about.updatepiagamtitle');

    Route::get('/akhlakeditbackground', [App\Http\Controllers\AboutController::class, 'akhlakeditbackground'])->name('about.akhlakeditbackground');
    Route::put('/updateakhlakeditbackground', [App\Http\Controllers\AboutController::class, 'updateakhlakeditbackground'])->name('about.updateakhlakeditbackground');

    //About Us Image Slider
    Route::get('/aboutus_image_slider_add', [App\Http\Controllers\AboutController::class, 'aboutus_image_slider_add'])->name('about.aboutus_image_slider_add');
    Route::post('/aboutus_image_slider_store', [App\Http\Controllers\AboutController::class, 'aboutus_image_slider_store'])->name('about.aboutus_image_slider_store');
    Route::get('/aboutus_image_slider_edit/{id}', [App\Http\Controllers\AboutController::class, 'aboutus_image_slider_edit'])->name('about.aboutus_image_slider_edit');
    Route::put('/aboutus_image_slider_update/{id}', [App\Http\Controllers\AboutController::class, 'aboutus_image_slider_update'])->name('about.aboutus_image_slider_update');
    Route::get('/aboutus_image_slider_destroy/{id}', [App\Http\Controllers\AboutController::class, 'aboutus_image_slider_destroy'])->name('about.aboutus_image_slider_destroy');

    /* #Executive Leadership Title */
    Route::get('/editexecutiveleadershiptitle', [App\Http\Controllers\AboutController::class, 'editexecutiveleadershiptitle'])->name('about.editexecutiveleadershiptitle');
    Route::put('/updateexecutiveleadershiptitle', [App\Http\Controllers\AboutController::class, 'updateexecutiveleadershiptitle'])->name('about.updateexecutiveleadershiptitle');

    /* #Komitmen dan Kebijakan Title */
    Route::get('/editkomitmendankebijakantitle', [App\Http\Controllers\AboutController::class, 'editkomitmendankebijakantitle'])->name('about.editkomitmendankebijakantitle');
    Route::put('/updatekomitmendankebijakantitle', [App\Http\Controllers\AboutController::class, 'updatekomitmendankebijakantitle'])->name('about.updatekomitmendankebijakantitle');

    /* #Struktur Organisasi */
    Route::get('/strukturorganisasi', [App\Http\Controllers\AboutController::class, 'strukturorganisasi'])->name('about.strukturorganisasi');
    Route::put('/strukturorganisasi_update', [App\Http\Controllers\AboutController::class, 'strukturorganisasi_update'])->name('about.strukturorganisasi_update');

    /* #Kepemilikan Saham */
    Route::get('/kepemilikansaham', [App\Http\Controllers\AboutController::class, 'kepemilikansaham'])->name('about.kepemilikansaham');
    Route::put('/kepemilikansaham_update', [App\Http\Controllers\AboutController::class, 'kepemilikansaham_update'])->name('about.kepemilikansaham_update');
});


Route::prefix('service')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');
    Route::get('/add', [App\Http\Controllers\ServiceController::class, 'add'])->name('service.add');
    Route::post('/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('service.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/update/{id}', [App\Http\Controllers\ServiceController::class, 'update'])->name('service.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/discipline_add', [App\Http\Controllers\ServiceController::class, 'discipline_add'])->name('service.discipline_add');
    Route::put('/discipline_update', [App\Http\Controllers\ServiceController::class, 'discipline_update'])->name('service.discipline_update');

    /* #Softwaredanhardware */
    Route::get('/softwaredanhardware', [App\Http\Controllers\ServiceController::class, 'softwaredanhardware'])->name('service.softwaredanhardware');
    Route::post('/softwaredanhardware_store', [App\Http\Controllers\ServiceController::class, 'softwaredanhardware_store'])->name('service.softwaredanhardware_store');
    Route::get('/softwaredanhardware_edit/{id}', [App\Http\Controllers\ServiceController::class, 'softwaredanhardware_edit'])->name('service.softwaredanhardware_edit');
    Route::put('/softwaredanhardware_update/{id}', [App\Http\Controllers\ServiceController::class, 'softwaredanhardware_update'])->name('service.softwaredanhardware_update');
    Route::get('/softwaredanhardware_destroy/{id}', [App\Http\Controllers\ServiceController::class, 'softwaredanhardware_destroy'])->name('service.softwaredanhardware_destroy');
});




Route::prefix('project')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
    Route::get('/add', [App\Http\Controllers\ProjectController::class, 'add'])->name('project.add');
    Route::post('/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');

    Route::get('/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/update/{id}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
});


Route::prefix('instagram')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\InstagramController::class, 'index'])->name('instagram.index');
    Route::get('/add', [App\Http\Controllers\InstagramController::class, 'add'])->name('instagram.add');
    Route::post('/store', [App\Http\Controllers\InstagramController::class, 'store'])->name('instagram.store');
    Route::get('/edit/{id}', [App\Http\Controllers\InstagramController::class, 'edit'])->name('instagram.edit');
    Route::put('/update/{id}', [App\Http\Controllers\InstagramController::class, 'update'])->name('instagram.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\InstagramController::class, 'destroy'])->name('instagram.destroy');
});




Route::prefix('news')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
    Route::get('/add', [App\Http\Controllers\NewsController::class, 'add'])->name('news.add');
    Route::post('/store', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');

    Route::get('/edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
    Route::put('/update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('header')->middleware('auth')->group(function () {
    Route::get('/logo', [App\Http\Controllers\HeaderController::class, 'logo'])->name('header.logo');
    Route::put('/logo_update', [App\Http\Controllers\HeaderController::class, 'logo_update'])->name('header.logo_update');

    Route::get('/about_us', [App\Http\Controllers\HeaderController::class, 'about_us'])->name('header.about_us');
    Route::put('/about_us_update', [App\Http\Controllers\HeaderController::class, 'about_us_update'])->name('header.about_us_update');

    Route::get('/capability', [App\Http\Controllers\HeaderController::class, 'capability'])->name('header.capability');
    Route::put('/capability_update', [App\Http\Controllers\HeaderController::class, 'capability_update'])->name('header.capability_update');

    Route::get('/experience', [App\Http\Controllers\HeaderController::class, 'experience'])->name('header.experience');
    Route::put('/experience_update', [App\Http\Controllers\HeaderController::class, 'experience_update'])->name('header.experience_update');

    Route::get('/contact_us', [App\Http\Controllers\HeaderController::class, 'contact_us'])->name('header.contact_us');
    Route::put('/contact_us_update', [App\Http\Controllers\HeaderController::class, 'contact_us_update'])->name('header.contact_us_update');


    Route::get('/mediainvestor', [App\Http\Controllers\HeaderController::class, 'mediainvestor'])->name('header.mediainvestor');
    Route::put('/mediainvestor_update', [App\Http\Controllers\HeaderController::class, 'mediainvestor_update'])->name('header.mediainvestor_update');

    Route::get('/news', [App\Http\Controllers\HeaderController::class, 'news'])->name('header.news');
    Route::put('/news_update', [App\Http\Controllers\HeaderController::class, 'news_update'])->name('header.news_update');

    Route::get('/investor', [App\Http\Controllers\HeaderController::class, 'investor'])->name('header.investor');
    Route::put('/investor_update', [App\Http\Controllers\HeaderController::class, 'investor_update'])->name('header.investor_update');


    Route::get('/annualreport', [App\Http\Controllers\HeaderController::class, 'annualreport'])->name('header.annualreport');
    Route::put('/annualreport_update', [App\Http\Controllers\HeaderController::class, 'annualreport_update'])->name('header.annualreport_update');
});

Route::prefix('footer')->middleware('auth')->group(function () {
    Route::get('/edit', [App\Http\Controllers\FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/update', [App\Http\Controllers\FooterController::class, 'update'])->name('footer.update');
});


Route::prefix('annualreport')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\AnnualreportController::class, 'index'])->name('annualreport.index');
    Route::get('/add', [App\Http\Controllers\AnnualreportController::class, 'add'])->name('annualreport.add');
    Route::post('/store', [App\Http\Controllers\AnnualreportController::class, 'store'])->name('annualreport.store');

    Route::get('/edit/{id}', [App\Http\Controllers\AnnualreportController::class, 'edit'])->name('annualreport.edit');
    Route::put('/update/{id}', [App\Http\Controllers\AnnualreportController::class, 'update'])->name('annualreport.update');

    Route::get('/destroy/{id}', [App\Http\Controllers\AnnualreportController::class, 'destroy'])->name('annualreport.destroy');


    Route::get('/pertanyaan', [App\Http\Controllers\AnnualreportController::class, 'pertanyaan'])->name('annualreport.pertanyaan');
    Route::get('/showpertanyaan/{id}', [App\Http\Controllers\AnnualreportController::class, 'showpertanyaan'])->name('annualreport.showpertanyaan');

    Route::put('/updatepertanyaan/{id}', [App\Http\Controllers\AnnualreportController::class, 'updatepertanyaan'])->name('annualreport.updatepertanyaan');

    Route::get('/destroypertanyaan/{id}', [App\Http\Controllers\AnnualreportController::class, 'destroypertanyaan'])->name('annualreport.destroypertanyaan');

    //Send Report
    Route::get('/sendreport/{id}', [App\Http\Controllers\AnnualreportController::class, 'sendreport']);
    Route::get('/sendemail', [App\Http\Controllers\AnnualreportController::class, 'sendemail']);
});


Route::prefix('contact-us')->middleware('auth')->group(function () {
    Route::get('/edit', [App\Http\Controllers\ContactusController::class, 'edit'])->name('contact-us.edit');
    Route::put('/update/{id}', [App\Http\Controllers\ContactusController::class, 'update'])->name('contact-us.update');

    Route::get('/edittitle', [App\Http\Controllers\ContactusController::class, 'edittitle'])->name('contactus.edittitle');
    Route::put('/updatetitle', [App\Http\Controllers\ContactusController::class, 'updatetitle'])->name('contactus.updatetitle');

    Route::get('/listpertanyaan', [App\Http\Controllers\ContactusController::class, 'listpertanyaan'])->name('contact-us.listpertanyaan');
    Route::get('/showpertanyaan/{id}', [App\Http\Controllers\ContactusController::class, 'showpertanyaan'])->name('contact-us.showpertanyaan');


    Route::put('/updatepertanyaan/{id}', [App\Http\Controllers\ContactusController::class, 'updatepertanyaan'])->name('contact-us.updatepertanyaan');

    Route::get('/destroypertanyaan/{id}', [App\Http\Controllers\ContactusController::class, 'destroypertanyaan'])->name('contact-us.destroypertanyaan');
});


Route::prefix('experience')->middleware('auth')->group(function () {
    Route::get('/section1', [App\Http\Controllers\ExperienceController::class, 'section1'])->name('experience.section1');
    Route::put('/updatesection1', [App\Http\Controllers\ExperienceController::class, 'updatesection1'])->name('experience.updatesection1');

    Route::get('/section2', [App\Http\Controllers\ExperienceController::class, 'section2'])->name('experience.section2');
    Route::put('/updatesection2', [App\Http\Controllers\ExperienceController::class, 'updatesection2'])->name('experience.updatesection2');

    Route::get('/section3', [App\Http\Controllers\ExperienceController::class, 'section3'])->name('experience.section3');
    Route::put('/updatesection3', [App\Http\Controllers\ExperienceController::class, 'updatesection3'])->name('experience.updatesection3');
});


Route::prefix('log')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\LogController::class, 'index'])->name('log.index');
});
