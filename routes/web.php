<?php

use Illuminate\Support\Facades\Route;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

Route::get('/', function () {
    return view('index');
}); 

Route::get('/abrir-venda', 'VendasController@abrirVenda');

Route::post('/nova-venda/item', 'VendasController@store');
Route::post('/nova-venda/concluir', 'VendasController@update');
Route::get('/nova-venda', 'VendasController@novaVenda');
Route::post('/nova-venda', 'VendasController@novaVenda')->name('nova-venda');

Route::get('/vendas', 'VendasController@index');
Route::post('/vendas', 'VendasController@create')->name('cadastrar-venda');

Route::get('/produtos', 'ProdutosController@index');
Route::post('/produtos', 'ProdutosController@store');

Route::get('/categorias', 'CategoriasController@index');
Route::post('/categorias', 'CategoriasController@store');

Route::get('/teste', function(){
    define('AMQP_DEBUG', true);
    $connection = new AMQPStreamConnection(getenv('RABBITMQ_HOST'), getenv('RABBITMQ_PORT'), getenv('RABBITMQ_USER'), getenv('RABBITMQ_PASSWORD'));

    // $channel = $connection->channel();
    // $channel->queue_declare('envio', false, true, false, false);
    // $rabbitMsg = new AMQPMessage('Hello World');
    // $channel->basic_publish($rabbitMsg, '', 'envio');
    // $channel->close();
    // $connection->close();
});