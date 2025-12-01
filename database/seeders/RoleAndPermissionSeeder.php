<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsIds = array(
            "guest-activity",
            "manage-articles",
            "customer-activity",
            "branch-manager-activity",
            "super-admin-activity"
        );

        foreach($permissionsIds as $permissionId){
            Permission::create(['name' => $permissionId]);
        }

        $moderatorRole = Role::create(['name' => 'moderator']);
        $moderatorRole->givePermissionTo([
            'manage-articles',
            'guest-activity',
        ]);

        $customerRole = Role::create(['name' => 'customer']);
        $customerRole->givePermissionTo([
            'customer-activity',
            'guest-activity',
        ]);

        $branchManagerRole = Role::create(['name' => 'branch-manager']);
        $branchManagerRole->givePermissionTo([
            'branch-manager-activity',
            'guest-activity',
        ]);

        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->givePermissionTo([
            'super-admin-activity',
            'branch-manager-activity',
            'manage-articles',
            'guest-activity',
        ]);
    }
}
