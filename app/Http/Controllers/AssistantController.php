<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function dashboard()
    {
        return view('assistant.dashboard');
    }
}
