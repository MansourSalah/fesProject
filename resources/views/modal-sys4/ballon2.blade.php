<div class="modal" id="cylindre2-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Ballon Solaire Primaire</h4>
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
$('#cylindre2-m form').on('submit', function(event){
  event.preventDefault();
  var fd=new FormData(this);
  $("#cylindre2-m").css("cursor","wait");
  $.ajax({
      url: '/send_ballon2/sys4',
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