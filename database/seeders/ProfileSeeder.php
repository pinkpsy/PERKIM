<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'Nama Pejabat',
            'position' => 'Kepala Dinas',
            'birth_place' => 'Tempat Lahir',
            'birth_date' => now(),
            'office_address' => 'Alamat Kantor',
        ]);
    }
}
