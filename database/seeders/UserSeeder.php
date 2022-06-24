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
      
        //USUARIOS DOCTORES
        
         User::create([
            'name'=>'Alvaro Flores',
            'ci'=>'902050',
            'address'=>'Virgen de Lujan',
            'phone'=>'62354789',
            'email'=>'alvaro@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'11/02/2022',
         ])->assignRole('Doctor');
         Doctor::create([
            'user_id'=>'1',
            'especialidad'=>'Ginecologia'
         ]);
         User::create([
            'name'=>'Obed Andreade',
            'ci'=>'87654321',
            'address'=>'Las Palmas',
            'phone'=>'7854123',
            'email'=>'obed@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'11/02/2022',
         ])->assignRole('Doctor');
         Doctor::create([
            'user_id'=>'2',
            'especialidad'=>'Urologia'
         ]);
         User::create([
            'name'=>'Esteban Hurtado',
            'ci'=>'7833036',
            'address'=>'Barrio Entel Norte Calle 1 Casa 12',
            'phone'=>'73628134',
            'email'=>'esteban@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'12/05/1999',
         ])->assignRole('Doctor');
         Doctor::create([
            'user_id'=>'3',
            'especialidad'=>'Cardiologia'
         ]);


         //USUARIOS SECRETARIOS

         User::create([
            'name'=>'Mirko Ochoa',
            'ci'=>'58931478',
            'address'=>'Barrio Entel Norte Calle 1 Casa 13',
            'phone'=>'78541256',
            'email'=>'mirko@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'12/05/1999',
         ])->assignRole('Secretario');
         Secretarie::create([
            'user_id'=>'4'
         ]);


         //USUARIOS PACIENTES

         User::create([
            'name'=>'Fadua Veliz',
            'ci'=>'98521364',
            'address'=>'Vallegrande',
            'phone'=>'78521364',
            'email'=>'fadua@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'12/05/1999',
         ])->assignRole('Paciente');
         Patient::create([
            'user_id'=>'5'
         ]);
         User::create([
            'name'=>'Luis Fernando Camacho',
            'ci'=>'96587412',
            'address'=>'Plaza 24 de Septiembre',
            'phone'=>'75841265',
            'email'=>'luisfernando@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'12/05/1999',
         ])->assignRole('Paciente');
         Patient::create([
            'user_id'=>'6'
         ]);
         User::create([
            'name'=>'Luchito Arce',
            'ci'=>'42159867',
            'address'=>'Casa Grande del Pueblo',
            'phone'=>'72546987',
            'email'=>'luchito@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'12/05/1999',
         ])->assignRole('Paciente');
         Patient::create([
            'user_id'=>'7'
         ]);
         User::create([
            'name'=>'Maria Galindo',
            'ci'=>'985421',
            'address'=>'Calle sin nombre, El Alto',
            'phone'=>'72169845',
            'email'=>'mariagalindo@gmail.com',
            'password'=>bcrypt('12345678'),
            'fecha_nacimiento'=>'12/05/1999',
         ])->assignRole('Paciente');
         Patient::create([
            'user_id'=>'8'
         ]);

         //USUARIO ADMINISTRADOR
      User::create([
         'name'=>'Administrador',
         'ci'=>'96385274',
         'address'=>'administrador',
         'phone'=>'12345678',
         'email'=>'administrador@gmail.com',
         'password'=>bcrypt('12345678'),
         'fecha_nacimiento'=>'11/02/2022',
      ])->assignRole('Administrador');
    }
}
