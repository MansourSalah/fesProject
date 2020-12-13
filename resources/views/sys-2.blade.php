<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav2')

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">SOL’R SHEMSY</a>
      </li>
      <li class="breadcrumb-item">Simulation</li>
      <li class="breadcrumb-item active">CES à circulation forcé</li>
    </ol>

    <div class="mycadre">
        <div class="cadre2">
            <img class="sys" src="{{asset('assets\img\sys-2.png')}}" />
            <div class="cylindre" onclick="aff_modal('cylindre-m')"></div>
            <div class="regulateur" onclick="aff_modal('regulateur-m')"></div>
            <div class="pompe" onclick="aff_modal('pompe-m')"></div>
            <div class="tuyau1" onclick="aff_modal('tuyau1-m')"></div>
            <div class="tuyau2" onclick="aff_modal('tuyau2-m')"></div>
            <div class="douch" onclick="aff_modal('douch-m')"></div>
            <div class="paneau" onclick="aff_modal('paneau-m')"></div>
            <div class="solei" onclick="aff_modal('clima-m')"></div>
        </div>
    </div> 
    
    </div>
</div>
@include('modal-sys2.dolar')
@include('modal-sys2.ballon')
@include('modal-sys2.paneau')
@include('modal-sys2.clima')
@include('modal-sys2.douch')
@include('modal-sys2.pompe')
@include('modal-sys2.regulateur')
@include('modal-sys2.tuyau1')
@include('modal-sys2.tuyau2')
@include('modal-sys2.graph')
@include('modal-sys1.verifier')

@include('comun.sun')
@include('comun.foot')
@include('comun.lib')
<script>
$(".cadre2 .cylindre,.cadre2 .paneau,.cadre2 .solei,.cadre2 .douch,.cadre2 .tuyau1,.cadre2 .tuyau2,.cadre2 .regulateur,.cadre2 .pompe")
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
  $.get("/play/sys2")
  .done(function(data){
    $("body").css("cursor","pointer");
    alert(data);
  });
}
function clear_mem(){
  $.get("/clear/sys2")
  .done(function(data){
    $("#verifier-m").modal("hide");
    window.location.replace("/sys-2");
  });
}
</script>
</body>
</html>