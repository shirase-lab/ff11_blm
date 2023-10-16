<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resist;

class ResistController extends Controller
{
    //
    public function index()
    {
        $resist = Resist::all();
        return response()->json($resist);
    }
}
