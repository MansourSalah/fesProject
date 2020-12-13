<div class="modal" id="cylindre2-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Ballon Solaire Secondaire</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                        <label >Produit:</label>
                        <select class="form-control" onchange="select_prod(this)">
                          <option value="0" hidden>Sélectionner un produit</option>
                          <option value="1">SHEMSY STAR</option>
                          <option value="2">SHEMSY STAR+</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Volume (Litre):</label>
                            <input type="number" class="form-control" step="0.0001" min="0.0001" name="vol" required>
                        </div>
                        <div class="form-group">
                            <label >Longeur (m):</label>
                            <input type="number" class="form-control" step="0.0001" min="0.0001" name="lon" required>
                        </div>
                        <div class="form-group">
                            <label >Diamètre (m):</label>
                            <input type="number" class="form-control" step="0.0001" min="0.0001" name="dia" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label >Epaisseur isolant (m):</label>
                            <input type="number" class="form-control" step="0.0001" min="0.0001" name="epa" required>
                        </div>
                        <div class="form-group">
                            <label >Conductivité thermique (m):</label>
                            <input type="number" class="form-control" step="0.0001" min="0.0001" name="con" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                        <label >Système d’appoint :</label>
                        <select class="form-control" name="sysAppoint" onchange="select_SysApp(this)">
                          <option value="0" hidden>Sélectionner le type de système</option>
                          <option value="1">Gaz</option>
                          <option value="2">Autre</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="row collapse mycoll">
                  <div class="col-6">
                    <div class="form-group">
                      <label >PCI (KJ/m3):</label>
                      <input type="number" class="form-control" step="0.0001" min="0.0001" name="pci" >
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label >Prix KWh appoint :</label>
                      <input type="number" class="form-control" step="0.0001" min="0.0001" name="prixKWH" >
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="d-inline-flex p-3 text-white">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Jan</div>
                      <input type="hidden" name="tab1" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Feb</div>
                      <input type="hidden" name="tab2" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Mar</div>
                      <input type="hidden" name="tab3" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Apr</div>
                      <input type="hidden" name="tab4" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">May</div>
                      <input type="hidden" name="tab5" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Jun</div>
                      <input type="hidden" name="tab6" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Jul</div>
                      <input type="hidden" name="tab7" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Aug</div>
                      <input type="hidden" name="tab8" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Sep</div>
                      <input type="hidden" name="tab9" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Oct</div>
                      <input type="hidden" name="tab10" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Nov</div>
                      <input type="hidden" name="tab11" value="0">
                      <div class="p-1 bg-secondary" onclick="checky(this)">Dec</div>
                      <input type="hidden" name="tab12" value="0">
                    </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-check-inline">
                      <label class="form-check-label" data-toggle="collapse" data-target="#pp">
                        <input type="checkbox" class="form-check-input" name="flagPB" >Prix du Kwh électricité pour d'autre pays ($)
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row collapse" id="pp" >
                  <div class="col-8">
                    <div class="form-group">
                      <input type="number" class="form-control" step="0.01" min="0.01" name="prixbal" >   
                    </div>
                  </div>
                  <div class="col-4">
                     <a class="btn btn-info" href="https://www.xe.com/fr/currencyconverter/" style="width:100%;" target="_blank"><i class="icofont-bank"></i> Devise</a>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_bal2()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function checky(obj){
  if($(obj).hasClass("bg-info")){
    $(obj).removeClass("bg-info");
    $(obj).addClass("bg-secondary");
    $(obj).next().val(0);
  }
  else{
    $(obj).removeClass("bg-secondary");
    $(obj).addClass("bg-info");
    $(obj).next().val(1);
  }
}
function effacer_bal2(){
  $('#cylindre2-m select').prop('selectedIndex',0);
  $("#cylindre2-m input").val('');
}
function select_prod(e)
{
  $("input[name='lon']").val("1.624");
  $("input[name='dia']").val("0.45");
  $("input[name='con']").val("0.0235");  
  if(e.value==1){
    $("input[name='epa']").val("0.04");
  }else if(e.value==2){
    $("input[name='epa']").val("0.05");
  }
}
function select_SysApp(e){
  if(e.value==2){
    $(".mycoll").collapse("show");
  }else{
    $(".mycoll").collapse("hide");
  }
}
$('#cylindre2-m form').on('submit', function(event){
  event.preventDefault();
  var fd=new FormData(this);
  $("#cylindre2-m").css("cursor","wait");
  $.ajax({
      url: '/send_ballon2/sys5',
      method:"POST",
      data:fd,
      contentType: false,
      processData: false,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(data){
          $("#cylindre2-m").css("cursor","default");
          alert(data);
      }
  }); 
});
</script>