<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Doctor']);
        $role3 = Role::create(['name' => 'Secretario']);
        $role4 = Role::create(['name' => 'Paciente']);

        Permission::create(['name' => 'admins.index'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'admins.edit'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'admins.create' ])->syncRoles([$role1]);
        Permission::create(['name' => 'admins.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'doctors.index'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'doctors.edit'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'doctors.create' ])->syncRoles([$role1]);
        Permission::create(['name' => 'doctors.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'doctors.show'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'doctors.agenda' ])->syncRoles([$role2]);

        Permission::create(['name' => 'secretaries.index'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'secretaries.edit'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'secretaries.create' ])->syncRoles([$role1]);
        Permission::create(['name' => 'secretaries.destroy'])->syncRoles([$role1]);
        Permission::create(['name' => 'secretaries.show'   ])->syncRoles([$role1]);

        Permission::create(['name' => 'patients.index'  ])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'patients.edit'   ])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'patients.create' ])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'patients.destroy'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'patients.show'   ])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'citas.index'  ])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'citas.edit'   ])->syncRoles([$role3]);
        Permission::create(['name' => 'citas.create' ])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'citas.destroy'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'citas.show'   ])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'receta.index'  ])->syncRoles([$role4]);
        Permission::create(['name' => 'receta.create' ])->syncRoles([$role2]);
        Permission::create(['name' => 'receta.show'   ])->syncRoles([$role2,$role4]);

        Permission::create(['name' => 'historico.index'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'historico.show'   ])->syncRoles([$role1]);
    
        
    }
}
