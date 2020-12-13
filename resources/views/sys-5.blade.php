<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav5')

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
        <div class="cadre5">
            <img class="sys" src="{{asset('assets\img\sys-5.png')}}" />
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
            
            <div class="pompe3" onclick="aff_modal('pompe3-m')"></div>
            <div class="chaufage" onclick="aff_modal('chaufage-m')"></div>
            <div class="tuyau3" onclick="aff_modal('tuyau3-m')"></div>
        </div>
    </div>  
  
</div></div>
@include('modal-sys5.dolar')
@include('modal-sys5.ballon1')
@include('modal-sys5.ballon2')
@include('modal-sys5.paneau')
@include('modal-sys5.clima')
@include('modal-sys5.douch')
@include('modal-sys5.pompe1')
@include('modal-sys5.pompe2')
@include('modal-sys5.pompe3')
@include('modal-sys5.echangeur')
@include('modal-sys5.regulateur')
@include('modal-sys5.tuyau1')
@include('modal-sys5.tuyau2')
@include('modal-sys5.tuyau3')
@include('modal-sys5.chaufage')
@include('modal-sys5.graph')
@include('modal-sys1.verifier')

@include('comun.sun')
@include('comun.foot')
@include('comun.lib')
<script>
$(".cadre5 .cylindre1,.cadre5 .cylindre2,.cadre5 .paneau,.cadre5 .solei,.cadre5 .douch,.cadre5 .tuyau1,.cadre5 .tuyau2,.cadre5 .regulateur,.cadre5 .pompe1,.cadre5 .pompe2,.cadre5 .echangeur,.cadre5 .chaufage,.cadre5 .pompe3,.cadre5 .tuyau3")
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
  $.get("/play/sys5")
  .done(function(data){
    $("body").css("cursor","pointer");
    alert(data);
  });
}
function clear_mem(){
  $.get("/clear/sys5")
  .done(function(data){
    $("#verifier-m").modal("hide");
    window.location.replace("/sys-5");
  });
}

</script>
</body>
</html>