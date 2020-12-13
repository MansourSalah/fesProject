<div class="modal" id="paneau-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Capteur Solaire Thermique</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label >Produit:</label>
                            <select class="form-control" name="produit" onchange="select_prod_p(this)">
                                <option value="0" hidden>Sélectionner un produit</option>
                                <option value="1">black chrome FPC</option>
                                <option value="2">FPC with selinium coating</option>
                                <option value="3">standard FPC</option>
                                <option value="4">SOL'R SHEMSY</option>
                                <option value="5">Standard ETC</option>
                                <option value="6">Standard</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >a0 (%):</label>
                            <input type="number" class="form-control" step="0.0001" placeholder="Coefficient de conversion optique" name="a0" required>
                        </div>
                        <div class="form-group">
                            <label >a1 (W/m2.K):</label>
                            <input type="number" class="form-control" step="0.0001" placeholder="Coefficient de déperdition thermiques par conduction" name="a1" required>
                        </div>
                        <div class="form-group">
                            <label >a2 (W/m2.K):</label>
                            <input type="number" class="form-control" step="0.0001" placeholder="Coefficient de déperdition thermiques par convection" name="a2" required>
                        </div>
                        <div class="form-group">
                            <label >Nombre des capteurs:</label>
                            <input type="number" class="form-control" step="1" min="1" placeholder="Saisir le nombre des capteurs" name="nbrc" required>
                        </div>
                        <div class="form-group">
                            <label >Ac:</label>
                            <input type="number" class="form-control" step="0.0001" placeholder="Surface unitaire du capteur" name="ac" required>
                        </div>
                        <div class="form-group">
                            <label >Azimuth:</label>
                            <input type="number" class="form-control" step="0.0001" placeholder="angle" name="azi" required>
                        </div>
                        <div class="form-group">
                            <label >Inclination:</label>
                            <input type="number" class="form-control" step="0.0001" placeholder="tilt angle" name="inc" required>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="effacer_pan()" >Effacer</button>
                <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
    </div>
  </div>
</div>
<script>
function effacer_pan(){
    $("input").val('');
}
function select_prod_p(e){
    if(e.value==1){
        $("input[name='a0']").val("78");
        $("input[name='a1']").val("3.8");
        $("input[name='a2']").val("0.03");  
        $("input[name='ac']").val("1");  
    }else if(e.value==2){
        $("input[name='a0']").val("80");
        $("input[name='a1']").val("3.8");
        $("input[name='a2']").val("0.03"); 
        $("input[name='ac']").val("1");  
    }else if(e.value==3){
        $("input[name='a0']").val("78");
        $("input[name='a1']").val("3.8");
        $("input[name='a2']").val("0.03");  
        $("input[name='ac']").val("1");  
    }else if(e.value==4){
        $("input[name='a0']").val("84");
        $("input[name='a1']").val("0.8");
        $("input[name='a2']").val("0.002");  
        $("input[name='ac']").val("");  
    }else if(e.value==5){
        $("input[name='a0']").val("82");
        $("input[name='a1']").val("1.16");
        $("input[name='a2']").val("0.002");  
        $("input[name='ac']").val("1");   
    }else if(e.value==6){
        $("input[name='a0']").val("85");
        $("input[name='a1']").val('20');
        $("input[name='a2']").val("0.1");  
        $("input[name='ac']").val("1");  
    }
}
$('#paneau-m form').on('submit', function(event){
        event.preventDefault();
        var fd=new FormData(this);
        $("#paneau-m").css("cursor","pointer");
        $.ajax({
            url: '/send_paneau',
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