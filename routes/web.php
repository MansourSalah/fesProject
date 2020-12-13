<?php
use App\Http\Controllers\RunController;
use App\Http\Controllers\Run2Controller;
use App\Http\Controllers\Run3Controller;
use App\Http\Controllers\Run4Controller;
use App\Http\Controllers\Run5Controller;
use Illuminate\Support\Facades\Route;
Route::get("/test",function(){
return view("test");
});

Route::get('/', function () {
    return view('index');
});
Route::get('/sys-1',[RunController::class,'index']);
Route::get('/sys-2',[Run2Controller::class,'index']);
Route::get('/sys-3',[Run3Controller::class,'index']);
Route::get('/sys-4',[Run4Controller::class,'index']);
Route::get('/sys-5',[Run5Controller::class,'index']);

Route::post('/send_clima',[RunController::class,'send_clima']);
Route::post('/send_paneau',[RunController::class,'send_paneau']);
Route::post('/send_ballon',[RunController::class,'send_ballon']);
Route::post('/send_douch',[RunController::class,'send_douch']);
Route::post('/send_dolar',[RunController::class,'send_dolar']);
Route::post('/send_tuyau',[RunController::class,'send_tuyau']);

Route::post('/send_clima/sys2',[Run2Controller::class,'send_clima']);
Route::post('/send_paneau/sys2',[Run2Controller::class,'send_paneau']);
Route::post('/send_douch/sys2',[Run2Controller::class,'send_douch']);
Route::post('/send_ballon/sys2',[Run2Controller::class,'send_ballon']);
Route::post('/send_pompe/sys2',[Run2Controller::class,'send_pompe']);
Route::post('/send_regulateur/sys2',[Run2Controller::class,'send_reg']);
Route::post('/send_tuyau1/sys2',[Run2Controller::class,'send_tuyau1']);
Route::post('/send_tuyau2/sys2',[Run2Controller::class,'send_tuyau1']);
Route::post('/send_dolar/sys2',[Run2Controller::class,'send_dolar']);

Route::post('/send_clima/sys3',[Run3Controller::class,'send_clima']);
Route::post('/send_paneau/sys3',[Run3Controller::class,'send_paneau']);
Route::post('/send_douch/sys3',[Run3Controller::class,'send_douch']);
Route::post('/send_ballon/sys3',[Run3Controller::class,'send_ballon']);
Route::post('/send_pompe1/sys3',[Run3Controller::class,'send_pompe1']);
Route::post('/send_pompe2/sys3',[Run3Controller::class,'send_pompe2']);
Route::post('/send_echangeur/sys3',[Run3Controller::class,'send_echangeur']);
Route::post('/send_regulateur/sys3',[Run3Controller::class,'send_reg']);
Route::post('/send_tuyau1/sys3',[Run3Controller::class,'send_tuyau1']);
Route::post('/send_tuyau2/sys3',[Run3Controller::class,'send_tuyau1']);
Route::post('/send_dolar/sys3',[Run3Controller::class,'send_dolar']);

Route::post('/send_douch/sys4',[Run4Controller::class,'send_douch']);
Route::post('/send_clima/sys4',[Run4Controller::class,'send_clima']);
Route::post('/send_paneau/sys4',[Run4Controller::class,'send_paneau']);
Route::post('/send_ballon1/sys4',[Run4Controller::class,'send_ballon1']);
Route::post('/send_ballon2/sys4',[Run4Controller::class,'send_ballon2']);
Route::post('/send_pompe1/sys4',[Run4Controller::class,'send_pompe1']);
Route::post('/send_pompe2/sys4',[Run4Controller::class,'send_pompe2']);
Route::post('/send_echangeur/sys4',[Run4Controller::class,'send_echangeur']);
Route::post('/send_regulateur/sys4',[Run4Controller::class,'send_reg']);
Route::post('/send_tuyau1/sys4',[Run4Controller::class,'send_tuyau1']);
Route::post('/send_tuyau2/sys4',[Run4Controller::class,'send_tuyau2']);
Route::post('/send_dolar/sys4',[Run4Controller::class,'send_dolar']);

Route::post('/send_douch/sys5',[Run5Controller::class,'send_douch']);
Route::post('/send_clima/sys5',[Run5Controller::class,'send_clima']);
Route::post('/send_paneau/sys5',[Run5Controller::class,'send_paneau']);
Route::post('/send_ballon1/sys5',[Run5Controller::class,'send_ballon1']);
Route::post('/send_ballon2/sys5',[Run5Controller::class,'send_ballon2']);
Route::post('/send_pompe1/sys5',[Run5Controller::class,'send_pompe1']);
Route::post('/send_pompe2/sys5',[Run5Controller::class,'send_pompe2']);
Route::post('/send_pompe3/sys5',[Run5Controller::class,'send_pompe3']);
Route::post('/send_echangeur/sys5',[Run5Controller::class,'send_echangeur']);
Route::post('/send_regulateur/sys5',[Run5Controller::class,'send_reg']);
Route::post('/send_chaufage/sys5',[Run5Controller::class,'send_chauf']);
Route::post('/send_tuyau1/sys5',[Run5Controller::class,'send_tuyau1']);
Route::post('/send_tuyau2/sys5',[Run5Controller::class,'send_tuyau2']);
Route::post('/send_tuyau3/sys5',[Run5Controller::class,'send_tuyau3']);
Route::post('/send_dolar/sys5',[Run5Controller::class,'send_dolar']);

Route::get("/get_data/sys1",[RunController::class,'get_data']);
Route::get('/clear/sys1',[RunController::class,'clear_sys']);
Route::get('/pdf/sys1',[RunController::class,'exportPdf']);
Route::get('/play/sys1',[RunController::class,'play']);
Route::post('/graph/sys1',[RunController::class,'graph']);

Route::get("/get_data/sys2",[Run2Controller::class,'get_data']);
Route::get('/clear/sys2',[Run2Controller::class,'clear_sys']);
Route::get('/pdf/sys2',[Run2Controller::class,'exportPdf']);
Route::get('/play/sys2',[Run2Controller::class,'play']);
Route::post('/graph/sys2',[Run2Controller::class,'graph']);

Route::get("/get_data/sys3",[Run3Controller::class,'get_data']);
Route::get('/clear/sys3',[Run3Controller::class,'clear_sys']);
Route::get('/pdf/sys3',[Run3Controller::class,'exportPdf']);
Route::get('/play/sys3',[Run3Controller::class,'play']);
Route::post('/graph/sys3',[Run3Controller::class,'graph']);

Route::get("/get_data/sys4",[Run4Controller::class,'get_data']);
Route::get('/clear/sys4',[Run4Controller::class,'clear_sys']);
Route::get('/pdf/sys4',[Run4Controller::class,'exportPdf']);
Route::get('/play/sys4',[Run4Controller::class,'play']);
Route::post('/graph/sys4',[Run4Controller::class,'graph']);

Route::get("/get_data/sys5",[Run5Controller::class,'get_data']);
Route::get('/clear/sys5',[Run5Controller::class,'clear_sys']);
Route::get('/pdf/sys5',[Run5Controller::class,'exportPdf']);
Route::get('/play/sys5',[Run5Controller::class,'play']);
Route::post('/graph/sys5',[Run5Controller::class,'graph']);

Route::post("/image",[Run5Controller::class,'img_data']);

Route::get("/SOLR_SHEMSY" , function(){return view('projet');});
Route::get("/systemes" , function(){return view('soft');});



