<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav0')

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">SOL’R SHEMSY</a>
      </li>
      <li class="breadcrumb-item active">Accueil</li>
    </ol>
     <!-- Icon Cards
     <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-commenting-o"></i>
              </div>
              <div class="mr-5">26 Conférences</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/conference">
              <span class="float-left">Voir les détails</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-file-text"></i>
              </div>
              <div class="mr-5">11 Articles</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Voir les détails</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cubes"></i>
              </div>
              <div class="mr-5">3 Projet réalisés</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Voir les détails</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">10 Sujet associés</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>-->
    <!-- Card Columns Example Social Feed-->
    <div class="mb-0 mt-4">
        <!--
        <i class="fa fa-newspaper-o"></i> Informations Générales</div>
        <hr class="mt-2">
        -->
        <div class="card-columns">
        <!-- Example Social Card-->
        <div class="card mb-3">
            <a href="http://www.iresen.org/">
            <img class="card-img-top img-fluid w-100" style="padding: 0px 5px;" src="{{asset('assets/img/galerie/IRESEN-1.jpg')}}" alt="">
            </a>
            <div class="card-body">
            <h6 class="card-title mb-1"><a href="http://www.iresen.org/">IRISEN</a></h6>
            <p class="card-text small">INSTITUT DE RECHERCHE EN ENERGIE SOLAIRE ET ENERGIES NOUVELLES
                <a href="http://www.iresen.org/" >#iresen.org/</a>
            </p>
            </div>
            <hr class="my-0">
            <div class="card-footer small text-muted">Il est publié en 11-2020</div>
        </div>
        <div class="card mb-3">
            <a href="/SOLR_SHEMSY">
            <img class="card-img-top img-fluid w-100" src="{{asset('assets/img/solr.png')}}" alt="">
            </a>
            <div class="card-body">
            <h6 class="card-title mb-1"><a href="/SOLR_SHEMSY">SOL'R SHEMSY SOFTWEAR</a></h6>
            <p class="card-text small" style="margin:0px">LOGICIEL DE SIMULATION ‘‘MADE IN MOROCCO’’
            </p>
            <a href="/SOLR_SHEMSY" style="font-size:14px;">#sol'r_shemsy/</a>
            </div>
            <hr class="my-0">
            <div class="card-footer small text-muted">Il est publié en 11-2020</div>
        </div>
        <div class="card mb-3">
            <a href="http://www.usmba.ac.ma/">
            <img class="card-img-top img-fluid w-100" src="{{asset('assets/img/galerie/univ.png')}}" alt="">
            </a>
            <div class="card-body">
            <h6 class="card-title mb-1"><a href="http://www.usmba.ac.ma/">USMBA</a></h6>
            <p class="card-text small" style="margin:0px">UNIVERSITE SIDI MOHAMED BEN ABDELLAH
            </p>
            <a href="http://www.usmba.ac.ma/" style="font-size:14px;">#usmba.ac.ma/</a>
            </div>
            <hr class="my-0">
            <div class="card-footer small text-muted">Il est publié en 11-2020</div>
        </div>
        <div class="card mb-3">
            <a href="/systemes">
            <img class="card-img-top img-fluid w-100" src="{{asset('assets/img/sys-1.png')}}" alt="">
            </a>
            <div class="card-body">
            <h6 class="card-title mb-1"><a href="/systemes">SYSTEMES</a></h6>
            <p class="card-text small" style="margin:0px">SIMULATION INFORMATIQUE DE CINQ SYSTEMES
            </p>
            <a href="/systemes" style="font-size:14px;">#systèmes/</a>
            </div>
            <hr class="my-0">
            <div class="card-footer small text-muted">Il est publié en 11-2020</div>
        </div>
    </div>
   
  </div>
</div>
@include('comun.sun')
@include('comun.foot')
@include('comun.lib')
<!--<script src="js/sb-admin-charts.min.js"></script>-->
<script>
function aff_modal(name){
    $("#"+name).modal('show');
}
</script>
</body>
</html>