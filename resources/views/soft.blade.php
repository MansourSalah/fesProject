<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav0')

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/">SOL’R SHEMSY</a>
      </li>
      <li class="breadcrumb-item active">Softwear</li>
    </ol>-->
    <!-- Card Columns Example Social Feed-->
    
      <div class="row">
        <div class="col-6">
          <img src="{{asset('assets/img/galerie/IRESEN-1.jpg')}}" style="width: 224px;height: 120px;margin-top:-5px">
        </div>
        <div class="col-6">
          <img src="{{asset('assets/img/galerie/univ-0.png')}}" style="width:85px;display: block;margin-left: auto;">
        </div>
      </div>
      <div class="row">
        <div class="col-12">
        <h1 style="text-align: center;color: crimson;font-family: fantasy;font-size:50px">SYSTEMES</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> Thermosyphon</h3>
        </div>
      </div> 
      <div class="row">
        <div class="col-8">
          <p class="text-justify">Le système thermosiphon est un chauffe-eau solaire à usage domestique individuel, sans intervention de pompe de circulation.il est le plus simple ; basé sur le principe selon lequel l'eau chaude, du fait de sa moindre densité a tendance à monter naturellement, il impose que le réservoir de stockage soit placé plus haut que les capteurs.</p>
          <p class="text-justify">Un thermosiphon est le phénomène de circulation naturelle d'un liquide dans une installation du fait de la variation de sa masse volumique en fonction de la température.</p>
          <p class="text-justify">Dans un circuit de chauffage en thermosiphon, le liquide caloporteur réchauffé dans le générateur thermique, plus léger, monte vers un échangeur situé en partie haute de l'installation pour céder ses calories à l'air ambiant. Le fluide caloporteur refroidi redescend naturellement vers le bas de l'installation pour être réchauffé par le générateur et recommencer le cycle en continu.</p>
          <p class="text-justify">Ce mode de fonctionnement permet de se passer d'un circulateur.</p>
        </div>
        <div class="col-4">
          <img src="{{asset('assets/img/sys-1.png')}}" style="width:100%;height:100%;">
        </div>
      </div>   
      <br>
      <div class="row">
        <div class="col-12">
          <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> CES à circulation forcée</h3>
        </div>
      </div> 
      <div class="row">
        <div class="col-5">
          <img src="{{asset('assets/img/sys-2.png')}}" style="width:100%;height:100%;">
        </div>
        <div class="col-7">
          <p class="text-justify">Le système à circulation forcée est plus complexe, mais offre la plus grande souplesse d'installation et facilite une intégration harmonieuse au bâtiment.</p>
          <p class="text-justify">L ’ensemble des composants sont séparés (ballon solaire et capteurs solaire thermique) ce qui impose la présence de la pompe de circulation solaire. </p>
          <p class="text-justify">Le ballon solaire dispose d’un échangeur interne en serpentin qui favorise le transfert de chaleur du circuit solaire (primaire) à l’eau d’utilisation. </p>
          <p class="text-justify">Le système intègre aussi un système d’appoint qui permettra de combler les insuffisances en cas des journées grises ou des problèmes techniques dans le circuit primaire, le système auxiliaire peut être électrique gaz ou autre à définir par l’utilisateur.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <p class="text-justify">Cette configuration offre plus de possibilités quant à l'emplacement du ballon, celui-ci ne devant plus être nécessairement placé au-dessus des capteurs, ce qui permet de s'adapter plus facilement aux contraintes du bâtiment. Le ballon est alors le plus souvent posé à l'emplacement ou en complément du chauffe-eau électrique ou à côté de la chaudière existante pour faciliter l'appoint.</p>
        </div>
      </div>  
      <br>
      <div class="row">
        <div class="col-12">
          <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> CES à circulation forcée avec échangeur</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <img src="{{asset('assets/img/sys-3.png')}}" style="width:400px;height:200px;margin: auto;display: block;">
        </div>
      </div> 
      <div class="row">
        <div class="col-12">
          <p class="text-justify">Ce système est le même que le précèdent avec la différence au niveau du type de ballon solaire utilisé, il ne dispose pas d’échangeur interne. Dans cette configuration le transfert de chaleur se fait moyennent un échangeur externe dont l’ensemble de ses caractéristiques sont à définir par l’utilisateur.</p>
        </div>
      </div> 
      <br>
      <div class="row">
        <div class="col-12">
          <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> CES à circulation forcée avec ballon tampon</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <img src="{{asset('assets/img/sys-4.png')}}" style="width:400px;height:200px;margin: auto;display: block;">
        </div>
      </div> 
      <div class="row">
        <div class="col-12">
          <p class="text-justify">Ce système dispose d’un ballon tampon ; c’est un dispositif qui permet de stocker l’excédent de chaleur produit par une chaudière. Il restitue ensuite ces calories pour chauffer le logement quand la chaudière n’est pas opérationnelle. Il est aussi possible d’utiliser cette chaleur pour la <strong>production d’eau chaude sanitaire(ECS)</strong>. Cet équipement permet de faire des économies d’énergie, d’améliorer le rendement de votre système de chauffage et de vous chauffer pendant l’intersaison sans avoir à allumer le chauffage central. Pour couronner le tout, il ne nécessite pas d’entretien particulier.</p>
        </div>
      </div> 
      <br>
      <div class="row">
        <div class="col-12">
          <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> CES à circulation forcée pour eau chaude sanitaire et chauffage</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <img src="{{asset('assets/img/sys-5.png')}}" style="width:400px;height:200px;margin: auto;display: block;">
        </div>
      </div> 
      <div class="row">
        <div class="col-12">
          <p class="text-justify">Cette configuration se base sur le système à circulation forcée avec ballon tampon. Elle intègre le besoin en chauffage afin de présenté un système combinée et complet capable de satisfaire a la fois le besoin en eau chaude sanitaire et le besoin en chauffage des locaux.</p>
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