<?php

Route::get('/', array("as" => "homepage", "uses" => "HomeController@index"));
Route::get("generate", array("as" => "generate", "uses" => "GenerateController@create"));
Route::post("generate/store", array("as" => "generate.store", "uses" => "GenerateController@store"));