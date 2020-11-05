<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $page
     * @return Application|Factory|Response|View
     */
    public function index($page)
    {
        $view = 'static.'.$page;
        if (view()->exists($view)) {
            return view($view);
        } else {
            return view('static.404');
        }
    }
}
