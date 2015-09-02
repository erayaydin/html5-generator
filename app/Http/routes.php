<?php

Route::get('/', array("as" => "homepage", "uses" => "HomeController@index"));
Route::get("generate", array("as" => "generate", "uses" => "GeneratorController@create"));
Route::post("generate/store", array("as" => "generate.store", "uses" => "GeneratorController@store"));