<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equip;

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
        $equipObject = new \SplFileObject(__DIR__ . '/data/equip.csv');
        $equipObject->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );
        $count = 0;
        foreach ($equipObject as $key => $row) {
            if ($key == 0) {
                continue;
            }
            Equip::create([
                'name' => trim($row[0]),
                'part' => trim($row[1]),
                'type' => trim($row[2]),
                'status' => trim($row[3]),
                'level' => trim($row[4]),
                'jobs' => trim($row[5]),
                'image_url' => trim($row[6]),
                'yougo_url' => trim($row[7]),
            ]);
        }
        
        Equip::create([
            'name' => 'ブンジロッド',
            'part' => 'Main',
            'type' => '片手棍',
            'status' => 'Ｄ144 隔216 MP+40 INT+15 MND+15<br>
            命中+40 魔命+40 魔攻+35 魔法ダメージ+248<br>
            片手棍スキル+242 受け流しスキル+242<br>
            魔命スキル+255 マジックバーストダメージ+10<br>
            ケアル回復量+30%<br>',
            'level' => '119',
            'jobs' => '白黒赤召青学風',
            'image_url' => 'https://www.bg-wiki.com/images/1/13/Bunzi%27s_Rod_icon.png',
            'yougo_url' => 'https://wiki.ffo.jp/html/38208.html',
        ]);

        Equip::create([
            'name' => 'アムラピシールド',
            'part' => 'Sub',
            'type' => '盾',
            'status' => '防94 HP+22 MP+58 INT+13 MND+13<br>
            魔命+38 魔攻+38 盾スキル+107<br>
            強化魔法の効果時間+10%<br>',
            'level' => '119',
            'jobs' => '白黒赤吟召学風',
            'image_url' => 'https://www.bg-wiki.com/images/b/be/Ammurapi_Shield_icon.png',
            'yougo_url' => 'https://wiki.ffo.jp/html/35903.html',
        ]);
    }
}
