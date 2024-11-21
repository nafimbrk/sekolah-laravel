<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'aiu', 'gender' => 'p', 'nis' => '893998', 'class_id' => 2],
        //     ['name' => 'budi', 'gender' => 'l', 'nis' => '9549859', 'class_id' => 2],
        //     ['name' => 'siti', 'gender' => 'p', 'nis' => '984557', 'class_id' => 1],
        //     ['name' => 'tono', 'gender' => 'l', 'nis' => '0898998', 'class_id' => 3]
        // ];


        // foreach ($data as $value) {
        //     Student::insert([
        //         'name' => $value['name'], 
        //         'gender' => $value['gender'], 
        //         'nis' => $value['nis'], 
        //         'class_id' => $value['class_id'], 
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }

        Student::factory()->count(1000)->create();

    }
}
