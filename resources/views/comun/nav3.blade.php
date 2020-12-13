 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/"><img src="{{asset('assets\img\logo.png')}}"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span class="nav-link-text">Accueil</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/SOLR_SHEMSY">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span class="nav-link-text">SOL'R SHEMSY SOFTWEAR</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/systemes">
            <i class="fa fa-magnet" aria-hidden="true"></i>
            <span class="nav-link-text">Systèmes</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Simulation</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="/sys-1">Thermosiphon</a>
            </li>
            <li>
              <a href="/sys-2">CES à circulation forcé</a>
            </li>
            <li>
              <a href="/sys-3">CES à circulation forcée & échangeur</a>
            </li>
            <li>
              <a href="/sys-4">CES à circulation forcée & ballon tampon</a>
            </li>
            <li>
              <a href="/sys-5">CES à circulation forcée & chauffage</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link mr-lg-2 " onclick="aff_modal('sun-m')" style="display:flex;">
            <i class="fa fa-sun-o" aria-hidden="true"></i>
            <span class="indicator text-warning d-none d-lg-block" style="margin-top: -10px;">
              <i class="fa fa-fw fa-circle" style="font-size: 10px;"></i>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-lg-2 " onclick="aff_modal('dolar-m')" style="display:flex;">
            <i class="fa fa-usd" aria-hidden="true"></i>
            <span class="indicator text-primary d-none d-lg-block" style="margin-top: -10px;">
              <i class="fa fa-fw fa-circle" style="font-size: 10px;"></i>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-lg-2"  onclick="play()" style="display:flex;">
            <i class="fa fa-play" aria-hidden="true"></i>
            <span class="indicator text-success d-none d-lg-block" style="margin-top: -10px;">
              <i class="fa fa-fw fa-circle" style="font-size: 10px;"></i>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-lg-2" href="/pdf/sys3" target="_blank" style="display:flex;">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
            <span class="indicator text-success d-none d-lg-block" style="margin-top: -10px;">
              <i class="fa fa-fw fa-circle" style="font-size: 10px;"></i>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-lg-2" onclick="aff_modal('graph-m')" style="display:flex;">
            <i class="fa fa-area-chart" aria-hidden="true"></i>
            <span class="indicator text-success d-none d-lg-block" style="margin-top: -10px;">
              <i class="fa fa-fw fa-circle" style="font-size: 10px;"></i>
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-lg-2" onclick="aff_modal('verifier-m')" style="display:flex;">
            <i class="fa fa-eraser" aria-hidden="true"></i>
            <span class="indicator text-warning d-none d-lg-block" style="margin-top: -10px;">
              <i class="fa fa-fw fa-circle" style="font-size: 10px;"></i>
            </span>
          </a>
        </li>
      </ul>
    </div>
</nav>