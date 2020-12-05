<?php 

require('vendor/autoload.php');
\Selvi\Database\Manager::add([
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'RDF?jq8eec',
    'database' => 'selvi_testing',
    'debug' => true
], 'main')->addMigration(__DIR__.'/migrations');

\Selvi\Firebase\Manager::setup(['serviceAccountFile' => __DIR__.'/gsa.json']);
\Selvi\Firebase\Pengguna::setup(['schema' => 'main']);

use \Selvi\Route;
Route::get('/kontak', 'KontakController@result');
Route::get('/kontak/(:any)', 'KontakController@row');
Route::post('/kontak', 'KontakController@insert');
Route::patch('/kontak/(:any)', 'KontakController@update');
Route::delete('/kontak/(:any)', 'KontakController@delete');

\Selvi\Framework::run();