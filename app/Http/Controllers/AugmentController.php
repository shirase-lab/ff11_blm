<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Augment;
use App\Models\Equip;

class AugmentController extends Controller
{
    //
    public function create($equip_id)
    {
        $equip = Equip::find($equip_id)->name;
        $augment = new Augment;
        return view('equips/augments/create', compact('equip', 'augment', 'equip_id'));
    }

    public function store(Request $request, $equip_id)
    {
        Log::info($equip_id);
        $augment = new Augment;
        $augment->equip_id = $equip_id;
        $augment->_type = $request->type;
        $augment->_rank = $request->rank;
        $augment->status = $request->status;
        $augment->hide_status = $request->hide_status || '';
        $augment->save();
        return redirect()->route('augment.create', ['equip_id' => $equip_id]);
    }

}
