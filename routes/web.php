<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('efetuaPagar/{id}/{portador}', 'erp\movFinController@efetuaPagar')->name('erp.efetuaPagar');
Route::get('Pagar/{id}', 'erp\movFinController@contasPagar')->name('erp.contasPagar');

Route::get('efetuaReceber/{id}/{portador}', 'erp\movFinController@efetuaReceber')->name('erp.efetuaReceber');
Route::get('Receber/{id}', 'erp\movFinController@contasReceber')->name('erp.contasReceber');

Route::get('lancFin/{id}', 'erp\movFinController@lancFin')->name('erp.lancFin');
Route::post('lancFinStore', 'erp\movFinController@lancFinStore')->name('erp.lancFinStore'); 

Route::get('movfin', 'erp\movFinController@index')->name('erp.movfin');
Route::get('extrato/{id}', 'erp\movFinController@extrato')->name('erp.extrato');

Route::get('contaPagar', 'erp\PagarController@index')->name('erp.contaPagar');
Route::get('pagarCreate/{id}', 'erp\PagarController@create')->name('pagar.create');
Route::get('pagarPagos/{id}', 'erp\PagarController@pagos')->name('pagar.pagos');
Route::post('pagarStore', 'erp\PagarController@pagarStore')->name('pagar.store'); 





Route::get('balance', 'erp\BalanceController@index')->name('erp.balance'); 
 
Route::post('deposito', 'erp\BalanceController@depositoStore')->name('deposito.store'); 

Route::get('balance/deposito', 'erp\BalanceController@deposito')->name('balance.deposito');

Route::get('balance/saque', 'erp\BalanceController@saque')->name('balance.saque');
Route::post('balance/saque', 'erp\BalanceController@saqueStore')->name('saque.store');

Route::get('balance/transferencia', 'erp\BalanceController@transferencia')->name('balance.transferencia');
Route::post('balance/transferencia', 'erp\BalanceController@transferenciaStore')->name('transferencia.store');
Route::post('balance/transferencia-gravar', 'erp\BalanceController@transferenciaGravar')->name('transferencia.gravar');

Route::get('historico', 'erp\BalanceController@historico')->name('erp.historico');

