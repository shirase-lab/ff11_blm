<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
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
        $augment = new Enemy;
        $augment->equip_id = $request->equip_id;
        $augment->rank = $request->rank;
        $augment->status = $request->status;
        $augment->type = $request->type;
        $augment->hide_status = $request->hide_status;
        $augment->save();
        return redirect()->route('augment.create');
    }
}
