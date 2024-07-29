<?php

namespace Database\Seeders;

use App\Models\EmployeeAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeAssignment::create([
            'assignment_name' => 'Tugas Kantor',
        ]);
        EmployeeAssignment::create([
            'assignment_name' => 'Sales',
        ]);
    }
}
