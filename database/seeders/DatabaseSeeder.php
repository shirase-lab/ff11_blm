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

    }
}
