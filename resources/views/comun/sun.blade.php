<style>
#sun-m .table tr td i{cursor: pointer;}
</style>
<div class="modal" id="sun-m">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Profil des masques solaire</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
              <div class="row">
                <div class="col-5">
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Azimut" step="0.0001" min="-360" max="360" name="azi">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Hauteur" step="0.0001" min="0.0001" name="haut">
                  </div>
                </div>
                <div class="col-2">
                  <button type="button" class="btn " style="background: #e7b296;" onclick="addMasque()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter</button>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-8">
                  <img src="{{asset('assets/img/masques.png')}}" style="width:100%;">
                </div>
                <div class="col-4">
                  <table class="table table-bordered table-responsive" style="margin-left: -20px;width:244px">
                    <thead>
                      <tr>
                        <th >Azimut</th>
                        <th >Hauteur</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function addMasque(){
  az=$("#sun-m input[name='azi']").val();
  ht=$("#sun-m input[name='haut']").val();
  if(az<-360 || az >360 || az==""){
  alert("Azimut incorrect!!");
  }else if( ht<0 || ht==""){
    alert("Hauteur incorrect!!");
  }else{
    $("#sun-m .table tbody").append("<tr><td>"+az+"</td><td>"+ht+"</td><td><i class='fa fa-trash' aria-hidden='true' onclick='delMasque(this)'></i></td></tr>");
  }
}
function delMasque(e){
$(e).parent().parent().remove();
}
</script>
