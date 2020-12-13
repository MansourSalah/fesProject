<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.navG')
<div class="content-wrapper">
  <div class="container-fluid">   
    <h1 style="color: gray;text-align:center;">Visualisation Graphique</h1>
    <img id="charge" src="{{asset('assets/img/charge.gif')}}" style="width: 50px;display: block; margin: auto;margin-top: 40px;">
    <div id="graphes">
      <div class="row">
        <div class="col-6">
          <canvas id="grph1" ></canvas>
        </div>
        <div class="col-6">
          <canvas id="grph2" ></canvas>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <canvas id="grph3" ></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@include('comun.foot')
@include('comun.lib')
<script>
function export_grph(n){
  var cnv = document.getElementById('grph'+n);
  var img = cnv.toDataURL('image/png', 1.0);
  var fd=new FormData();
  fd.append('img_data',img);
  alert("Exportation du graphe se forme d'une image...");
  $.ajax({
      url: '/image',
      method:"POST",
      data:fd,
      contentType: false,
      processData: false,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(data){
          window.open(data, '_blank');
      }
  }); 
}

var colors=['#0984e3','#e84393','#00b894','#a29bfe','#ff7675','#55efc4','#ffeaa7','#009432'];
function renderChart(data, labels,element,titre,color) {
    var ctx = document.getElementById(element).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: titre,
                data: data,
                backgroundColor: color,
            }]
        },
    });
}
function renderChart2(data,labels,element,titre1,titre2){
  var ctx = document.getElementById(element).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
            {
                label: titre2,
                data: data[1],
                fill: false,
                backgroundColor: "#EAB543",
            },{
               
                label: titre1,
                data: data[0],
                backgroundColor: "#c56cf0",
            }
            ]
        }
          
    });
}
function getX(min,max){
  var res = new Array();
  for(var i=min; i<=max; i++)
    res.push(i);
  return res;
}
function getY(tab,min,max){
  var res = new Array();
  for(var i=min; i<=max; i++)
    res.push(tab[i]);
  return res;
}
function getCte(valeur,min,max){
  var res = new Array();
  for(var i=min; i<=max; i++)
    res.push(valeur);
  return res;
}
$(document).ready(function(){
  var tab_g;
  $.get("/get_data/sys4")
  .done(function(data){
      $("#charge").remove();
      var grph=data[0];//les données de grpah
      $("#graphes div").remove();
     /** preparer le Gabri */
     if(grph.length%2==0){
        var n=1;
        for(i=0; i<grph.length/2;i++){
          $("#graphes").append("<div class='row'><div class='col-6'><div ondblclick='export_grph("+n+")'><canvas  id='grph"+n+"'></canvas></div></div><div class='col-6'><div ondblclick='export_grph("+(n+1)+")'><canvas  id='grph"+(n+1)+"'></canvas></div></div></div>");
          n=n+2;
        }
      }else if(grph.length==1){
        $("#graphes").append("<div class='row'><div class='col-12'><div ondblclick='export_grph(1)'><canvas  id='grph1'></canvas></div></div></div>")
      }else if(grph.length%2!=0 && grph.length>1){
        var n=1;
        for(i=0; i<(grph.length-1)/2;i++){
          $("#graphes").append("<div class='row'><div class='col-6'> <div ondblclick='export_grph("+n+")'><canvas  id='grph"+n+"'></canvas></div></div><div class='col-6'><div ondblclick='export_grph("+n+")'><canvas  id='grph"+(n+1)+"'></canvas></div></div></div>");
          n=n+2;
        }
        $("#graphes").append("<div class='row'><div class='col-6'><div ondblclick='export_grph("+n+")'><canvas id='grph"+n+"'></canvas></div></div></div>");
      }
      /** fin préparation */
      for(i=0; i<grph.length;i++){
        if(grph[i][0]==1){//bethe
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Besoin thermique mensuel (kWh)",colors[i%8]);
        }else if(grph[i][0]==2){//effcoll
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Efficacité du collecteur %",colors[i%8]);
        }else if(grph[i][0]==3){//Ecoll
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Energie apporté par le capteur solaire thermique Ecoll",colors[i%8]);
        }else if(grph[i][0]==4){//qucollM
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"QucollM",colors[i%8]);
        }else if(grph[i][0]==5){//Fraction solaire
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Fraction Solaire Mensuelle",colors[i%8]);
        }else if(grph[i][0]==6){//qauxM
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Consommation de la résistance d’appoint mensuelle (Kwh)",colors[i%8]);
        }else if(grph[i][0]==7){//caux
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Consommation électrique du système chauffe-eau solaire [Caux]",colors[i%8]);
        }else if(grph[i][0]==8){//crefr
          var crfr=grph[i][1];
          if(crfr[0]==2){//electrique
            tab_g=getY(crfr[2],0,12);labels=getX(1,12);
            renderChart(tab_g,labels,"grph"+(i+1),"Consommation du système de référence mensuelle [Electrique] "+crfr[1],colors[i%8]);
          }else if(crfr[0]==1){//gaz
            tab_g=getY(crfr[3],0,12);labels=getX(1,12);
            renderChart(tab_g,labels,"grph"+(i+1),"Consommation du chauffe-eau à gaz mensuelle "+crfr[1],colors[i%8]);
          }
        }else if(grph[i][0]==9){//RM
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Rayonnement Solaire Mensuel",colors[i%8]);
        }else if(grph[i][0]==10){//TM
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Température Ambiante  Mensuel",colors[i%8]);
        }else if(grph[i][0]==11){//Tmc
          tab_g=getY(grph[i][1],data[3]-1,data[4]-1);labels=getX(data[3],data[4]);
          renderChart(tab_g,labels,"grph"+(i+1),"Température moyenne du capteur",colors[i%8]);
        }else if(grph[i][0]==12){//Tmc
          tab_g=getY(grph[i][1],data[3]-1,data[4]-1);labels=getX(data[3],data[4]);
          renderChart(tab_g,labels,"grph"+(i+1),"Température de sortie du capteur",colors[i%8]);
        }else if(grph[i][0]==13){//Tcb''
          tab_g=getY(grph[i][1],data[3]-1,data[4]-1);labels=getX(data[3],data[4]);
          renderChart(tab_g,labels,"grph"+(i+1),"Température du ballon primaire ",colors[i%8]);
        }else if(grph[i][0]==14){//Tcb''
          tab_g=getY(grph[i][1],data[3]-1,data[4]-1);labels=getX(data[3],data[4]);
          renderChart(tab_g,labels,"grph"+(i+1),"Température du ballon secondaire",colors[i%8]);
        }else if(grph[i][0]==15){//pethe2
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Perte thermique du ballon secondaire",colors[i%8]);
        }else if(grph[i][0]==16){//pethe1
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Perte thermique du ballon primaire",colors[i%8]);
        }else if(grph[i][0]==17){//petu
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Pertes thermiques du tuyauterie",colors[i%8]);
        }else if(grph[i][0]==18){//ecen
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Economie d'énergie",colors[i%8]);
        }else if(grph[i][0]==19){//consomation pompe
          tab_g=getY(grph[i][1],0,12);labels=getX(1,12);
          renderChart(tab_g,labels,"grph"+(i+1),"Consommation de la pompe",colors[i%8]);
        }else if(grph[i][0]==20){//gain cumulé
          tab_g=getY(grph[i][1][1],0,data[2]);labels=getX(1,data[2]);
          dt=[tab_g,getCte(data[1],1,data[2])];//data[1]=>invisttsement
          renderChart2(dt,labels,"grph"+(i+1),"Gain cumulé","Investissement");
        }
        
      }
  });
  //labels =  ["0", "1", "2", "3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23"];
  
});
</script>
</body>
</html>