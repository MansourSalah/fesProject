<div class="modal" id="graph-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Visualisation Graphique</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="/graph/sys4">
            @csrf
            <div class="modal-body">
                <div class="row" style="padding: 10px;">
                    <div class="col-6" style="display: grid;">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph1">Besoins Thermiques (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph2">Efficacité du collecteur (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph3" >Ecoll (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph4">QucollM (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph5">Fraction Solaire (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph11">Tmc 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph13">Tcb'' [Ballon1] 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph15">Pertes thermiques du ballon secondaire  
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph17">Pertes thermiques tuyautrie
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph19">Consommation de la pompe
                        </label>
                    </div>
                    <div class="col-6" style="display: grid;">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph6">Qaux (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph7">Caux (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph8">Crefr (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph9">Rayonnement (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph10">Température (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph12">Tsc 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph14">Tcb'' [Ballon2] 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph16">Pertes thermiques du ballon primaire  
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph18">Economie d’énergie
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph20">Gain cumulé
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <input type="number" class="form-control" step="1" placeholder="Min de l'intervalle" name="Gmin" required>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control" step="1" placeholder="Max de l'intervalle" name="Gmax" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="width:100%" >Afficher</button>
            </div>
        </form>
    </div>
  </div>
</div>