<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">


<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb" >
      <button type="button" class="btn" style="width:100%" onclick="imprimer()">Exporter</button>
    </ol>

    <img src="{{asset('assets/img/logo.png')}}" id="myimg">
   

    <img class="sys-1" src="{{public_path('assets\img')}}\sys-1.png"  />
<img class="sys-1" src="{{asset('assets/img/sys-1.png')}}" />
<img class="sys-1" src="\assets\img\sys-1.png" />
{{public_path('assets\img')}}\sys-1.png
{{asset('assets/img/sys-1.png')}}
{{realpath(base_path())}}
<img class="sys-1" src="{{public_path('assets\img')}}\galerie\iresen.jpg" />
<img class="sys-1" src="{{asset('assets/img/galerie/iresen.jpg')}}" />
<img class="sys-1" src="/public/assets/img/galerie/iresen.jpg" />
  
</div></div>

<script>
/*
function getBase64Image(img){
  var canvas = document.createElement("canvas");
  canvas.width = img.width;
  canvas.height = img.height;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0);
  var dataURL = canvas.toDataURL("image/png");
  return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
var base64 = getBase64Image();
*/
function imprimer(){
  console.log($("#myimg"));
}
</script>
</body>
</html>