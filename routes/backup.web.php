<?php

Auth::routes();
Route::get('/home','AdminController@index',['middleware' => ['auth','role: admin']]);
// HOME //
Route::group(['prefix' => '', 'middleware' => ['web']],function() {
  // LOGIN //
  Route::get('/login', 'AuthController@showLoginForm')->name('login');
  Route::post('/login', 'AuthController@login')->name('post.login');

  // BERANDA //
  Route::get('/', 'BerandaController@index')->name('beranda');
  Route::get('/id','BerandaController@index')->name('beranda.id');
  Route::get('/how-to-order', 'BerandaController@carapemesanan')->name('beranda.carapemesanan');
  Route::get('/aboutus', 'BerandaController@aboutus')->name('beranda.aboutus');
  Route::get('/contactus', 'BerandaController@contactus')->name('beranda.contactus');
  Route::get('/gallery', 'GalleryController@beranda')->name('gallery.beranda');
  Route::get('/careers', 'KarirController@beranda')->name('karir.beranda');
  //Route::get('/menjadi-member', 'BerandaController@menjadi_member')->name('beranda.menjadimember');
  //Route::get('/carapembayaran', 'BerandaController@carapembayaran')->name('beranda.carapembayaran');
  //Route::post('/cekpemesanan', 'BerandaController@cekpemesanan')->name('beranda.sendCekPemesanan');
  //Route::get('/cekpemesanan', 'BerandaController@hasil_cekpemesanan')->name('beranda.hasilCekPemesanan');


  // Route Tiket //
  Route::group(['prefix' => 'tiket'], function () {
    Route::get('/', 'TiketController@beranda')->name('tiket.beranda');
  });

  // Route Hotel //
  Route::group(['prefix' => 'hotel'], function () {
    Route::get('/', 'HotelController@beranda')->name('hotel.beranda');
  });

  // Route Tour //
  Route::group(['prefix' => 'tour'], function () {
    Route::get('/', 'TourController@beranda')->name('tour.beranda');
    Route::get('/request','TourController@permintaan')->name('tour.request');
    Route::post('/request', 'TourController@kirim_permintaan')->name('tour.kirim');
    Route::post('/cari','TourController@cari')->name('tour.search');
    Route::get('/{slug}', 'TourController@lihat_paket')->name('tour.view');
    Route::get('/{slug}/pesan', 'TourController@form_pesan')->name('tour.form_pesan');
    Route::post('/pesan', 'TourController@sendForm_pesan')->name('tour.sendPesan');
  });

  // Route Umroh //
  Route::group(['prefix' => 'umroh'], function () {
    Route::get('/', 'UmrohController@beranda')->name('umroh.beranda');
    Route::post('/cari', 'UmrohController@cari')->name('umroh.search');
    Route::get('/{slug}', 'UmrohController@lihat_paket')->name('umroh.view');
    Route::get('/{slug}/pesan', 'UmrohController@form_pesan')->name('umroh.form_pesan');
    Route::post('/pesan', 'UmrohController@sendForm_pesan')->name('umroh.sendPesan');
  });

  // Route Sewa Mobil //
  Route::group(['prefix' => 'sewa-mobil'], function () {
    Route::get('/', 'MobilController@beranda')->name('mobil.beranda');
  });

  // Route Blog //
  Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'ArtikelController@beranda')->name('blog.beranda');
    Route::get('/{slug}', 'ArtikelController@lihat_artikel')->name('blog.lihatblog');
  });
});

