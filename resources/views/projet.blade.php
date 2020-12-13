<!DOCTYPE html>
<html lang="en">
<head>
@include('comun.head')
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
@include('comun.nav0')

<div class="content-wrapper">
  <div class="container-fluid">
     
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
      <h1 style="text-align: center;color: crimson;font-family: fantasy;font-size:50px">SOL'R SHEMSY SOFTWEAR</h1>
    </div>
  </div>
   
  <div class="row">
    <div class="col-12">
      <p class="text-justify">Le logiciel Marocain SOL’R SHEMSY est un projet de collaboration entre l'IRESEN (institut de recherche en Energie solaire et énergie nouvelle) et l'USMBA (université sidi Mohamed ben Abdellah) de Fès.</p>
      <p class="text-justify">Le projet vient dans la perspective de renforcer la maitrise des technologies solaires thermiques au Maroc, présentant un outil marocain de prédiction du comportement fonctionnel des installations solaire thermiques. </p>
      <p class="text-justify">Le logiciel vient comme fruits des efforts d’une équipe de chercheurs et docteurs de l’université sidi Mohamed ben Abdellah dans le domaine des énergies.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <img src="{{asset('assets/img/map2.png')}}" style="width:100%;display: block;margin-left: auto;">
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <p class="text-justify">Le programme de simulation dynamique a été développé pour les étudiants, les ingénieurs, les aménageurs et les installateurs travaillant dans le domaine des techniques de chauffage et du bâtiment, énergies renouvelables et plus précisément les installations de production d’eau chaude sanitaire.</p>
      <p class="text-justify">SOL’R SHEMSY est un programme de simulation destiné à l’aménagement et à la conception professionnelle d’installations solaires thermiques.</p>
      <p class="text-justify">Cet outil présente une variété des configurations des systèmes de production d’eau chaude selon divers technologies a savoir : </p>
      <ul>
        <li>Thermosyphon</li>
        <li>ECS à circulation forcée</li>
        <li>ECS à circulation forcée avec echangeur </li>
        <li>ECS avec balon tampon </li>
        <li>ECs système combinée ( eau chaude sanitaire et chauffage).</li>
      </ul>
      <p class="text-justify">Softwear SOL’R SHESMSY permet la simulation dynamique appliquée aux systèmes de production d’eau chaude pour usage sanitaire ainsi que pour le chauffage. Le logiciel permet d’intégrer toutes les caractéristiques des systèmes de production d’eau chaude pour l’étude détaillée du comportement fonctionnel du système choisie, en fonction de son emplacement (localisation).</p>
      <p class="text-justify">La simulation dynamique présentée se fait sur une année présentative, ça permet de suivre sur cette période le comportement fonctionnel des systèmes faisant le bilan énergétique de l’installation ; production solaire, consommation du systèmes d’appoint, fraction solaire, efficacité des capteurs solaires thermique, et les pertes thermiques.</p>
      <p class="text-justify">Le suivie du fonctionnement se fait aussi sur l’ensemble des paramètres indicatifs de l’installation à savoir les températures ; températures moyenne et sortie du capteur, température du ballon…ETC.</p>
      <p class="text-justify">Les résultats de rentabilité de système sont représentés clairement sur l’ensemble des paramètres économiques prisent en compte à savoir ; les gains économiques, le temps de retours sur investissement.</p>
      <p class="text-justify">Les émissions CO2 à éviter sont aussi évaluées dans la partie environnementale de la simulation, présentant un outil de simulation complet.</p>
      <h5><i class="fa fa-hand-o-right" aria-hidden="true"></i> La simulation</h5>
      <p class="text-justify">La simulation de l'installation s’effectue par étapes temporelles de durée variable, de l'ordre de quelques minutes. La simulation du comportement dynamique de l'installation se fait à cadence accélérée, le calcul s’effectue en quelques secondes. Les résultats tels que les températures, les énergies, le degré d'utilisation et le taux de couverture solaire sont enregistrés dans un fichier et sont disponibles à tout moment pour être exploités.</p>
      <h5><i class="fa fa-hand-o-right" aria-hidden="true"></i> Le calcul de rentabilité</h5>
      <p class="text-justify">Une impression séparée présente le prix de la chaleur produite par l'installation solaire ainsi que la durée d'amortissement dynamique présentant le temps de retour sur investissement qui décide la rentabilité de l’installation étudiée.</p>
      <h5><i class="fa fa-hand-o-right" aria-hidden="true"></i> Les données météorologiques</h5>
      <p class="text-justify">L'insolation constitue le facteur primordial dans la détermination du rendement énergétique d'une installation solaire. La livraison comprend les fichiers contenant les données d'insolation et de température de l'air, disponibles sous forme de valeurs discrètes à intervalles horaires et valables pour une période d'un an, couvrant les six zones climatiques marocaines. Il est en outre possible d'importer les fichiers *. TXT. </p>
      <p class="text-justify">La base des sonnées météorologique disponible dans le logiciel peut être utilisé pour générer des données météorologiques globales des sites disponibles. Cette base de donnée a été élaborée sur la base des output produite par le générateur météo suisse METEONORM permet de produire des données météorologique du monde entier.</p>
      <h5><i class="fa fa-hand-o-right" aria-hidden="true"></i> Les caractéristiques des capteurs</h5>
      <p class="text-justify">Il suffit d'entrer le facteur de conversion, la capacité thermique spécifique, le coefficient de transfert thermique et le facteur de correction angulaire pour modéliser un capteur, quel qu’il soit. La base des données implique diverses technologies des capteurs solaires thermiques ; plan vitré, tubes sous vides…ETC. </p>
      <h5><i class="fa fa-hand-o-right" aria-hidden="true"></i> Modules supplémentaires</h5>
      <p class="text-justify">Le module chauffage permet d'intégrer une utilisation supplémentaire des installations de production d’eau chaude et de circuit solaire.</p>
      <p class="text-justify">Le module pour grandes installation permet l’intégration de réservoirs tampons solaires de forte capacité, de caloporteurs externes et des circuits solaires et de distribution.</p>
      <h5><i class="fa fa-hand-o-right" aria-hidden="true"></i> Les résultats</h5>
      <p class="text-justify">Les résultats de calcul des installations effectués à l'aide de SOL’R SHEMSY SOTRWEAR peuvent être présentés de diverses manières sur l'écran et imprimé. Le document imprimé récapitule non seulement le bilan énergétique, le degré d'utilisation, le taux de couverture et la quantité de combustible économisée mais indique également le volume d’émissions de CO2 évitées.</p>
     
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