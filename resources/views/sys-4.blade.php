<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav4')

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">SOL’R SHEMSY</a>
      </li>
      <li class="breadcrumb-item">Simulation</li>
      <li class="breadcrumb-item active">CES à circulation forcée & ballon tampon</li>
    </ol>

    <div class="mycadre">
        <div class="cadre4">
            <img class="sys" src="{{asset('assets\img\sys-4.png')}}" />
            <div class="cylindre1" onclick="aff_modal('cylindre1-m')"></div>
            <div class="cylindre2" onclick="aff_modal('cylindre2-m')"></div>
            <div class="regulateur" onclick="aff_modal('regulateur-m')"></div>
            <div class="pompe1" onclick="aff_modal('pompe1-m')"></div>
            <div class="pompe2" onclick="aff_modal('pompe2-m')"></div>
            <div class="echangeur" onclick="aff_modal('echangeur-m')"></div>
            <div class="tuyau1" onclick="aff_modal('tuyau1-m')"></div>
            <div class="tuyau2" onclick="aff_modal('tuyau2-m')"></div>
            <div class="douch" onclick="aff_modal('douch-m')"></div>
            <div class="paneau" onclick="aff_modal('paneau-m')"></div>
            <div class="solei" onclick="aff_modal('clima-m')"></div>
        </div>
    </div>  
  
</div></div>
@include('modal-sys4.dolar')
@include('modal-sys4.ballon1')
@include('modal-sys4.ballon2')
@include('modal-sys4.paneau')
@include('modal-sys4.clima')
@include('modal-sys4.douch')
@include('modal-sys4.pompe1')
@include('modal-sys4.pompe2')
@include('modal-sys4.echangeur')
@include('modal-sys4.regulateur')
@include('modal-sys4.tuyau1')
@include('modal-sys4.tuyau2')
@include('modal-sys4.graph')
@include('modal-sys1.verifier')

@include('comun.sun')
@include('comun.foot')
@include('comun.lib')
<script>
$(".cadre4 .cylindre1,.cadre4 .cylindre2,.cadre4 .paneau,.cadre4 .solei,.cadre4 .douch,.cadre4 .tuyau1,.cadre4 .tuyau2,.cadre4 .regulateur,.cadre4 .pompe1,.cadre4 .pompe2,.cadre4 .echangeur")
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
  $.get("/play/sys4")
  .done(function(data){
    $("body").css("cursor","pointer");
    alert(data);
  });
}
function clear_mem(){
  $.get("/clear/sys4")
  .done(function(data){
    $("#verifier-m").modal("hide");
    window.location.replace("/sys-4");
  });
}
</script>
</body>
</html>