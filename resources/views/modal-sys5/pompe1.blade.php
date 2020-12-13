<div class="modal" id="pompe1-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Pompe Primaire</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Débit nominal (l/h) : </label>
                            <input type="number" class="form-control" step="0.0001"  min="0.0001" name="debitNom" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label >Puissance maximum (kW)</label>
                            <input type="number" class="form-control" step="0.0001" min="0.0001" name="puiMax" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_pomp1()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_pomp1(){
    $("#pompe1-m input").val('');
}

$('#pompe1-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#pompe1-m").css("cursor","wait");
        $.ajax({
            url: '/send_pompe1/sys5',
            method:"POST",
            data:fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                $("#pompe1-m").css("cursor","default");
                alert(data);
            }
        }); 
});
</script>