<div class="modal" id="tuyau1-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Circuit Solaire </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label >Diamètre:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" class="form-control" step="0.0001"  min="0.0001" placeholder="Intérieur (m)" name="diaInt" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" class="form-control" step="0.0001" min="0.0001" placeholder="Extérieur (m)" name="diaExt" required>
                        </div>  
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-12">
                        <label >Longueur:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" class="form-control" step="0.0001"  min="0.0001" placeholder="Aller (m)" name="longAll" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" class="form-control" step="0.0001" min="0.0001" placeholder="Retour (m)" name="longRet" required>
                        </div>  
                    </div>                  
                </div>
                <div class="row">
                    <div class="col-12">
                        <label >Isolation:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" class="form-control" step="0.0001"  min="0.0001" placeholder="Epaisseur (m)" name="isolEpa" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <input type="number" class="form-control" step="0.0001" min="0.0001" placeholder="Conductivité thermique" name="isolCon" required>
                        </div>  
                    </div>                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_tuy1()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_tuy1(){
    $("#tuyau1-m input").val('');
}
$('#tuyau1-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#tuyau1-m").css("cursor","wait");
        $.ajax({
            url: '/send_tuyau1/sys4',
            method:"POST",
            data:fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                $("#tuyau1-m").css("cursor","default");
                alert(data);
            }
        }); 
});
</script>