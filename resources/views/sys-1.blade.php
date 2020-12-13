<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav1')

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">SOL’R SHEMSY</a>
      </li>
      <li class="breadcrumb-item">Simulation</li>
      <li class="breadcrumb-item active">Thermosiphon</li>
    </ol>
  
    <div class="mycadre">
      <div class="cadre1">
        <img class="sys" src="{{asset('assets\img\sys-1.png')}}" />
        <div class="cylindre" onclick="aff_modal('cylindre-m')"></div>
        <div class="paneau" onclick="aff_modal('paneau-m')"></div>
        <div class="solei" onclick="aff_modal('clima-m')"></div>
        <div class="douch" onclick="aff_modal('douch-m')"></div>
        <div class="tuyau" onclick="aff_modal('tuyau-m')"></div>
      </div>
    </div>
  </div>
</div>
@include('modal-sys1.graph')    
@include('modal-sys1.dolar')
@include('modal-sys1.ballon')
@include('modal-sys1.paneau')
@include('modal-sys1.clima')
@include('modal-sys1.douch')
@include('modal-sys1.verifier')
@include('modal-sys1.tuyau')

@include('comun.sun')
@include('comun.foot')
@include('comun.lib')
<script>

$(".cadre1 .cylindre,.cadre1 .paneau,.cadre1 .solei,.cadre1 .douch,.cadre1 .tuyau")
  .mouseenter(function() {
   $(this).css("border","2px dashed #009688");
   $(this).css("cursor","pointer");
  })
  .mouseleave(function() {
    $(this).css("border","hidden");
  });

function aff_modal(name){
    $("#"+name).modal('show');
}
function play(){
  $("body").css("cursor","wait");
  $.get("/play/sys1")
  .done(function(data){
    $("body").css("cursor","pointer");
    alert(data);
  });
}
function clear_mem(){
  $.get("/clear/sys1")
  .done(function(data){
    $("#verifier-m").modal("hide");
    window.location.replace("/sys-1");
    //alert(data);
  });
}
/*
function export_pdf(){
  $.get("/pdf/sys1")
  .done(function(data){
    alert(data);
  });
}
*/
</script>
</body>
</html>