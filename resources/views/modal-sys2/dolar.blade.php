<div class="modal" id="dolar-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Financement du projet</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                          <label >Investissement:</label>
                          <input type="number" class="form-control" step="0.0001" name="inve" required>
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                        <label >Unité:</label>
                        <select class="form-control" name="unite" required>
                          <option value="dhm">Dirham marocain (DH)</option>
                          <option value="dllr">Dollar américain ($)</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                      <div class="form-group">
                          <label >Durée de vie (Ans):</label>
                          <input type="number" class="form-control" step="0.1" min="0" name="duree" required>
                      </div>
                      <div class="form-group">
                        <label >Type de système de référence:</label>
                        <select class="form-control" onchange="select_prod(this)" name="sys_r" required>
                          <option value="0" hidden>Sélectionner le système de référence</option>
                          <option value="1">Gaz</option>
                          <option value="2">Electrique</option>
                        </select>
                      </div>
                      <div class="form-group">
                            <label >Valeur d'efficacité (%):</label>
                            <input type="number" class="form-control" step="0.0001" min="0" name="effi" required>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-check-inline">
                      <label class="form-check-label" data-toggle="collapse" data-target="#dd">
                        <input type="checkbox" class="form-check-input" name="autre_v">Considérez une autre valeur
                      </label>
                    </div>
                    <div class="form-group collapse" id="dd" >
                      <input type="number" class="form-control" step="0.0001" placeholder="Prix de kilowattheure" name="kwat" >
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_bal()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_dolar(){
  $('#dolar-m select').prop('selectedIndex',0);
  $("#dolar-m  input").val('');
}
$('#dolar-m form').on('submit', function(event){
  event.preventDefault();
  var fd=new FormData(this);
  fd.append("tab_consom",tab_consom);
  $("#dolar-m").css("cursor","pointer");
  $.ajax({
      url: '/send_dolar/sys2',
      method:"POST",
      data:fd,
      contentType: false,
      processData: false,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      success: function(data){
          $("#dolar-m").css("cursor","default");
          alert(data);
      }
  }); 
});
</script>