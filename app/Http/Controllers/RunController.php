<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use File;
use Validator;
use PDF;

use Dompdf\Dompdf;

class RunController extends Controller
{
    public function index(){
        return view("sys-1");
    }
    public function clear_sys(){
        parent::forget_all();
        return "L'initialisation a été effectué avec succés";
    }
    private function StoF($string){
        $ar=explode(",", $string);//['10','12']
        if(count($ar)==2){
            $int=(float)$ar[0];//convet '10' => 10
            $noInt=(float)$ar[1];
            $len=strlen(trim($ar[1]));
            for($i=0; $i<$len;$i++){
                $noInt/=10;
            }
            return $int+$noInt;
        }else{
            return (float)$ar[0];
        }
    }
    private function init_graph($nbr){
        for($i=1;$i<=$nbr;$i++)
            parent::forget_s("grph".$i);
    }
    public function graph(Request $rq){
        if($this->StoF($rq->Gmin)>=$this->StoF($rq->Gmax))
            return redirect("/sys-1");
        parent::put_s("Gmin",$this->StoF($rq->Gmin));
        parent::put_s("Gmax",$this->StoF($rq->Gmax));
        $this->init_graph(17);//important initialiser
        for($i=1; $i<=17;$i++){
            if($rq->has('grph'.$i)) parent::put_s("grph".$i,true);
            else parent::put_s("grph".$i,false);
        }
        return view("graph1");
    }
    public function get_data(Request $rq){
        $data=array();
        for($i=1; $i<=17; $i++){
            if(parent::get_s("grph".$i)){
                $data[]=[$i,parent::get_s("stat".$i)];
            }
        }
        $data=[$data,parent::get_s("inve"),parent::get_s("duree"),parent::get_s("Gmin"),parent::get_s("Gmax")];
        return $data;
    }
    public function send_clima(Request $rq){
        try{
            parent::put_s('climaPerso',$rq->perso=="on");
            if(!parent::has_s("rand")) parent::put_s("rand",rand(10000,99999));
            if ($rq->perso!="on"){
                $validation = Validator::make($rq->all(), [
                    'ville' => 'required|max:255',
                    'zone' =>'required',
                ]);
                if(!$validation->passes() || $rq->ville=="0")
                    return "Saisir les informations";
                parent::put_s('ville',str_replace(" ","-",strtolower($rq->ville)));
                parent::put_s("zone",strtolower($rq->zone)); 
                return "L'enregistrement a été effectué avec succès";           
            }else{
                $validation = Validator::make($rq->all(), [
                    'rh' =>'required|max:70000|mimes:txt',
                    'th' => 'required|max:70000|mimes:txt',
                    'ef' => 'required|max:70000|mimes:txt',
                ]);
                if(!$validation->passes())
                    return "La taille du fichier n'est pas convenable de notre système.";
                $validation = Validator::make($rq->all(), [
                    'ville_p' => 'required|max:255',
                ]);
                if(!$validation->passes())
                    return "Saisir le nom de ville personalisée";
                parent::put_s('ville',$rq->ville_p);
                parent::put_s('zone',"Perso");
                            
                $fileName = 'rh-'.parent::get_s("rand").'.txt';  
                $rq->rh->move(public_path('assets/files_perso'), $fileName);
                                
                $fileName = 'th-'.parent::get_s("rand").".txt";  
                $rq->th->move(public_path('assets/files_perso'), $fileName);
                
                $fileName = 'ef-'.parent::get_s("rand").".txt";  
                $rq->ef->move(public_path('assets/files_perso'), $fileName);
                               
                return "L'enregistrement a été effectué avec succès"; 
            }
        }catch(Throwable $e){
            return $e;
        }
    }
    public function send_paneau(Request $rq){
        try{
            $validation = Validator::make($rq->all(), [
                'a0' => 'required','a1' =>'required','a2' =>'required',
                'ac'=> 'required','azi' => 'required', 'inc' => 'required',
            ]);
            if(!$validation->passes())
                return "Saisir les informations";
            parent::put_s('a0',$rq->a0);
            parent::put_s('a1',$rq->a1);
            parent::put_s('a2',$rq->a2);
            parent::put_s('ac',$rq->ac);
            parent::put_s('azi',$rq->azi);
            parent::put_s('inc',$rq->inc);
            parent::put_S('nbrc',$rq->nbrc);
            return "L'enregistrement a été effectué avec succès"; 
        }catch(Throwable $e){
            return $e;
        }
    }
    public function send_ballon(Request $rq){
        try{
            if($rq->flagPB=="on"){
                $validation = Validator::make($rq->all(), [
                    'vol' => 'required','lon' =>'required','dia' =>'required',
                    'epa'=> 'required','con' => 'required', 'pui' => 'required',
                    'prixbal'=>'required',
                ]);
                parent::put_s('flagPB',1);
                parent::put_s('prixbal',$rq->prixbal);
            }else{
                $validation = Validator::make($rq->all(), [
                    'vol' => 'required','lon' =>'required','dia' =>'required',
                    'epa'=> 'required','con' => 'required', 'pui' => 'required',
                ]);
                parent::put_s('flagPB',0);
            }
            if(!$validation->passes())
                return "Saisir les informations";
            parent::put_s('vol',$rq->vol);
            parent::put_s('lon',$rq->lon);
            parent::put_s('dia',$rq->dia);
            parent::put_s('epa',$rq->epa);
            parent::put_s('con',$rq->con);
            parent::put_s('pui',$rq->pui);           
            $tab =array();
            for($i=1; $i<=12 ; $i++){
                $tab[]=$rq->input('tab'.$i);
            }
            parent::put_s('tab_mois',$tab);
            return "L'enregistrement a été effectué avec succès"; 
        }catch(Throwable $e){
            return $e;
        }
    }
    public function send_douch(Request $rq){
        try{
            $validation = Validator::make($rq->all(), [
                'avg' => 'required','dhw' =>'required',"tab_consom"=>"required",
            ]);
            if(!$validation->passes())
                return "Saisir les informations";
            parent::put_s('avg',$rq->avg);
            parent::put_s('dhw',$rq->dhw);
            parent::put_s('tab_consom',explode(",",$rq->tab_consom));
            return "L'enregistrement a été effectué avec succès"; 
        }catch(Throwable $e){
            return $e;
        }
    }
    public function send_dolar(Request $rq){
        try{
            parent::put_s('autre_v',$rq->autre_v=="on");
            if($rq->autre_v!="on"){
                $validation = Validator::make($rq->all(), [
                    'inve' => 'required','unite' =>'required',
                    "duree"=>"required","sys_r"=>"required",
                    "effi" =>"required",
                ]);
                if(!$validation->passes())
                    return "Saisir les informations";
            }else{
                $validation = Validator::make($rq->all(), [
                    'inve' => 'required','unite' =>'required',
                    "duree"=>"required","sys_r"=>"required",
                    "effi" =>"required","kwat"=>"required",
                ]);
                if(!$validation->passes())
                    return "Saisir les informations";
                parent::put_s("kwat",$rq->kwat);
            }
            parent::put_s('inve',$rq->inve);
            if($rq->unite=="dhm")
                parent::put_s('unite',"(Dh)");
            else
                parent::put_s('unite',"($)");
            parent::put_s('duree',$rq->duree);
            parent::put_s('sys_r',$rq->sys_r);
            parent::put_s('effi',$rq->effi);
            return "L'enregistrement a été effectué avec succès"; 
        }catch(Throwable $e){
            return $e;
        }
    }
    public function send_tuyau(){
        return "L'enregistrement a été effectué avec succès";
    }
    public function exportPdf(Request $rq){
        if(parent::has_s('result')){
            set_time_limit(300);
        
        $data=parent::get_s("result");
        $pdf = PDF::setOptions(['dpi' => 150,
        'defaultFont' => 'sans-serif',
        'enable-javascript' => true,
        'images' => true])->loadView('pdf1',$data);
        $pdf->save(public_path('assets/files_perso/pdf').'_'.parent::get_s("rand").'.pdf');
        return redirect(asset('assets/files_perso').'/pdf_'.parent::get_s("rand").'.pdf'); 
        //return $pdf->download('Rapport.pdf');
        }else{
            return "veuillez faire le calcule";
        }
        //return view("pdf",$data);
    }
    //##########################################################################
    public function play(){
        try{
            parent::put_s("rm",$this->RM());
            parent::put_s("tm",$this->TM());
            parent::put_s("ef",$this->EF());
            parent::put_s("th",$this->TH());
            parent::put_s("rh",$this->RH());

            if(!parent::has_s("rand")) parent::put_s("rand",rand(10000,99999));
            
            parent::put_s("stat1",$this->bethe());
            parent::put_s("stat2",$this->effColl());
            parent::put_s("stat3",$this->ecollM());
            parent::put_s("stat4",$this->qucollM());
            parent::put_s("stat5",$this->fs());
            parent::put_s("stat6",$this->qaux());
            parent::put_s("stat7",$this->pethe());
            parent::put_s("stat8",$this->ecoen());
            parent::put_s("stat9",$this->crefr());
            parent::put_s("stat10",$this->caux());
            parent::put_s("stat11",parent::get_s("rm"));
            parent::put_s("stat12",parent::get_s("tm"));
            parent::put_s("stat13",$this->tmc());
            parent::put_s("stat14",$this->tsc());
            parent::put_s("stat15",$this->tcbpp());
            parent::put_s("stat16",[$this->TRI(),$this->gainC()]);

            $mois=["Jan","Fév","Mar","Avr","Mai","Jui","Juil","Aoû","Sep","Oct","Nov","Déc"];
            $profil=parent::get_s("tab_consom");//explode(",",parent::get_s("tab_consom"));

            $data=array("bethe"=>parent::get_s("stat1"),"betheS"=>array_sum(parent::get_s("stat1")),
            "effcoll"=>parent::get_s("stat2"),"tm"=>parent::get_s("tm"),"rm"=>parent::get_s("rm"),
            "effcollM"=>array_sum(parent::get_s("stat2"))/12,
            "ecollM"=>parent::get_s("stat3"),"ecollMS"=>array_sum(parent::get_s("stat3")),
            "qucollM"=>parent::get_s("stat4"),"qucollMS"=>array_sum(parent::get_s("stat4")),
            "fs"=>parent::get_s("stat5"),"fsM"=>round(array_sum(parent::get_s("stat5"))/12,2),
            "qaux"=>parent::get_s("stat6"),"qauxS"=>array_sum(parent::get_s("stat6")),
            "pethe"=>parent::get_s("stat7"),"petheS"=>array_sum(parent::get_s("stat7")),
            "ecen"=>parent::get_s("stat8"),"ecenS"=>array_sum(parent::get_s("stat8")),
            "crefr"=>parent::get_s("stat9"),
            "caux"=>parent::get_s("stat10"),"gainF"=>$this->gainF(),
            "gainA"=>array_sum($this->gainF()),"gainC"=>parent::get_s("stat16")[1],
            "tri"=>parent::get_s("stat16")[0],"co2"=>$this->co2(),
            "ville"=>parent::get_s("ville"),"zone"=>parent::get_s("zone"),"ef"=>parent::get_s("ef"),
            "besoinEau"=>parent::get_s("avg"),"dhw"=>parent::get_s("dhw"),"vol"=>parent::get_s("vol"),
            "mois"=>$mois,"profil"=>$profil,"ac"=>parent::get_s("ac"),"a0"=>parent::get_s("a0"),
            "a1"=>parent::get_s("a1"),"a2"=>parent::get_s("a2"),"nbrc"=>parent::get_s("nbrc")
            );
            parent::put_s("result",$data);
            return "L'opération a été effectuée avec succès";
        }catch(Throwable $e){
            return $e->getMessage();
        }
    }
    private function EF(){
        if(!parent::has_s("climaPerso"))
            throw new \Exception("Veuillez entrer les informations de climatisation.");
        if(!parent::get_s("climaPerso")){//il n'a pas des fichiers perso
            if(!parent::has_s('zone'))
                throw new \Exception("Veuillez sélectionner la zone");
            if(!parent::has_s('ville'))
                throw new \Exception("Veuillez sélectionner la ville");
            try{
                $file = fopen(public_path('assets/eauF/').strtolower(parent::get_s("zone")).".txt", "r"); 
            }catch(Throwable $e){
                throw new \Exception($e->getMessage());
            } 
        }else{
            try{
                $fileName = 'ef-'.parent::get_s("rand").'.txt';  
                $file = fopen(public_path('assets/files_perso/').$fileName, "r"); 
            }catch(Throwable $e){
                throw new \Exception($e->getMessage());
            } 
        }
        $ef=array();
        while(!feof($file))
            $ef[]=$this->StoF(fgets($file));
        fclose($file);
        return $ef;
    }
    private function RM(){
        $rh=$this->RH();
        $interval=[744,1416,2160,2880,3624,4344,5088,5832,6552,7296,8016,8760];
        $res=array();$avg=0;$n=0;$div=0;
        try{
            for($i=0;$i<count($rh);$i++){
                $x=$rh[$i];
                if($x>=20){$avg+=$x; $div+=1;}
                if(($i+1)==$interval[$n]){
                    $res[]=round($avg/$div,1);
                    $avg=0;$div=0;
                    $n+=1; 
                }
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }      
    }
    private function TM(){
        try{
            $th=$this->TH();
            $interval=[744,1416,2160,2880,3624,4344,5088,5832,6552,7296,8016,8760];
            $res=array();$avg=0;$i=1;$n=0;$pre=1;
            for($i=0;$i<count($th);$i++){
                $avg+=$th[$i];
                if(($i+1)==$interval[$n]){
                    $res[]=round($avg/($interval[$n]-$pre+1),2);
                    $avg=0;
                    $pre=$interval[$n];
                    $n+=1;
                }
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }      
    }
    private function RH(){
        if(!parent::has_s("climaPerso"))
            throw new \Exception("Veuillez entrer les informations de climatisation.");
        if(!parent::get_s("climaPerso")){//il n'a pas des fichiers perso
            if(!parent::has_s('zone'))
                throw new \Exception("Veuillez sélectionner la zone");
            if(!parent::has_s('ville'))
                throw new \Exception("Veuillez sélectionner la ville");
            try{
                $file = fopen(public_path('assets/climat/'.strtolower(parent::get_s("zone"))."/".parent::get_s('ville'))."/rh.txt", "r");
            }catch(Throwable $e){
                fclose($file); throw new \Exception($e->getMessage());
            }    
        }else{
            try{
                $fileName = 'rh-'.parent::get_s("rand").'.txt';  
                $file = fopen(public_path('assets/files_perso/').$fileName, "r"); 
            }catch(Throwable $e){
                throw new \Exception($e->getMessage());
            } 
        }
        $res=array();
        try{
            while(!feof($file)){
                $res[]=$this->StoF(fgets($file));
            }
            fclose($file);
            if(count($res)!=8760){
                throw new \Exception("Attention!! Pour le fichier de rayonnement, le nombre des lignes doit égale 8760.");
                $res=array();
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }      
    }
    private function TH(){
        if(!parent::has_s("climaPerso"))
            throw new \Exception("Veuillez entrer les informations de climatisation.");
        if(!parent::get_s("climaPerso")){//il n'a pas des fichiers perso
            if(!parent::has_s('zone'))
                throw new \Exception("Veuillez sélectionner la zone");
            if(!parent::has_s('ville'))
                throw new \Exception("Veuillez sélectionner la ville");
            try{
                $file = fopen(public_path('assets/climat/'.strtolower(parent::get_s("zone"))."/".parent::get_s('ville'))."/th.txt", "r");
            }catch(Throwable $e){
                fclose($file); throw new \Exception($e->getMessage());
            }    
        }else{
            try{
                $fileName = 'th-'.parent::get_s("rand").'.txt';  
                $file = fopen(public_path('assets/files_perso/').$fileName, "r"); 
            }catch(Throwable $e){
                throw new \Exception($e->getMessage());
            } 
        } 
        $res=array();
        try{
            while(!feof($file)){
                $res[]=$this->StoF(fgets($file));
            }
            fclose($file);
            if(count($res)!=8760){
                throw new \Exception("Attention!! Pour le fichier de température ambiante, le nombre des lignes doit égale 8760.");
                $res=array();
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }      
    }
    private function bethe(){//B𝒆𝒔𝒐𝒊𝒏 𝒕𝒉𝒆𝒓𝒎𝒊𝒒𝒖𝒆 
        try{
            if(!parent::has_s('zone'))
                throw new \Exception("Veuillez sélectionner la zone");
            if(!parent::has_s('dhw'))
                throw new \Exception("Veuillez sélectionner la température DHW");
            if(!parent::has_s('vol'))
                throw new \Exception("Veuillez sélectionner le volume du ballon");
            $cp=4.19;
            $coef=[35.65,31.9,32.55,33,31.93,30.6,28.21,23.87,27.6,29.45,30.9,33.17];
            $vol=$this->StoF(parent::get_s("vol"));
            $res=array();
            for($i=0;$i<12;$i++){
                $res[]=round($coef[$i]*(3.8+1.8*($vol/50)),2);
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function effColl(){
        //η=a_0-a_1 (Tm-Ta)-a_2 G(Tm-Ta)^2
        try{
            if(!parent::get_s("perso")){
                if(!parent::has_s('zone'))
                    throw new \Exception("Veuillez sélectionner la zone");
                if(!parent::has_s('ville'))
                    throw new \Exception("Veuillez sélectionner la ville");
            }         
            if(!parent::has_s('a0'))
                throw new \Exception("Veuillez entrer la valeur a0");
            if(!parent::has_s('a1'))
                throw new \Exception("Veuillez entrer la valeur a1");
            if(!parent::has_s('a2'))
                throw new \Exception("Veuillez entrer la valeur a2");
            $tm=parent::get_s("tm");
            $rm=parent::get_s("rm");
            $a0=$this->StoF(parent::get_s("a0"));
            $a1=$this->StoF(parent::get_s("a1"));
            $a2=$this->StoF(parent::get_s("a2"));
            //calcule n
            $res=array();
            for($i=0;$i<12;$i++){
                $res[]=round(($a0/100-$a1*(25-$tm[$i])/$rm[$i]-$a2*pow((25-$tm[$i]), 2)/$rm[$i])*100,2);//$a0-$a1(50-$tm[$i])-$a2*$rm[$i]*
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function ecollM(){
        try{//EcollM= G*n*f*g  en  w/m2
            if(!parent::get_s("perso")){
                if(!parent::has_s('zone'))
                    throw new \Exception("Veuillez sélectionner la zone");
                if(!parent::has_s('ville'))
                    throw new \Exception("Veuillez sélectionner la ville");
            }         
            if(!parent::has_s('azi'))
                throw new \Exception("Veuillez entrer la valeur Azimut");
            if(!parent::has_s('inc'))
                throw new \Exception("Veuillez entrer la valeur d'angle d'inclination");
            $azi=parent::get_s("azi");
            $inc=parent::get_s('inc');
            if($azi==0) $f=1;
            else if (abs($azi)==10) $f=0.99;
            else if (abs($azi)==20) $f=0.98;
            else if (abs($azi)==30) $f=0.96;
            else if (abs($azi)==40) $f=0.94;
            else if (abs($azi)==45) $f=0.92;

            if($inc>=0 && $inc<=30) $g=0.93;
            else if ($inc>=31 && $inc<=35) $g=0.94;
            else if ($inc>=36 && $inc<=40) $g=0.95;
            else if ($inc>=41) $g=1;
            $rm=parent::get_s("rm");
            $eff=$this->effColl();
            //calcule n
            $res=array();
            for($i=0;$i<12;$i++){
                $res[]=round($g*$f*$rm[$i]*$eff[$i]/100,2);
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function qucollM(){
        try{
            if(!parent::get_s("ac"))
                throw new \Exception("Veuillez entrer la surface du capteur solaire.");
            if(!parent::get_s("nbrc"))
                throw new \Exception("Veuillez entrer le nombre des capteurs.");
            $ac=$this->StoF(parent::get_s("ac"));
            $nbrc=$this->StoF(parent::get_s("nbrc"));
            $ecollM=$this->ecollM();
            $res=array();
            for($i=0;$i<12;$i++){
                $res[]=round($nbrc*$ecollM[$i]*$ac,2);
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function fs(){
        try{
            $qucollM=$this->qucollM();
            $bethe=$this->bethe();
            $res=array();
            for($i=0; $i<12; $i++){
                $x=round(($qucollM[$i]/$bethe[$i])*100,2);
                if($x>=100)
                $res[]=100;
                else
                $res[]=$x;
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function qaux(){
        try{
            $bethe=$this->bethe();
            $qucollM=$this->qucollM();
            if(!parent::has_s("tab_mois"))
                throw new \Exception("veuillez entre la liste des activations de résistance");
            $x=parent::get_s("tab_mois");
            $res=array();
            for($i=0; $i<12; $i++){
                if($bethe[$i]>$qucollM[$i])
                    $res[]=round(($bethe[$i]-$qucollM[$i])*$this->StoF($x[$i]),2);
                else
                    $res[]=0;
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    public function pethe(){
        try{
            if(!parent::has_s("vol"))
                throw new \Exception("Veuillez entrer le volume du ballon");
            if(!parent::has_s("dhw"))
                throw new \Exception("Veuillez entrer la température DHW.");
            $vol=parent::get_s("vol");
            $tc=parent::get_s("dhw");
            $ta=parent::get_s("tm");
            $res=array();
            for($i=0; $i<12; $i++){
                if($tc>$ta[$i])
                $res[]=round((130*$vol*($tc-$ta[$i])/20000)*0.72,2);
                else
                $res[]=0;
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function ecoen(){
        try{
            $pethe=$this->pethe();
            $qucoll=$this->qucollM();
            $res=array();
            for($i=0; $i<12; $i++){
                $res[]=$qucoll[$i]-$pethe[$i];
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function crefr(){
        try{
            if(!parent::has_s("sys_r"))
                throw new \Exception("Veuillez sélectionner le type du système");
            if(!parent::has_s("unite"))
                throw new \Exception("Veuillez sélectionner la devise");
            if(parent::get_s("sys_r")=="2"){//electrisité
                $bethe=$this->bethe();
                $res=array();
                for($i=0; $i<12; $i++){
                    if(parent::get_s("autre_v")){
                        $res[]=$bethe[$i]*$this->StoF(parent::get_s("kwat"));
                    }else{
                        if($bethe[$i]<100) $res[]=$bethe[$i]*0.9;
                        if($bethe[$i]>100 && $bethe[$i]<=150) $res[]=$bethe[$i]*1.07;
                        if($bethe[$i]>150 && $bethe[$i]<=210) $res[]=$bethe[$i]*1.07;
                        if($bethe[$i]>210 && $bethe[$i]<=310) $res[]=$bethe[$i]*1.16;
                        if($bethe[$i]>310 && $bethe[$i]<=510) $res[]=$bethe[$i]*1.38;
                        if($bethe[$i]>510) $res[]=$bethe[$i]*1.59;
                    }        
                }
                return [2,parent::get_s("unite"),$res];
            }else if(parent::get_s("sys_r")=="1"){//gaz
                $res1=$this->qgaz();
                $res2=$this->crefrG();
                return [1,parent::get_s("unite"),$res1,$res2];
            }
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function qgaz(){
        try{
            $bethe=$this->bethe();
            $res=array();
            for($i=0; $i<12; $i++){
               $res[]=round($bethe[$i]/12.66,2);
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }   
    }
    private function crefrG(){
        try{
            $bethe=$this->bethe();
            $res=array();
            for($i=0; $i<12; $i++){
               $res[]=round($bethe[$i]*0.82,2);
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function caux(){
        try{
            $qaux=$this->qaux();
            $res=array();
            if(parent::get_s("flagPB")==0){//prix marocaine
                for($i=0;$i<12; $i++){
                    if($qaux[$i]<=100) $res[]=$qaux[$i]*0.90;
                    if($qaux[$i]>100 && $qaux[$i]<=150) $res[]=$qaux[$i]*1.07;
                    if($qaux[$i]>150 && $qaux[$i]<=210) $res[]=$qaux[$i]*1.07;
                    if($qaux[$i]>210 && $qaux[$i]<=310) $res[]=$qaux[$i]*1.16;
                    if($qaux[$i]>310 && $qaux[$i]<=510) $res[]=$qaux[$i]*1.38;
                    if($qaux[$i]>510) $res[]=$qaux[$i]*1.59;
                }               
            }else if(parent::get_s("flagPB")==1){//autre
                if(!parent::has_s("prixbal"))
                    throw new \Exception("Veuillez entrer le prix du Kwh électricité pour d'autre pays ($) ");
                for($i=0;$i<12; $i++){
                    $res[]=$qaux[$i]*$this->StoF(parent::get_s("prixbal"));
                }
            }
            
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function gainF(){
        try{
            $cref=$this->crefr();
            if($cref[0]==2) $cref=$cref[2];
            else $cref=$cref[3];
            $caux=$this->caux();
            $res=array();
            for($i=0; $i<12; $i++){
                $res[]=round($cref[$i]-$caux[$i],2);
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function gainA(){
        try{
            return array_sum($this->gainF());
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function gainC(){
        try{
            if(!parent::has_s("duree"))
                throw new \Exception("Veuillez entrer la durée de vie.");
            $gaina=$this->gainA();
            $duree= $this->StoF(parent::get_s("duree"));
            $res=array();
            for($i=1; $i<=$duree; $i++){
                $res[]=$gaina*$i;
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function TRI(){//temps de retour sur investtissemnt
        try{
            if(!parent::has_s("inve"))
                throw new \Exception("Veuillez entrer le coût d'investissement.");
            $gaina=$this->gainA();
            $inve=$this->StoF(parent::get_s("inve"));
            return round($inve/$gaina,2);
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function effcolli($i,$tm){
        try{
            $ta=parent::get_s("th");
            $G=parent::get_s("rh");
            $a0=$this->StoF(parent::get_s("a0"));
            $a1=$this->StoF(parent::get_s("a1"));
            $a2=$this->StoF(parent::get_s("a2"));//ajouter test G!=0
            if($G[$i]!=0)
                return (($a0/100) -$a1*($tm-$ta[$i])/$G[$i] - $a2*pow(($tm-$ta[$i]),2)/$G[$i]);
            else 
                return $a0/100;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function ecolli($i,$tm){
        try{
            $G=parent::get_s("rh");
            $n=$this->effcolli($i,$tm);
            $azi=parent::get_s("azi");
            $inc=parent::get_s('inc');
            if($azi==0) $f=1;
            else if (abs($azi)==10) $f=0.99;
            else if (abs($azi)==20) $f=0.98;
            else if (abs($azi)==30) $f=0.96;
            else if (abs($azi)==40) $f=0.94;
            else if (abs($azi)==45) $f=0.92;

            if($inc>=0 && $inc<=30) $g=0.93;
            else if ($inc>=31 && $inc<=35) $g=0.94;
            else if ($inc>=36 && $inc<=40) $g=0.95;
            else if ($inc>=41) $g=1;
            return $G[$i]*$n*$f*$g;//[ecoll,effcoll]
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function tmc(){
        try{
            $a0=$this->StoF(parent::get_s("a0"));
            $a1=$this->StoF(parent::get_s("a1"));
            $G=parent::get_s("rh");
            $ta=parent::get_s("th");
            $tm=array();$ec=array();$ef=array();$t=50;
            for($i=0;$i<8760;$i++){
                $ecolli=$this->ecolli($i,$t);
                $tm[]=round($t,2);
                //$t= (($a0/100)*$G[$i]+$ecolli)/$a1 + $ta[$i];//;
                $t=(((($a0/100)*$G[$i]+$ecolli)/$a1)*0.01)+$ta[$i];
            }
            return $tm;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function tsc(){
        try{
            $tmc=$this->tmc();
            $ef=$this->EF();
            $tsc=array();
            for($i=0;$i<count($tmc);$i++){
                $tsc[]=2*$tmc[$i
                ]+$ef[$i%12];
            }
            return $tsc;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function tcbPrime(){
        try{
        if(!parent::has_s("vol"))
            throw new \Exception("Veuillez entrer le  volume du ballon.");
        if(!parent::has_s("epa"))
            throw new \Exception("Veuillez entrer l'epaisseur isolant.");
        if(!parent::has_s("dia"))
            throw new \Exception("Veuillez entrer le diamètre.");
        if(!parent::has_s("lon"))
            throw new \Exception("Veuillez entrer la longeur.");
        if(!parent::has_s("con"))
            throw new \Exception("Veuillez entrer la conductivité thermique.");
        $v=parent::get_s("vol");
        $ep=parent::get_s("epa");
        $d=parent::get_s("dia");
        $l=parent::get_s("lon");
        $c=parent::get_s("con");
        $ta=parent::get_s("th");
        $tsc=$this->tsc();
        $tcbP=array();
        for($i=0;$i<count($tsc);$i++){
            $deltaT=(($tsc[$i]-$ta[$i])*(3.14*$d*$l+(3.14*pow($d,2))/4)*$c*3.6)/($ep*$v*4.19);
            $tcbP[]=$tsc[$i]-$deltaT;
        }
            return $tcbP;   
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function vp(){
        try{
            if(!parent::has_s("vol"))
                throw new \Exception("Veuillez entrer le volume du ballon.");   
            if(!parent::has_s("tab_consom"))
                throw new \Exception("Veuillez entrer la consommation d'eau journalière.");
            $v=parent::get_s("vol");
            $tab_consom=parent::get_s("tab_consom");//explode(",",parent::get_s("tab_consom"));
            $res=array();
            for($i=0; $i<count($tab_consom);$i++){
                $res[]=($v*$tab_consom[$i])/100;
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function tcbpp(){
        try{      
            $vp=$this->vp();
            $tcbp=$this->tcbPrime();
            $ef=parent::get_s("ef");
            $v=parent::get_s("vol");           
            $res=array();
            for($i=0; $i<count($tcbp); $i++){
                $res[]=(($v-$vp[$i%count($vp)])*$tcbp[$i]+$vp[$i%count($vp)]*$ef[$i%count($ef)])/$v;
            }
            return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
    private function co2(){
        try{
        if(parent::get_s("sys_r")=="1")
            $cte=1.39*0.1;
        else if(parent::get_s("sys_r")=="2")
            $cte=1.39*0.23;
        $qucollM=$this->qucollM();
        $res=array();
        for($i=0;$i<count($qucollM);$i++){
            $res[]=round($qucollM[$i]*$cte,2);
        }
        return $res;
        }catch(Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }
}
