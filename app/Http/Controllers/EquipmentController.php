<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equip;
use App\Models\EquipPart;
use App\Models\Part;
use App\Models\Type;

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
        $results = Equip::where('part_id', $request->part_id)->get();
        
        return response()->json($results);
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
        if (!empty(trim($request->a_status))) {
            $equip->a_status = $request->a_status;
            $equip->aug = true;
        }
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
