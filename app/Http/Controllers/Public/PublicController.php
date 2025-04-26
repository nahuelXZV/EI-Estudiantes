<?php

namespace App\Http\Controllers\Public;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PublicController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        // Middleware can be applied here if needed
    }

    public function index()
    {
        return view('welcome');
    }

}
