<div class="modal" id="clima-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Météo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form >
            <div class="modal-body">
                <img class="map" src="{{asset('assets\img\map.png')}}">
                <div class="zones">
                    <div class="input-group mb-3 input-group-sm zone_1" onclick="affich_zone('Zone1',1)">
                        <div class="input-group-prepend">
                            <span class="input-group-text color"></span>
                        </div>
                        <span>Zone 1 (Agadir)</span>
                    </div>
                    <div class="input-group mb-3 input-group-sm zone_2" onclick="affich_zone('Zone2',2)">
                        <div class="input-group-prepend">
                            <span class="input-group-text color"></span>
                        </div>
                        <span>Zone 2 (Tanger)</span>
                    </div>
                    <div class="input-group mb-3 input-group-sm zone_3" onclick="affich_zone('Zone3',3)">
                  
                        <div class="input-group-prepend">
                            <span class="input-group-text color"></span>
                        </div>
                        <span >Zone 3 (Fes)</span>
                    </div>
                    <div class="input-group mb-3 input-group-sm zone_4" onclick="affich_zone('Zone4',4)">
                        <div class="input-group-prepend">
                            <span class="input-group-text color"></span>
                        </div>
                        <span>Zone 4 (Ifrane)</span>
                    </div>
                    <div class="input-group mb-3 input-group-sm zone_5" onclick="affich_zone('Zone5',5)">
                        <div class="input-group-prepend">
                            <span class="input-group-text color"></span>
                        </div>
                        <span >Zone 5 (Marrakech)</span>
                    </div>
                    <div class="input-group mb-3 input-group-sm zone_6" onclick="affich_zone('Zone6',6)">
                        <div class="input-group-prepend">
                            <span class="input-group-text color"></span>
                        </div>
                        <span >Zone 6 (Errachidia)</span>
                    </div>
                </div>
                <hr>
                <div class="row">   
                    <div class="col-6">
                        <div class="form-group">
                            <label >Zone:</label>
                            <input type="text" class="form-control" name="zone" >
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label >Ville:</label>
                            <select class="form-control" name="ville" onchange="select_ville(this)" required>
                                <option value="0" hidden>Sélectionner une ville</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check-inline">
                            <label class="form-check-label" data-toggle="collapse" data-target="#perso">
                                <input type="checkbox" class="form-check-input" name="perso">Personnaliser
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row collapse" id="perso">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="ville_p" placeholder="Ville">
                        </div>
                        <div class="custom-file" style="margin-bottom: 5px;">
                            <input type="file" class="custom-file-input" accept="text/plain" name="rh" onchange="get_link(this)">
                            <label class="custom-file-label" for="customFile">Sélectionner le fichier(.txt) de rayonnement horaire</label>
                        </div>
                        <div class="custom-file" style="margin-bottom: 5px;">
                            <input type="file" class="custom-file-input" accept="text/plain" name="th" onchange="get_link(this)">
                            <label class="custom-file-label" for="customFile">Sélectionner le fichier(.txt) de température par heure</label>
                        </div>
                        <div class="custom-file" style="margin-bottom: 5px;">
                            <input type="file" class="custom-file-input" accept="text/plain" name="ef" onchange="get_link(this)">
                            <label class="custom-file-label" for="customFile">Sélectionner le fichier(.txt) d'eau froide</label>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_clima()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
var zone1 =[["Agadir",0],["Laayoune",0],["Boujdour",0],["Guelmim",0],["Tantan",0],
["Inzegane Ait Melloul",0],["Taroudant",0],["Chtouka Ait Baha",0],
["Tiznit",0],["Kenitra",0],["Benslimane",0],["Chichaoua",0],["Casablanca",0],["Mediouna",0],
["Mohammedia",0],["Nouacer",0],["Khemisset",0],["Rabat",0],["Sale",0],["Skherat Temara",0],
["ElJadida",0],["Safi",0],["Essaouira",0]];

var zone2=[["Nador",0],["AlHoceima",0],["Larache",0],["Fahs Anjra",0],["Tanger",0],
["Tetouan",0]];

var zone3=[["Sidi Kacem",0],["Khouribga",0],["Settat",0],["Oujda",0],
["Berkane",0],["Taourirt",0],["Jerada",0],["Beni Mellal",0],["Azilal",0],["Meknes",0],
["Boulemane",0],["Sefrou",0],["Fes",0],["Taounate",0],["Taza",0],["Chefchaouen",0]];

var zone4=[["ElHajeb",0],["Ifrane",0],["Khenifra",0]];

var zone5=[["Kalaa Sraghna",0],["Marrakech",0],["ElHaouz",0]];

var zone6=[["Aousserd",0],["Oued eddahab",0],["AssaZag",0],["Essemara",0],["Ouarzzazate",0],
["Zagora",0],["Figuig",0],["Errachidia",0]];

var tab_ville;
var num_zone;
function affich_zone(zone, num){
    num_zone=num;
    $("input[name='zone']").val(zone);
    if(num==1){tab_ville=zone1;}
    else if (num==2){tab_ville=zone2;}
    else if(num==3){tab_ville=zone3;}
    else if(num==4){tab_ville=zone4;}
    else if(num==5){tab_ville=zone5;}
    else if(num==6){tab_ville=zone6;}
    $("select[name='ville'] option").remove();
    $("select[name='ville']").append("<option value='0' hidden>Sélectionner une ville</option>");
    var i=1
    tab_ville.forEach(function(ville){
        $("select[name='ville']").append("<option >"+ville[0]+"</option>");
        i++;
    });
}
function effacer_clima(){
    $("#clima-m select[name='ville'] option").remove();
    $("#clima-m select[name='ville']").append("<option value='0' hidden>Sélectionner une ville</option>");
    $("#clima-m input").val('');
    tab_ville=null;
    num_zone=0;
}
function select_ville(e){
    var index = $(e).val();
    /*
    if (tab_ville[index-1][1]!=0){
        alert("Cette ville n'est pas encore configurée !");
    } 
    */
}
function get_link(e){
    $(e).next().text($(e).val().replace("C:\\fakepath\\", ''));
}
$('#clima-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#clima-m").css("cursor","wait");
        $.ajax({
            url: '/send_clima/sys3',
            method:"POST",
            data:fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                $("#clima-m").css("cursor","default");
                alert(data);
            }
        }); 
});
</script>
