<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Secretarie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Doctor
        
         User::create([
            'name'=>'Alvaro Flores',
            'ci'=>'12345678',
            'address'=>'No se we',
            'phone'=>'12345678',
            'email'=>'alvaro@prueba.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'11/02/2022',
         ]);
         Doctor::create([
            'user_id'=>'1',
            'especialidad'=>'Ginecologo'
         ]);
         User::create([
            'name'=>'Obed Andreade',
            'ci'=>'87654321',
            'address'=>'No se we',
            'phone'=>'87654321',
            'email'=>'obed@prueba.com',
            'password'=>bcrypt('87654321'),
            'fecha_nacimiento'=>'11/02/2022',
         ]);
         Doctor::create([
            'user_id'=>'2',
            'especialidad'=>'Urologo'
         ]);
         User::create([
            'name'=>'Esteban Hurtado',
            'ci'=>'7833036',
            'address'=>'Barrio Entel Norte Calle 1 Casa 12',
            'phone'=>'73628134',
            'email'=>'esteban@prueba.com',
            'password'=>bcrypt('7833036'),
            'fecha_nacimiento'=>'19/05/1999',
         ]);
         Doctor::create([
            'user_id'=>'3',
            'especialidad'=>'Cardiologo'
         ]);
         User::create([
            'name'=>'Mirko Ochoa',
            'ci'=>'11111111',
            'address'=>'Barrio Entel Norte Calle 1 Casa 13',
            'phone'=>'11111111',
            'email'=>'mirko@prueba.com',
            'password'=>bcrypt('11111111'),
            'fecha_nacimiento'=>'19/05/1999',
         ]);
         Secretarie::create([
            'user_id'=>'4'
         ]);
         User::create([
            'name'=>'Fadua Veliz',
            'ci'=>'2222222',
            'address'=>'no se we',
            'phone'=>'2222222',
            'email'=>'fadua@prueba.com',
            'password'=>bcrypt('2222222'),
            'fecha_nacimiento'=>'19/05/1999',
         ]);
         Patient::create([
            'user_id'=>'5'
         ]);
         User::create([
            'name'=>'Paciente Veliz',
            'ci'=>'333333',
            'address'=>'no se we',
            'phone'=>'333333',
            'email'=>'paciente@prueba.com',
            'password'=>bcrypt('333333'),
            'fecha_nacimiento'=>'19/05/1999',
         ]);
         Patient::create([
            'user_id'=>'6'
         ]);
         User::create([
            'name'=>'Paciente Prueba',
            'ci'=>'44444444',
            'address'=>'no se we',
            'phone'=>'44444444',
            'email'=>'paciente@prueba.com',
            'password'=>bcrypt('44444444'),
            'fecha_nacimiento'=>'19/05/1999',
         ]);
         Patient::create([
            'user_id'=>'7'
         ]);
         User::create([
            'name'=>'Prueba Paciente',
            'ci'=>'5555555',
            'address'=>'no se we',
            'phone'=>'Prueba',
            'email'=>'prueba@prueba.com',
            'password'=>bcrypt('Pruebagit'),
            'fecha_nacimiento'=>'19/05/1999',
         ]);
         Patient::create([
            'user_id'=>'8'
         ]);

    }
}