// ROUTE DASHBOARD ADMIN //
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function() {
  Route::get('/','AdminController@index')->name('dashboard.admin');
  Route::get('/profile', 'AdminController@profil')->name('dashboard.admin.profile');

  // PAKET TOUR //
  Route::group(['prefix' => ''], function() {
    /*
    Route::get('/','TourController@index')->name('tour.index');
    Route::get('/create', 'TourController@create')->name('tour.create');
    Route::post('/', 'TourController@store')->name('tour.store');
    Route::get('/{tour_id}/edit','TourController@edit')->name('tour.edit');
    Route::put('/{tour_id}', 'TourController@update')->name('tour.update');
    Route::get('/detail/{tour_id}', 'TourController@show')->name('tour.show');
    Route::get('/dl/{slug}','TourController@downloadPaket')->name('tour.download');
    Route::delete('/{tour_id}', 'TourController@destroy')->name('tour.destroy');
    */
    Route::resource('/tour','TourController');
    Route::get('/dl/{slug}','TourController@downloadPaket')->name('tour.download');
  });

  // PEMESANAN TOUR //
  Route::group(['prefix' => 'pemesanan'], function() {
    Route::get('/tour', 'TourController@beranda_pemesanan')->name('tour.pemesanan');
    Route::get('/tour/{id}/edit', 'TourController@edit_pemesanan')->name('tour.pemesanan.edit');
    Route::put('/tour/{id}', 'TourController@update_pemesanan')->name('tour.pemesanan.update');
    Route::get('/tour/detail/{id}', 'TourController@show_pemesanan')->name('tour.pemesanan.show');
    Route::get('/dl/{slug}','TourController@downloadPemesanan')->name('tour.pemesanan.download');
    Route::delete('/tour/{id}', 'TourController@destroy_pemesanan')->name('tour.pemesanan.destroy');
  });

  // PERMINTAAN TOUR //
  Route::group(['prefix' => 'permintaan'],function() {
    Route::get('/tour', 'TourController@beranda_permintaan')->name('tour.permintaan');
    Route::get('/tour/{id}/edit', 'TourController@edit_permintaan')->name('tour.permintaan.edit');
    Route::put('/tour/{id}', 'TourController@update_permintaan')->name('tour.permintaan.update');
    Route::get('/tour/detail/{id}', 'TourController@show_permintaan')->name('tour.permintaan.detail');
    Route::delete('/tour/{id}', 'TourController@destroy')->name('tour.permintaan.destroy');
    Route::get('/dl/{id}','TourController@downloadPermintaan')->name('tour.download.permintaan');
  });

  // PAKET UMROH //
  Route::group(['prefix' => 'umroh'], function() {
    Route::get('/','UmrohController@index')->name('umroh.index');
    Route::get('/create', 'UmrohController@create')->name('umroh.create');
    Route::post('/', 'UmrohController@store')->name('umroh.store');
    Route::get('/{umroh_id}/edit','UmrohController@edit')->name('umroh.edit');
    Route::put('/{umroh_id}', 'UmrohController@update')->name('umroh.update');
    Route::get('/detail/{umroh_id}', 'UmrohController@show')->name('umroh.show');
    Route::get('/dl/{slug}','UmrohController@downloadPDF')->name('umroh.download');
    Route::delete('/{umroh_id}', 'UmrohController@destroy')->name('umroh.destroy');
  });

  // PEMESANAN TOUR //
  Route::group(['prefix' => 'pemesanan'], function() {
    Route::get('/umroh', 'UmrohController@beranda_pemesanan')->name('umroh.pemesanan');
    Route::get('/umroh/{id}/edit', 'UmrohController@edit_pemesanan')->name('umroh.pemesanan.edit');
    Route::put('/umroh/{id}', 'UmrohController@update_pemesanan')->name('umroh.pemesanan.update');
    Route::get('/umroh/detail/{id}', 'UmrohController@show_pemesanan')->name('umroh.pemesanan.show');
    Route::get('/dl/{slug}','UmrohController@downloadPemesanan')->name('umroh.pemesanan.download');
    Route::delete('/umroh/{id}', 'UmrohController@destroy_pemesanan')->name('umroh.pemesanan.destroy');
  });

  // ARTIKEL //
  Route::group(['prefix' => 'blog'], function() {
    Route::get('/', 'ArtikelController@index')->name('blog.index');
    Route::get('/create', 'ArtikelController@create')->name('blog.create');
    Route::post('/', 'ArtikelController@store')->name('blog.store');
    Route::get('/{id}/edit', 'ArtikelController@edit')->name('blog.edit');
    Route::put('/{id}', 'ArtikelController@update')->name('blog.update');
    Route::get('/detail/{id}', 'ArtikelController@show')->name('blog.show');
    Route::delete('/{id}', 'ArtikelController@destroy')->name('blog.destroy');
  });

  // SLIDE SHOW //
  Route::group(['prefix' => 'slideshow'], function() {
    Route::get('/', 'SlideshowController@index')->name('slide.index');
    Route::get('/create', 'SlideshowController@create')->name('slide.create');
    Route::post('/', 'SlideshowController@store')->name('slide.store');
    Route::get('/{id}/edit', 'SlideshowController@edit')->name('slide.edit');
    Route::put('/{id}', 'SlideshowController@update')->name('slide.update');
    Route::delete('/{id}', 'SlideshowController@destroy')->name('slide.destroy');
  });

  // GALLERY //
  Route::group(['prefix' => 'gallery'], function() {
    Route::get('/', 'GalleryController@index')->name('gallery.index');
    Route::get('/create', 'GalleryController@create')->name('gallery.create');
    Route::post('/', 'GalleryController@store')->name('gallery.store');
    Route::get('/{id}', 'GalleryController@edit')->name('gallery.edit');
    Route::put('/', 'GalleryController@update')->name('gallery.update');
    Route::get('/detail/{id}', 'GalleryController@show')->name('gallery.show');
    Route::delete('/{id}', 'GalleryController@destroy')->name('gallery.destroy');
  });

  // KARIR //
  Route::group(['prefix' => 'karir'], function() {
    Route::get('/', 'KarirController@index')->name('karir.index');
    Route::get('/create', 'KarirController@create')->name('karir.create');
    Route::post('/', 'KarirController@store')->name('karir.store');
    Route::get('/{id}/edit', 'KarirController@edit')->name('karir.edit');
    Route::put('/{id}', 'KarirController@update')->name('karir.update');
    Route::get('/detail/{id}', 'KarirController@show')->name('karir.show');
    Route::delete('/{id}', 'KarirController@destroy')->name('karir.destroy');
  });
});

// ROUTE DASHBOARD COMPANY //
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:direktur,manager,komisaris,staff']], function() {
  Route::get('/','DashboardController@index')->name('dashboard.pt');
  Route::get('/profile', 'DashboardController@profil')->name('dashboard.pt.profile');
});
