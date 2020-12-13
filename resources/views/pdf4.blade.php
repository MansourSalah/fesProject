<!DOCTYPE html>
<html >
<head>
<style>
table, th, td {
  border: 1px solid black;
  text-align: center;
}
h3{
    color:red;
}
h4{
    color:green;
}
.univ{
    /*margin-left: auto;*/
    margin-left: 750px;
}
</style>
</head>
<body>
<div style="display:flex;">
    <div class="iresen">
        <p style="font-size: 50px;color: #36368c;font-weight: 700;margin: 0px;">IRESEN</p>
        <p style="font-size: 10px;width: 190px;margin: 0px;color: #36368c;">INSTITUT DE RECHERCHE EN ENERGIE SOLAIRE ET <span style="padding-right: 7px;padding-left: 7px;">ENERGIES</span> NOUVELLES</p>
    </div>
    <div class="univ">
        <p style="margin-top: 10px;font-size: 25px;color: #de1c1c;font-weight: 700;text-align: center;">Université<br> Sidi Mohammed Ben Abdellah</p>
    </div>
</div>

<div style="margin-top: -70px;">
    <h1 style="margin-bottom: 0px;text-align: center;font-family: cursive;font-style: italic;color: #3737c3;font-size: 70px;">S<span style="color: #e6e604;">O</span>L'R SHEMSY</h1>
    <h5 style="margin: auto;text-align: center;margin-left: 410px;font-family: cursive;font-style: italic;color: #3737c3;font-size: 20px;margin-top: -17px;">Softwear</h5>
</div>
<h3 style="text-align: center;"><span style="color: #5656d8;">"CES à circulation forcée & ballon tampon"</span></h3>

<h3>1. Les données climatiques</h3>
<p><strong>Localisation</strong> : <span style="color: #5656d8;">{{$ville}}</span></p> 
<p><strong>La zone climatique</strong> : <span style="color: #5656d8;">{{$zone}}</span></p> 
<table style="width:100%;" >
  <tr>
    <th>Mois</th>
    <th>Température ambiante</th>
    <th>Rayonnement global</th>
    <th>Temperatures eau froide</th>
  </tr>
  @for($i=0;$i<=11;$i++)
  <tr>
    <td>{{$mois[$i]}}</td>
    <td style="color: #5656d8;">{{$tm[$i]}}</td>
    <td style="color: #5656d8;">{{$rm[$i]}}</td>
    <td style="color: #5656d8;">{{$ef[$i]}}</td>
  </tr>
  @endfor
</table>

<h3>2. La consommation d’eau chaude</h3>
<p><strong>Le besoin d’eau chaude journalier : </strong><span style="color: #5656d8;">{{$besoinEau}} L</span></p> 
<p><strong>La température d’eau chaude : </strong><span style="color: #5656d8;">{{$dhw}} C°</span></p> 
<p><strong>Le profil de puisage : </strong></p>
<table style="width:100%;" >
  <tr>
    @for($i=0;$i<=12;$i++)
        <th>{{$i}}</th>
    @endfor
  </tr>
  <tr>
    @for($i=0;$i<=12;$i++)
        <td style="color: #5656d8;">{{$profil[$i]}}</td>
    @endfor
  </tr>
</table>
<br>
<table style="width:100%;" >
  <tr>
    @for($i=13;$i<=23;$i++)
        <th>{{$i}}</th>
    @endfor
  </tr>
  <tr>
    @for($i=13;$i<=23;$i++)
        <td style="color: #5656d8;">{{$profil[$i]}}</td>
    @endfor
  </tr>
</table>
<h3>3. CES à circulation forcée & ballon tampon</h3>
<p><strong>Volume du ballon primaire : </strong><span style="color: #5656d8;">{{$vol1}} L</span></p> 
<p><strong>Volume du ballon secondaire : </strong><span style="color: #5656d8;">{{$vol2}} L</span></p> 

<p><strong>Capteur Solaire Thermique : </strong></p>
<table style="width:100%;">
    <tr>
        <th>Surface</th>
        <th>Nombre Capteurs</th>
        <th>a0</th>
        <th>a1</th>
        <th>a2</th>
    </tr>
    <tr>
        <td style="color: #5656d8;width:20%;">{{$ac}}</td>
        <td style="color: #5656d8;width:20%;">{{$nbrc}}</td>
        <td style="color: #5656d8;width:20%;">{{$a0}}</td>
        <td style="color: #5656d8;width:20%;">{{$a1}}</td>
        <td style="color: #5656d8;width:20%;">{{$a2}}</td>
    </tr>
</table>
<h3>4. Récapitulatif annuel</h3>
<h4>- Énergétique </h4>
<table style="width:100%;" >
  <tr>
    <th>Mois</th>
    <th>Besoin thermique</th>
    <th>Production solaire (Qucoll)</th>
    <th>Consommation du système auxiliaire (Qaux)</th>
    <th>Perte thermique [Ballon1]</th>
    <th>Perte thermique [Ballon2]</th>
    <th>Fraction solaire</th>
  </tr>
  @for($i=0;$i<=11;$i++)
    <tr>
        <td>{{$mois[$i]}}</td>
        <td style="color: #5656d8;width:14%;">{{$bethe[$i]}}</td>        
        <td style="color: #5656d8;width:14%;">{{$qucollM[$i]}}</td>
        <td style="color: #5656d8;width:14%;">{{$qaux[$i]}}</td>
        <td style="color: #5656d8;width:14%;">{{$pethe1[$i]}}</td>
        <td style="color: #5656d8;width:14%;">{{$pethe2[$i]}}</td>
        <td style="color: #5656d8;width:14%;">{{$fs[$i]}}</td>
    </tr>
  @endfor
    <tr>
        <td></td>
        <td style="color:red;">SUM = {{$betheS}}</td>
        <td style="color:red;">SUM = {{$qucollMS}}</td>
        <td style="color:red;">SUM = {{$qauxS}}</td>
        <td style="color:red;">SUM = {{$pethe1S}}</td>
        <td style="color:red;">SUM = {{$pethe2S}}</td>
        <td style="color:red;">AVG = {{$fsM}}</td>
    </tr>
