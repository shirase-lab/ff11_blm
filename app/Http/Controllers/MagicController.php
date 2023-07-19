<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magic;
use App\Models\MagicCoefficient;

class MagicController extends Controller
{
    //
    public function index()
    {
        $magics = Magic::all();
        return view('magics/index', compact('magics'));
    }

    public function create()
    {
        $magic = new Magic;
        return view('magics/create', compact('magic'));
    }

    public function store(Request $request)
    {
        $magic = new Magic;
        $magic->name = $request->name;
        $magic->mp = $request->mp;
        $magic->attribute = $request->attribute;
        $magic->base_damage = $request->base_damage;
        $magic->cast_time = $request->cast_time;
        $magic->recast_time = $request->recast_time;
        $magic->save();
        foreach ($request->coefficients as $coefficient) {
            $c = new MagicCoefficient;
            $c->int_diff_min = $coefficient['int_diff_min'];
            $c->int_diff_max = $coefficient['int_diff_max'];
            $c->coefficient = $coefficient['coefficient'];
            $magic->coefficients()->save($c);
        }
        return redirect()->route('magic.create');
    }

    public function show($id)
    {
        $result = Magic::with('coefficients')->find($id);
        return response()->json($result);
    }
}
