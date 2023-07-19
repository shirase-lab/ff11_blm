<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enemy;

class EnemyController extends Controller
{
    //
    public function index()
    {
        $enemies = Enemy::all();
        return view('enemies/index', compact('enemies'));
    }

    public function create()
    {
        $enemy = new Enemy;
        return view('enemies/create', compact('enemy'));
    }

    public function store(Request $request)
    {
        $enemy = new Enemy;
        $enemy->name = $request->name;
        $enemy->remarks = $request->remarks;
        $enemy->eint = $request->eint;
        $enemy->barrier = $request->barrier;
        $enemy->fire = $request->fire;
        $enemy->earth = $request->earth;
        $enemy->water = $request->water;
        $enemy->aero = $request->aero;
        $enemy->ice = $request->ice;
        $enemy->thunder = $request->thunder;
        $enemy->light = $request->light;
        $enemy->dark = $request->dark;
        $enemy->geo = $request->geo;
        if (isset($request->impact) && $request->impact == "on") { $enemy->impact = true; }
        if (isset($request->burn) && $request->burn == "on") { $enemy->burn = true; }
        $enemy->save();
        return redirect()->route('enemy.create');
    }

    public function show($id)
    {
        $result = Enemy::find($id);
        return response()->json($result);
    }
}
