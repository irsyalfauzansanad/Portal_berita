<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Hobi;
use App\Mahasiswa;
use App\wali;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RelasiSeeder::class);
    }
}
