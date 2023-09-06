<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DbApi extends Controller
{
    public function taxonomies()
    {
        $response = Http::get('http://mpc23.test/api/taxonomies/items/terms');
        $result = json_decode($response);
        $terms = '';
        foreach( $result->data as $term){
            $terms = $terms . $term->title;
        }
        dd ( $result->data );
    }
}
