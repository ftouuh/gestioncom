<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsrfTokenController extends Controller
{
    public function fetchCsrfToken()
    {
        return response()->json(['token' => csrf_token()]);
    }
}
