<div class="modal" id="chaufage-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Circuit de distribution</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Volume des pièces à chauffer (m3):</label>
                            <input type="number" class="form-control" step="0.01"  min="0.01" name="volChauf">
                        </div>
                        <div class="form-group">
                            <label >Température de chauffage (°C) : </label>
                            <input type="number" class="form-control" step="0.01" min="0.01" name="temChauf" required>
                        </div>
                        <div class="form-group">
                            <label >Coefficient de déperdition globale(W/m3°C):</label>
                            <div class="input-group">
                                <input type="number" class="form-control" step="0.01" min="0.01" aria-label="Text input with dropdown button" name="coefChauf" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Norme</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="affich_val_chauf(0.65)">0,65 W/°C m3 isolation norme RT 2005</a>
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="affich_val_chauf(0.75)">0,75 W/°C m3 isolation norme RT 2000</a>
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="affich_val_chauf(0.9)">0,9 W/°C m3 constructions après 1980</a>
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="affich_val_chauf(1.2)">1,2 W/°C m3 constructions moyennement isolées</a>
                                        <a class="dropdown-item" style="cursor:pointer;" onclick="affich_val_chauf(1.8)">1,8 W/°C m3 constructions non isolées<a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_tuy2()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_tuy2(){
    $("#chaufage-m input").val('');
}
function affich_val_chauf(n){
    $("#chaufage-m input[name='coefChauf']").val(n);
}
$('#chaufage-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#chaufage-m").css("cursor","wait");
        $.ajax({
            url: '/send_chaufage/sys5',
            method:"POST",
            data:fd,
            contentType: false,
            processData: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                $("#chaufage-m").css("cursor","default");
                alert(data);
            }
        }); 
});
</script>