</table>
<br>
<table style="width:100%;margin-top:10px" >
  <tr>
    <th>Mois</th>
    <th>Efficacité du collecteur</th>
    <th>Energie apporté par le capteur</th>
    <th>Perte thermique [Tuyauteries] </th>
    <th>Economie d'énergie</th>
    <th>Consommation de la pompe</th>
  </tr>
  @for($i=0;$i<=11;$i++)
  <tr>
    <td>{{$mois[$i]}}</td>
    <td style="color: #5656d8;width:20%;">{{$effcoll[$i]}}</td>        
    <td style="color: #5656d8;width:20%;">{{$ecollM[$i]}}</td>
    <td style="color: #5656d8;width:20%;">{{$petu[$i]}}</td>
    <td style="color: #5656d8;width:20%;">{{$ecen1[$i]}}</td>
    <td style="color: #5656d8;width:20%;">{{$conpom[$i]}}</td>
  </tr>
  @endfor

    <tr>
        <td></td>
        <td style="color:red;">AVG = {{$effcollM}}</td>
        <td style="color:red;">SUM = {{$ecollMS}}</td>
        <td style="color:red;">SUM = {{$petuS}}</td>
        <td style="color:red;">SUM = {{$ecen1S}}</td>
        <td style="color:red;">SUM = {{$conpomS}}</td>
    </tr>
</table>
<h4>- Économique </h4>
@if($crefr[0]==2)
    <p><strong>La consommation du système de référence électrique mensuelle {{$crefr[1]}} :</strong></p>
    <table style="width:100%;" >
        <tr>
        @foreach($mois as $v)
            <th>{{$v}}</th>
        @endforeach
        </tr>
        <tr>
            @for($i=0;$i<=11;$i++)
            <td style="color: #5656d8;">{{$crefr[2][$i]}}</td>
            @endfor
        </tr>
    </table>
@elseif($crefr[0]==1)
    <p><strong>La quantité du gaz Butane consommée (kg) :</strong></p>
    <table style="width:100%;" >
        <tr>
        @foreach($mois as $v)
            <th>{{$v}}</th>
        @endforeach
        </tr>
        <tr>
            @for($i=0;$i<=11;$i++)
            <td style="color: #5656d8;">{{$crefr[2][$i]}}</td>
            @endfor
        </tr>
    </table>
    <p><strong>La consommation du chauffe-eau à gaz mensuelle {{$crefr[1]}} :</strong></p>
    <table style="width:100%;" >
        <tr>
        @foreach($mois as $v)
            <th>{{$v}}</th>
        @endforeach
        </tr>
        <tr>
            @for($i=0;$i<=11;$i++)
            <td style="color: #5656d8;">{{$crefr[3][$i]}}</td>
            @endfor
        </tr>
    </table>
@endif
<p><strong>Gains financiers mensuels : </strong></p>
<table style="width:100%;" >
    <tr>
    @foreach($mois as $v)
        <th>{{$v}}</th>
    @endforeach
    </tr>
    <tr>
        @for($i=0;$i<=11;$i++)
        <td style="color: #5656d8;">{{$gainF[$i]}}</td>
        @endfor
    </tr>
</table>
<p><strong>La somme des gains financiers mensuelle : </strong> {{$gainA}}</p>
<p><strong>Gain annuel cumulé : </strong></p>
<table style="width:100%;" >
    <tr>
    @if(count($gainC)<=12)
        @for($i=1;$i<=count($gainC);$i++)
            <th>{{$i}} Ans</th>
        @endfor
    @else
        @for($i=1;$i<=12;$i++)
            <th>{{$i}} Ans</th>
        @endfor
    @endif
    </tr>
    <tr>
        @if(count($gainC)<=12)
            @for($i=0;$i<=count($gainC)-1;$i++)
            <td style="color: #5656d8;">{{$gainC[$i]}}</td>
            @endfor
        @else
            @for($i=0;$i<=11;$i++)
            <td style="color: #5656d8;">{{$gainC[$i]}}</td>
            @endfor
        @endif
    </tr>
</table>
<div style="border: 3px solid red;width: 500px;padding: 5px;border-radius: 13px;
    margin-top: 20px;">
<p style="margin:0px"><strong>Temps de retours sur l'investissement : </strong> {{$tri}}</p>
</div>
<br><br><br><br>
<h4>- Environnemental</h4>
<p><strong>Les émissions CO2 à éviter : </strong></p>
<table style="width:100%;" >
    <tr>
    @foreach($mois as $v)
        <th>{{$v}}</th>
    @endforeach
    </tr>
    <tr>
        @for($i=0;$i<=11;$i++)
        <td style="color: #5656d8;">{{$co2[$i]}}</td>
        @endfor
    </tr>
</table>
</body>
</html>