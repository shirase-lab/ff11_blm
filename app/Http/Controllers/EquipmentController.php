<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equip;

class EquipmentController extends Controller
{
    //
    public function index()
    {
        $Main = Equip::where('part', 'Main')->get();
        $Sub = Equip::where('part', 'Sub')->get();
        $Range = Equip::where('part', 'Range')->get();
        $Ammo = Equip::where('part', 'Ammo')->get();
        $Head = Equip::where('part', 'Head')->get();
        $Neck = Equip::where('part', 'Neck')->get();
        $Ear = Equip::where('part', 'Ear')->get();
        $Body = Equip::where('part', 'Body')->get();
        $Hands = Equip::where('part', 'Hands')->get();
        $Ring = Equip::where('part', 'Ring')->get();
        $Back = Equip::where('part', 'Back')->get();
        $Waist = Equip::where('part', 'Waist')->get();
        $Legs = Equip::where('part', 'Legs')->get();
        $Feet = Equip::where('part', 'Feet')->get();

        return view('index', compact(
            'Main',
            'Sub',
            'Range',
            'Ammo',
            'Head',
            'Neck',
            'Ear',
            'Body',
            'Hands',
            'Ring',
            'Back',
            'Waist',
            'Legs',
            'Feet',
        ));
    }
}
