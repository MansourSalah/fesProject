<div class="modal" id="regulateur-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Régulateur</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Différentiel d’enclenchement (°C) :</label>
                            <input type="number" class="form-control" step="0.01"  min="0.1" name="diffEnc" required>
                        </div>
                        <div class="form-group">
                            <label >Différentiel d’arrêt (°C) : </label>
                            <input type="number" class="form-control" step="0.01" min="0.1" name="diffArr" required>
                        </div>
                        <div class="form-group">
                            <label >Température limite de sécurité (°C) :</label>
                            <input type="number" class="form-control" step="0.0001" min="0.1" name="temLim" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_pomp()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_pomp(){
    $("#regulateur-m input").val('');
}

$('#regulateur-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#regulateur-m").css("cursor","wait");
        $.ajax({
            url: '/send_regulateur/sys4',
            method:"POST",
            data:fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                $("#regulateur-m").css("cursor","default");
                alert(data);
            }
        }); 
});
</script>