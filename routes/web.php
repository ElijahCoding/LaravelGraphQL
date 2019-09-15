<?php

Route::get('/', function () {
    $client = \Softonic\GraphQL\ClientBuilder::build('http://127.0.0.1:8887/graphql');

    $query = '
        query {
            books {
                title
                author
            }
        }';

    $response = $client->query($query);

    dd($response->getData());
});

Route::get('/guzzle', function () {
    $client = new \GuzzleHttp\Client;

    $response = $client->post('http://127.0.0.1:8887/graphql', [
        \GuzzleHttp\RequestOptions::JSON => ['query' => 'mutation {createBook(title: "New Book", author: "Andre", category: 1) { id title author }}']
    ]);
    
    dd(json_decode($response->getBody()->getContents()));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
