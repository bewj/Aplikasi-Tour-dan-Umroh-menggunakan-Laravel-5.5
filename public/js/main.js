$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(function () {

  var slideIndex = 0;

  function showSlides() {
      var i;
      var slides = document.getElementsByClassName("slideImages");
      var dots = document.getElementsByClassName("slideBtnIndex");
      for (i = 1; i < slides.length; i++) {
         slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" Selected", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " Selected";
      setTimeout(showSlides, 6000); // Change image every 2 seconds
  }
  showSlides();

  if (typeof console === 'object') {
   console.log(
    "%cHai. Selamat datang di situs Sako Holidays Tour dan Umroh \nHello. Welcome to the site Sako Holidays Tour and Umroh \nHola. Beinvienda al sitio Sako Holidays Tour y Umroh \nجولة و أومروه Sako Holidays مرحبا بكم في الموقع\ninfo karir sakotour.com/karir",
    "font-size: 28px; color: #66D9EF; background-color: #FFF; font-weight: italic"
   );
  }

  var sticky = function () {
    var scroll_top = $(window).scrollTop();
    if (scroll_top > 50) {
      $('#top-menu-green').css({ 'display': 'none' });
      $('#logo').addClass('logo1');
      $('#top-menu-white').addClass('mini-menu');
      $('#top-menu-white').removeClass('custom');
      $('#top-menu-white').removeAttr('style');
      $('#top-menu').addClass('mini-menu');
    } else {
      $('#top-menu-green').css({ 'display': 'block' });
      $('#logo').removeClass('logo1');
      $('#top-menu-white').removeClass('mini-menu');
      $('#top-menu-white').addClass('custom');
      $('#top-menu-white').attr('style','box-shadow: 0 0 3px 0 #999; -moz-box-shadow: 0 0 3px 0 #999; -webkit-box-shadow: 0 0 3px 0 #999;');
      $('#top-menu').removeClass('mini-menu');
    }
  }
  sticky();
  $(window).scroll(function () {
    sticky();
  });

  $('#topup').hide().on('click', function(){
        $('body,html').animate({scrollTop : 0}, 800);
  });

  $(window).on('scroll', function(){
      if($(this).scrollTop() > 50){
          $('#topup').show();
      } else {
          $('#topup').hide();
      }
  });

  var checkbox = $('#true_back');
  var hidden = $('#trigger_hidden');
  hidden.hide();

  checkbox.change(function () {
    if(checkbox.is(':checked')) {
      hidden.show();
    } else {
      hidden.hide();
    }
  });

  $('#agree').click(function () {
    if($(this).is(':checked')) {
      $('#btn-submit').removeAttr('disabled');
    } else {
      $('#btn-submit').attr('disabled', 'disabled');
    }
  });

  $('#go').datepicker({
    format: 'dd-MM-yyyy',
    todayHighlight: true,
    startDate: '1d'
  });
  $('#back').datepicker({
    format: 'dd-MM-yyyy',
    todayHighlight: true,
    startDate: '+1d'
  });

  $('#checkin').datepicker({
    format: 'dd-MM-yyyy',
    todayHighlight: true,
    startDate: '1d'
  });
  $('#checkout').datepicker({
    format: 'dd-MM-yyyy',
    todayHighlight: true,
    startDate: '+1d'
  });

});


$(document).ready(function () {

  $('.slideBtnIndex').first().addClass('Selected');
  $('.slideshowImage').mouseover(function () {
    $('.slideBtnNav').css({ 'display': 'block' });
  });
  $('.slideshowImage').mouseout(function () {
    $('.slideBtnNav').css({ 'display': 'none' });
  });

  $('ul.tabs-home li').click(function(){
    var tab_id = $(this).attr('data-tab');
    $('ul.tabs-home li').removeClass('current');
    $('.tab-content-home').removeClass('current');
    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  });

  $('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');
    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');
    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  });

  var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches, substringRegex;

      // an array that will be populated with substring matches
      matches = [];

      // regex used to determine if a string contains the substring `q`
      substrRegex = new RegExp(q, 'i');

      // iterate through the pool of strings and for any string that
      // contains the substring `q`, add it to the `matches` array
      $.each(strs, function(i, str) {
        if (substrRegex.test(str)) {
          matches.push(str);
        }
      });

      cb(matches);
    };
  };
  var prov = [
    'BANDA ACEH SULTAN ISKANDAR MUDA',
    'MEDAN KUALANAMU',
    'PEKANBARU SULTAN SYARIF KASIM II',
    'BATAM HANG NADIM',
    'PADANG MINANGKABAU',
    'JAMBI SULTAN THAHA',
    'PALEMBANG SULTAN MAHMUD BADARUDIN II',
    'BENGKULU FATMAWATI',
    'PANGKAL PINANG',
    'LAMPUNG RADEN INTAN II',
    'JAKARTA SOEKARNO HATTA',
    'JAKARTA HALIM PERDANA KUSUMA',
    'BANDUNG SASTRANEGARA',
    'SEMARANG AHMAD YANI',
    'SOLO ADI SUMARNO',
    'YOGYAKARTA ADI SUCIPTO',
    'SURABAYA JUANDA',
    'BALI I GUSTI NGURAI',
    'MAKKASAR SULTAN HASANUDDIN II'
  ];
  var kota = [
    'BANDA ACEH', 'MEDAN', 'PEKANBARU', 'PADANG', 'BATAM', 'JAMBI', 'PALEMBANG', 'LAMPUNG', 'SERANG', 'JAKARTA', 'BANDUNG', 'SEMARANG', 'SOLO', 'YOGYAKARTA', 'SURABAYA', 'BALI', 'LOMBOK', 'MAKKASAR'
  ]
  $('#scrollable-dropdown-menu .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1,
    limit: 10,
    name: 'prov',
    source: substringMatcher(prov),
  });
  $('#scrollable-dropdown-menu1 .typeahead').typeahead({
    hint: true,
    highlight: true,
    minLength: 1,
    limit: 10,
    name: 'kota',
    source: substringMatcher(kota),
  });
  $.validator.addMethod("valueNotEquals", function(value, element, arg) {
    return arg !== value;
  },"Value must not equal arg.");

  $('#form-request-tour').validate({
    rules: {
      location: { minLength: 2, required: true },
      fullname: { minLength: 2, required: true },
      number_hp: { minLength: 8, required: true, digits: true, range: ['8','15'] },
      email: { required: true, email: true },
      agree: "required"
    },
    messages: {
      location: {
        required: 'Masukkan Nama Tempat',
        minLength: 'Harap Masukkan Kata Lebih dari 2'
      },
      fullname: {
        required: 'Masukkan Nama Lengkap Anda',
        minLength: 'Harap Masukkan Nama Yang Benar'
      },
      number_hp: {
        required: 'Masukkan Nomor Telephone',
        minLength: 'Harap Masukkan Nomor Yang Valid',
        digits: 'Harap Masukkan Nomor bukan String',
        range: 'Min 8 dan Max 15 Untuk Nomor Telepon'
      },
      email: {
        required: 'Masukkan Email Anda',
        email: 'Format Email Tidak Valid'
      },
      agree: { required: 'Harap Cetak Persetujuan Ini !'}
    }
  });

  $('#form-tour').validate({
    rules: {
      country: { valueNotEquals: "0" },
      month: { valueNotEquals: "0" },
      year: { valueNotEquals: "0" }
    },
    messages: {
      country: { valueNotEquals: "* Silahkan Pilih Negara !" },
      month: { valueNotEquals: "* Silahkan Pilih Bulan !"},
      year: { valueNotEquals: "* Silahkan Pilih Tahun !"}
    }
  });
  $('#form-umroh').validate({
    rules: {
      package: { valueNotEquals: "0" },
      month: { valueNotEquals: "0" },
      year: { valueNotEquals: "0" }
    },
    messages: {
      package: { valueNotEquals: "* Silahkan Pilih Paket !" },
      month: { valueNotEquals: "* Silahkan Pilih Bulan !"},
      year: { valueNotEquals: "* Silahkan Pilih Tahun !"}
    }
  });
});
