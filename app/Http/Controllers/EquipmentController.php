<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Augment;
use App\Models\Equip;
use App\Models\EquipPart;
use App\Models\Part;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class EquipmentController extends Controller
{
    public function equip()
    {
        $eqparts = EquipPart::all();
        $results = [];

        return view('equip', compact('eqparts', "results"));
    }

    //
    public function index(Request $request)
    {
        $results = [];
        $results = Equip::with('augments')->where('part_id', $request->part_id)->where(function($query) use ($request) {
            $search = $request->keyword;
            Log::info("keyword:{$search}");
            if (Str::length($search) <= 0) { return; }
            $query->Where('name', 'like', "%{$search}%");
//            $query->orWhere('status', 'like', "%{$search}%");
//            $query->orWhere('hide_status', 'like', "%{$search}%");
//            $query->orWhere('a_status', 'like', "%{$search}%");
        })
        ;
//        Log::info("results:{$results->get()->toJson()}");
        return response()->json($results->get());
    }
    
    public function create()
    {
        $equip = new Equip;
        $parts = Part::all()->pluck("name", "id");
        $types = Type::all()->pluck("name", "id");
        return view('equips/create', compact('equip', 'parts', 'types'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
//        dd($request->status);
        $equip = new Equip;
        $equip->name = $request->name;
        $equip->part_id = $request->part_id;
        $equip->type_id = $request->type_id;
        $equip->quality = $request->quality;
        if (isset($request->ex) && $request->ex == "on") { $equip->ex = true; }
        if (isset($equip->rare) && $request->rare == "on") { $equip->rare = true; }
        $equip->status = $request->status;
        $equip->level = $request->level;
        $equip->jobs = $request->jobs;
        $equip->image_url = $request->image_url;
        $equip->yougo_url = $request->yougo_url;
        $equip->save();
        return redirect()->route('equip.create');
    }

    public function show($id)
    {
        $equip = Equip::find($id);
        return view('equips/show', $equip);
    }

    public function edit($id)
    {
        $equip = Equip::find($id);
        return view('equips/edit');
    }

    public function update(Request $request, $id)
    {
        $equip = Equip::find($id);
        $equip->update($request);
        return redirect()->route('equip.show', ['id' => $id] );
    }
}
