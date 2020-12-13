<div class="modal" id="douch-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Consommation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
            <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label >Nombre des personnes:</label>
                        <input type="number" class="form-control"  min="1" name="nbrPerson"  required>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label >Besoin journalier par personne (L):</label>
                        <input type="number" class="form-control" step="0.0001" min="0.0001" name="besoin" required>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label >Besoin journalier total (L):</label>
                        <input type="number" class="form-control" step="0.0001" min="0.0001" name="besoinTotal" required>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label >Température DHW souhaitée (°C):</label>
                        <input type="number" class="form-control" step="0.0001" min="0.0001" name="dhw" required>
                      </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label >Profils de puisage</label>
                      <select class="form-control choix"  onchange="aff_graphe_d(this)">
                        <option hidden>Detached house (evening max)</option>
                        <option value="1" >Detached house (evening max)</option>
                        <option value="2">Hospital</option>
                        <option value="3">Hotel</option>
                        <option value="4">Multi-family dwelling </option>
                        <option value="5">Night use only</option> 
                        <option value="6">Office building</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                        <label for="usr">Heur:</label>
                        <input type="text" class="form-control" name="heur" disabled>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                        <label for="usr">Consommation:</label>
                        <input type="number" class="form-control" step="0.1" min="0.0001" name="consom">
                    </div>
                  </div>
                  <div class="col-4">
                    <button type="button" class="btn btn-primary" style="margin-top: 31px;width: 100%;" onclick="modifier_consom()">Modifier</button>
                  </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-2">
                      <select multiple class="form-control res" style="width: 110px; margin-top: 24px;" >
                        <option name="h_cm1" onclick="select_heur(this)">00:00 - 0</option>
                        <option name="h_cm2" onclick="select_heur(this)">01:00 - 0</option>
                        <option name="h_cm3" onclick="select_heur(this)">02:00 - 0</option>
                        <option name="h_cm4" onclick="select_heur(this)">03:00 - 0</option>
                        <option name="h_cm5" onclick="select_heur(this)">04:00 - 0</option>
                        <option name="h_cm6" onclick="select_heur(this)">05:00 - 0</option>
                        <option name="h_cm7" onclick="select_heur(this)">06:00 - 0</option>
                        <option name="h_cm8" onclick="select_heur(this)">07:00 - 42</option>
                        <option name="h_cm9" onclick="select_heur(this)">08:00 - 42</option>
                        <option name="h_cm10" onclick="select_heur(this)">09:00 - 0</option>
                        <option name="h_cm11" onclick="select_heur(this)">10:00 - 0</option>
                        <option name="h_cm12" onclick="select_heur(this)">11:00 - 0</option>
                        <option name="h_cm13" onclick="select_heur(this)">12:00 - 45</option>
                        <option name="h_cm14" onclick="select_heur(this)">13:00 - 45</option>
                        <option name="h_cm15" onclick="select_heur(this)">14:00 - 0</option>
                        <option name="h_cm16" onclick="select_heur(this)">15:00 - 0</option>
                        <option name="h_cm17" onclick="select_heur(this)">16:00 - 0</option>
                        <option name="h_cm18" onclick="select_heur(this)">17:00 - 0</option>
                        <option name="h_cm19" onclick="select_heur(this)">18:00 - 100</option>
                        <option name="h_cm20" onclick="select_heur(this)">19:00 - 50</option>
                        <option name="h_cm21" onclick="select_heur(this)">20:00 - 25</option>
                        <option name="h_cm22" onclick="select_heur(this)">21:00 - 0</option>
                        <option name="h_cm23" onclick="select_heur(this)">22:00 - 0</option>
                        <option name="h_cm24" onclick="select_heur(this)">23:00 - 0</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_douch()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
$("input[name='besoin'],input[name='nbrPerson']").keyup(function(){
   if($("input[name='besoin'],input[name='nbrPerson']").val()!=""){
     var v=$("input[name='besoin']").val()*$("input[name='nbrPerson']").val();
     $("input[name='besoinTotal']").val(v);
     $("#cylindre-m input[name='vol']").val(v*1.2);
   }else{
    $("input[name='besoinTotal']").val(0);
    $("#cylindre-m input[name='vol']").val(0);
   } 
});
var tab_consom;
var prof1=[0.00,0.00,0.00,0.00,0.00,0.00,0.00,42.00,42.00,0.00,0.00,0.00,45.00,45.00,0.00,0.00,0.00,0.00,100.00,50.00,25.00,0.00,0.00,0.00];//Detached house (evening max)
var prof2=[4.76,3.81,3.81,4.76,7.62,11.43,26.67,71.43,100.00,76.19,71.43,71.43,66.67,71.43,52.38,40.95,35.24,42.86,30.48,66.67,42.86,19.05,19.05,11.43];//Hospital
var prof3=[43.40,16.21,4.74,0.63,1.11,48.00,79.00,100.00,92.00,63.79,53.99,27.67,42.05,28.38,23.56,22.13,33.99,43.16,57.87,44.11,42.69,44.51,67.11,64.82];//Hotel
var prof4=[10.00,10.00,10.00,20.00,20.00,40.00,60.00,100.00,100.00,80.00,50.00,40.00,60.00,80.00,50.00,30.00,30.00,50.00,60.00,60.00,50.00,40.00,20.00,20.00];//Multi-family dwelling 
var prof5=[0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,100.00,100.00];//Night use only
var prof6=[0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,60.00,0.00,66.67,100.00,76.67,33.33,0.00,0.00,0.00,100.00,0.00,0.00,0.00,0.00];//Office building
var dtProfil=[prof1,prof2,prof3,prof4,prof5,prof6];
var labels =  ["0", "1", "2", "3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23"];
function effacer_douch(){
  $("#douch-m input").val('');
}
function select_heur(e){
  var x=$(e).text().split(" - ");
  $("input[name='consom']").val(x[1]);
  $("input[name='heur']").val(x[0]);
}
function modifier_consom(){
  var  i=0;
  $("#douch-m .res option").each(function() {
    var x = $(this).text().split(" - ");
    if(x[0]==$("input[name='heur']").val()){
      $(this).text(x[0]+" - "+ $("input[name='consom']").val());
      tab_consom[i]=$("input[name='consom']").val()
    }
  });
  renderChart(tab_consom, labels);//tab_consom var global
}
function aff_graphe_d(e){
  tab_consom =dtProfil[e.value-1];
  $("#douch-m .res option").remove();
  for(i=0;i<tab_consom.length;i++){
    $("#douch-m .res").append("<option name='h_cm"+(i+1)+"' onclick='select_heur(this)'>"+labels[i]+":00 - "+tab_consom[i]+"</option>");
  }
  renderChart(tab_consom, labels);
}
function renderChart(data, labels) {
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Consomation / Heure',
                backgroundColor: "#be2edd",
                data: data,
            }]
        },
    });
}
$(document).ready(function(){
  tab_consom = [0, 0, 0,0,0,0,0,42,42,0,0,0,45,45,0,0,0,0,100,50,25,0,0,0];
  renderChart(tab_consom, labels);
});

$('#douch-m form').on('submit', function(event){
  event.preventDefault();
  var fd=new FormData(this);
  fd.append("tab_consom",tab_consom);
  $("#douch-m").css("cursor","pointer");
  $.ajax({
      url: '/send_douch/sys3',
      method:"POST",
      data:fd,
      contentType: false,
      processData: false,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(data){
          $("#douch-m").css("cursor","default");
          alert(data);
      }
  }); 
});
</script>