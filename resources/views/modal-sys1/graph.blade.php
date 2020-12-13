<div class="modal" id="graph-m">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Visualisation Graphique</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="/graph/sys1">
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
                            <input type="checkbox" class="form-check-input" name="grph6">Qaux (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph11">Rayonnement (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph13">TMC 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph15">Tcb'' 
                        </label>
                    </div>
                    <div class="col-6" style="display: grid;">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph7">Perte Thermique (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph8">Economie d'Energie (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph9">Crefr (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph10">Caux (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph16">TRI & Gain Annuel Cumulé
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph12">Température (/Mois) 
                        </label>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="grph14">TSC 
                        </label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <input type="number" class="form-control" step="1" max="8759" min="1" placeholder="Min de l'intervalle" name="Gmin" required>
                    </div>
                    <div class="col-6">
                        <input type="number" class="form-control" step="1" max="87560" min="2" placeholder="Max de l'intervalle" name="Gmax" required>
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

