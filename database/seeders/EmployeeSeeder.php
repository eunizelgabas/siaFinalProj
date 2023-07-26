<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Employee::factory(10)->create();
        $emp = [
            [
                'last_name' => 'Gabas',
                'first_name' => 'Euni',
                'department' => 'Toyota',
                'position' => 'Manager',
                'phone_no' => '09121244888',
                'email' => 'eunizelgabas24@gmail.com',
            ],
            [
                'last_name' => 'Gabas',
                'first_name' => 'Eula',
                'department' => 'IDK',
                'position' => 'Manager',
                'phone_no' => '09518994585',
                'email' => 'gabaseula@gmail.com',
            ],
            [
                'last_name' => 'Gabs',
                'first_name' => 'Euls',
                'department' => 'Bohol',
                'position' => 'Manager',
                'phone_no' => '0987654321',
                'email' => 'eulagabas28@gmail.com',
            ],
            [
                'last_name' => 'Gabas',
                'first_name' => 'Eunizel',
                'department' => 'IT',
                'position' => 'Cloud Engineer',
                'phone_no' => '09518994185',
                'email' => 'eunizelgabas06@gmail.com',
            ],
            [
                'last_name' => 'Requierme',
                'first_name' => 'Euniz',
                'department' => 'Promoter',
                'position' => 'Salesman',
                'phone_no' => '09518994185',
                'email' => 'geunizel@gmail.com',
            ],
            [
                'last_name' => 'Gbas',
                'first_name' => 'Slue',
                'department' => 'Finance',
                'position' => 'Consultant',
                'phone_no' => '09518994185',
                'email' => 'eulagabas00@gmail.com',
            ],
            [
                'last_name' => 'Cosgafa',
                'first_name' => 'Lyra',
                'department' => 'Medical',
                'position' => 'Nurse',
                'phone_no' => '09518994185',
                'email' => 'lyra12552@gmail.com',
            ],
            [
                'last_name' => 'Mellomida',
                'first_name' => 'Justine',
                'department' => 'Elementary',
                'position' => 'Teacher',
                'phone_no' => '09518994185',
                'email' => 'justinemellomida70@gmail.com',
            ],
            [
                'last_name' => 'Gabas',
                'first_name' => 'Edgardo',
                'department' => 'LandBank',
                'position' => 'Manager',
                'phone_no' => '09518994185',
                'email' => 'edgardogabas2@gmail.com',
            ],
            [
                'last_name' => 'Requierme',
                'first_name' => 'Adel',
                'department' => 'Staff',
                'position' => 'Janitor',
                'phone_no' => '09518994185',
                'email' => 'eunicegabas9@gmail.com',
            ],
        ];
        foreach($emp as $e) {
            Employee::create($e);
        }
    }
}
