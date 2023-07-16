<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Augment;
use App\Models\Equip;

class AugmentController extends Controller
{
    //
    public function create()
    {
        $equips = Equip::all();
        $augment = new Augment;
        return view('augment/create', compact('equips', 'augment'));
    }

    public function store(Request $request)
    {
        $augment = new Augment;
        $augment->equip_id = $request->equip_id;
        $augment->rank = $request->rank;
        $augment->status = $request->status;
        $augment->type = $request->type;
        $augment->hide_status = $request->hide_status;
        $augment->save();
        return redirect()->route('augment.create');
    }

}
