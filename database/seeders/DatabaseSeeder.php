<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Magic;
use App\Models\MagicCoefficient;
use App\Models\Part;
use App\Models\Enemy;
use App\Models\Type;
use App\Models\Equip;
use App\Models\EquipPart;
use App\Models\Augment;
use App\Models\Resist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $json = file_get_contents(__DIR__ . '/data/augments.json');
        $augments = json_decode($json, true);
        foreach ($augments as $augment) {
            Augment::create($augment);
        }

        $json = file_get_contents(__DIR__ . '/data/resist.json');
        $resists = json_decode($json, true);
        foreach ($resists as $resist) {
            Resist::create($resist);
        }

        $json = file_get_contents(__DIR__ . '/data/enemies.json');
        $enemies = json_decode($json, true);
        foreach ($enemies as $enemy) {
            Enemy::create($enemy);
        }

        $json = file_get_contents(__DIR__ . '/data/equips.json');
        $equips = json_decode($json, true);
        foreach ($equips as $equip) {
            Equip::create($equip);
        }

        $json = file_get_contents(__DIR__ . '/data/parts.json');
        $parts = json_decode($json, true);
        foreach ($parts as $part) {
            Part::create($part);
        }

        $json = file_get_contents(__DIR__ . '/data/types.json');
        $types = json_decode($json, true);
        foreach ($types as $type) {
            Type::create($type);
        }

        $json = file_get_contents(__DIR__ . '/data/equip_parts.json');
        $equip_parts = json_decode($json, true);
        foreach ($equip_parts as $equip_part) {
            EquipPart::create($equip_part);
        }

        $json = file_get_contents(__DIR__ . '/data/magics.json');
        $magics = json_decode($json, true);
        foreach ($magics as $magic) {
            Magic::create($magic);
        }

        $json = file_get_contents(__DIR__ . '/data/magic_coefficients.json');
        $magic_coefficients = json_decode($json, true);
        foreach ($magic_coefficients as $magic_coefficient) {
            MagicCoefficient::create($magic_coefficient);
        }


    }
}
