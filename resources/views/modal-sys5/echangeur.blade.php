<div class="modal" id="echangeur-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Echangeur</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Puissance (w):</label>
                            <input type="number" class="form-control" step="0.01"  min="0.1" name="puiEchang" required>
                        </div>                    
                        <div class="form-group">
                            <label >Coefficient de transfert thermique (w/k) : </label>
                            <input type="number" class="form-control" step="0.01" min="0.1" name="coefEchang" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_echg()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_echg(){
    $("#echangeur-m input").val('');
}
$('#echangeur-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#echangeur-m").css("cursor","wait");
        $.ajax({
            url: '/send_echangeur/sys5',
            method:"POST",
            data:fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                $("#echangeur-m").css("cursor","default");
                alert(data);
            }
        }); 
});
</script>