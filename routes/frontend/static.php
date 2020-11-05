<?php

// All route names are prefixed with 'static.'.
Route::get('/static/{page}', 'StaticController@index');
