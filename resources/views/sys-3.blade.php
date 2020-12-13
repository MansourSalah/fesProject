<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav3')
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">SOL’R SHEMSY</a>
      </li>
      <li class="breadcrumb-item">Simulation</li>
      <li class="breadcrumb-item active">CES à circulation forcée & échangeur</li>
    </ol>

    <div class="mycadre">
        <div class="cadre3">
            <img class="sys" src="{{asset('assets\img\sys-3.png')}}" />
            <div class="cylindre" onclick="aff_modal('cylindre-m')"></div>
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

</div>
</div>
@include('modal-sys3.dolar')
@include('modal-sys3.ballon')
@include('modal-sys3.paneau')
@include('modal-sys3.clima')
@include('modal-sys3.douch')
@include('modal-sys3.pompe1')
@include('modal-sys3.pompe2')
@include('modal-sys3.echangeur')
@include('modal-sys3.regulateur')
@include('modal-sys3.tuyau1')
@include('modal-sys3.tuyau2')
@include('modal-sys3.graph')
@include('modal-sys1.verifier')

@include('comun.sun')
@include('comun.foot')
@include('comun.lib')
<script>

$(".cadre3 .cylindre,.cadre3 .paneau,.cadre3 .solei,.cadre3 .douch,.cadre3 .tuyau1,.cadre3 .tuyau2,.cadre3 .regulateur,.cadre3 .pompe1,.cadre3 .pompe2,.cadre3 .echangeur")
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
  $.get("/play/sys3")
  .done(function(data){
    $("body").css("cursor","pointer");
    alert(data);
  });
}
function clear_mem(){
  $.get("/clear/sys3")
  .done(function(data){
    $("#verifier-m").modal("hide");
    window.location.replace("/sys-3");
  });
}
</script>
</body>
</html>