<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equip;
use App\Models\Part;
use App\Models\Type;

class EquipmentController extends Controller
{
    public function equip()
    {
        $Main = Equip::whereHas('part', function($query) { $query->where('name', 'Main'); } )->get();
        $Sub = Equip::whereHas('part', function($query) { $query->where('name', 'Sub'); } )->get();
        $Range = Equip::whereHas('part', function($query) { $query->where('name', 'Range'); } )->get();
        $Ammo = Equip::whereHas('part', function($query) { $query->where('name', 'Ammo'); } )->get();
        $Head = Equip::whereHas('part', function($query) { $query->where('name', 'Head'); } )->get();
        $Neck = Equip::whereHas('part', function($query) { $query->where('name', 'Neck'); } )->get();
        $Ear = Equip::whereHas('part', function($query) { $query->where('name', 'Ear'); } )->get();
        $Body = Equip::whereHas('part', function($query) { $query->where('name', 'Body'); } )->get();
        $Hands = Equip::whereHas('part', function($query) { $query->where('name', 'Hands'); } )->get();
        $Ring = Equip::whereHas('part', function($query) { $query->where('name', 'Ring'); } )->get();
        $Back = Equip::whereHas('part', function($query) { $query->where('name', 'Back'); } )->get();
        $Waist = Equip::whereHas('part', function($query) { $query->where('name', 'Waist'); } )->get();
        $Legs = Equip::whereHas('part', function($query) { $query->where('name', 'Legs'); } )->get();
        $Feet = Equip::whereHas('part', function($query) { $query->where('name', 'Feet'); } )->get();
        return view('equip', compact('Main','Sub','Range','Ammo','Head','Neck','Ear','Body',
            'Hands','Ring','Back','Waist','Legs','Feet'));
    }
    //
    public function index()
    {
        $Main = Equip::whereHas('part', function($query) { $query->where('name', 'Main'); } )->get();
        $Sub = Equip::whereHas('part', function($query) { $query->where('name', 'Sub'); } )->get();
        $Range = Equip::whereHas('part', function($query) { $query->where('name', 'Range'); } )->get();
        $Ammo = Equip::whereHas('part', function($query) { $query->where('name', 'Ammo'); } )->get();
        $Head = Equip::whereHas('part', function($query) { $query->where('name', 'Head'); } )->get();
        $Neck = Equip::whereHas('part', function($query) { $query->where('name', 'Neck'); } )->get();
        $Ear = Equip::whereHas('part', function($query) { $query->where('name', 'Ear'); } )->get();
        $Body = Equip::whereHas('part', function($query) { $query->where('name', 'Body'); } )->get();
        $Hands = Equip::whereHas('part', function($query) { $query->where('name', 'Hands'); } )->get();
        $Ring = Equip::whereHas('part', function($query) { $query->where('name', 'Ring'); } )->get();
        $Back = Equip::whereHas('part', function($query) { $query->where('name', 'Back'); } )->get();
        $Waist = Equip::whereHas('part', function($query) { $query->where('name', 'Waist'); } )->get();
        $Legs = Equip::whereHas('part', function($query) { $query->where('name', 'Legs'); } )->get();
        $Feet = Equip::whereHas('part', function($query) { $query->where('name', 'Feet'); } )->get();
        return view('equips/index', compact('Main','Sub','Range','Ammo','Head','Neck','Ear','Body',
            'Hands','Ring','Back','Waist','Legs','Feet'));
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
