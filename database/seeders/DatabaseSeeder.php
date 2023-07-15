<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Part;
use App\Models\Type;
use App\Models\Equip;
use App\Models\EquipPart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $parts = ['Main'=>1, 'Sub'=>2, 'Range'=>3, 'Ammo'=>4, 'Head'=>5, 'Neck'=>6, 'Ear'=>7, 'Body'=>8, 'Hands'=>9, 'Ring'=>10, 'Back'=>11, 'Waist'=>12, 'Legs'=>13, 'Feet'=>14];
        foreach ($parts as $key => $value) {
            Part::create(['name' => $key, 'id' => $value]);
        }
        $eqparts = ['Main'=>1, 'Sub'=>2, 'Range'=>3, 'Ammo'=>4, 'Head'=>5, 'Neck'=>6, 'Ear1'=>7, 'Ear2'=>7, 'Body'=>8, 'Hands'=>9, 'Ring1'=>10, 'Ring2'=>10, 'Back'=>11, 'Waist'=>12, 'Legs'=>13, 'Feet'=>14];
        foreach ($eqparts as $key => $value) {
            EquipPart::create(['name' => $key, 'part_id' => $value]);
        }
        $types = ['格闘武器','短剣','片手剣','両手剣','片手斧','両手斧','両手槍','両手鎌','片手刀','両手刀','片手棍','両手棍','盾','グリップ',
        '投てき','弓術','射撃','釣り竿','矢','ボルト','銃弾','投てき(アクセサリ型)','投てき(消費型)','汁', 'ペットフード','餌',
        '頭装備', '首装備', '耳装備', '右耳装備', '胴装備',  '両手装備', '指輪装備', '背中装備', '腰装備', '両脚装備', '両足装備'];
        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
        // \App\Models\User::factory(10)->create();
        $json = file_get_contents(__DIR__ . '/data/equips.json');
        $equips = json_decode($json, true);
        foreach ($equips as $equip) {
            Equip::create($equip);
        }

    }
}
