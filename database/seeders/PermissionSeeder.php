<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'dashboard', 'ar_name' => 'لوحة التحكم']);
        Permission::create(['name' => 'view stats', 'ar_name' => 'عرض الإحصائيات']);  // 1
        $role->syncPermissions([1]);

        $role = Role::create(['name' => 'users', 'ar_name' => 'الأعضاء']);
        Permission::create(['name' => 'view users', 'ar_name' => 'عرض الأعضاء']); // 2
        Permission::create(['name' => 'show user', 'ar_name' => 'مشاهدة عضو']); // 3
        Permission::create(['name' => 'create users', 'ar_name' => 'إضافة الأعضاء']); // 4
        Permission::create(['name' => 'edit users', 'ar_name' => 'تعديل الأعضاء']); // 5
        Permission::create(['name' => 'delete users', 'ar_name' => 'حذف الأعضاء']); // 6
        $role->syncPermissions([2,3,4,5,6]);

        /* 
            // Adding users permissions to the admin.
            DB::table('model_has_permissions')->insert([
                ['permission_id' => 1, 'model_type' => 'App\Models\User', 'model_id' => 1],
                ['permission_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 1],
                ['permission_id' => 3, 'model_type' => 'App\Models\User', 'model_id' => 1],
                ['permission_id' => 4, 'model_type' => 'App\Models\User', 'model_id' => 1],
                ['permission_id' => 5, 'model_type' => 'App\Models\User', 'model_id' => 1],
                ['permission_id' => 6, 'model_type' => 'App\Models\User', 'model_id' => 1],
            ]); 
        */
        $user = User::first(); $user->syncRoles([1,2]);

        $role = Role::create(['name' => 'issues', 'ar_name' => 'القضايا']);
        Permission::create(['name' => 'view issues', 'ar_name' => 'عرض القضايا']);
        Permission::create(['name' => 'show issue', 'ar_name' => 'مشاهدة قضية']);
        Permission::create(['name' => 'create issues', 'ar_name' => 'إضافة القضايا']);
        Permission::create(['name' => 'edit issues', 'ar_name' => 'تعديل القضايا']);
        Permission::create(['name' => 'delete issues', 'ar_name' => 'حذف القضايا']); //11
        $role->syncPermissions([7,8,9,10,11]);

        $role = Role::create(['name' => 'clients', 'ar_name' => 'الموكلين']);
        Permission::create(['name' => 'view clients', 'ar_name' => 'عرض الموكلين']);
        Permission::create(['name' => 'show client', 'ar_name' => 'مشاهدة موكل']);
        Permission::create(['name' => 'create clients', 'ar_name' => 'إضافة الموكلين']);
        Permission::create(['name' => 'edit clients', 'ar_name' => 'تعديل الموكلين']);
        Permission::create(['name' => 'delete clients', 'ar_name' => 'حذف الموكلين']); //16
        $role->syncPermissions([12,13,14,15,16]);

        $role = Role::create(['name' => 'receipt-vouchers', 'ar_name' => 'سندات القبض']);
        Permission::create(['name' => 'view receipt-vouchers', 'ar_name' => 'عرض سندات القبض']);
        Permission::create(['name' => 'show receipt-voucher', 'ar_name' => 'مشاهدة سند القبض']);
        Permission::create(['name' => 'create receipt-vouchers', 'ar_name' => 'إضافة سندات القبض']);
        Permission::create(['name' => 'edit receipt-vouchers', 'ar_name' => 'تعديل سندات القبض']);
        Permission::create(['name' => 'delete receipt-vouchers', 'ar_name' => 'حذف سندات القبض']); // 21
        $role->syncPermissions([17,18,19,20,21]);

        $role = Role::create(['name' => 'expert-issues', 'ar_name' => 'قضايا الخبراء']);
        Permission::create(['name' => 'view expert-issues', 'ar_name' => 'عرض قضايا الخبراء']);
        Permission::create(['name' => 'show expert-issue', 'ar_name' => 'مشاهدة قضية خبير']);
        Permission::create(['name' => 'create expert-issues', 'ar_name' => 'إضافة قضايا الخبراء']);
        Permission::create(['name' => 'edit expert-issues', 'ar_name' => 'تعديل قضايا الخبراء']);
        Permission::create(['name' => 'delete expert-issues', 'ar_name' => 'حذف قضايا الخبراء']); //26
        $role->syncPermissions([22,23,24,25,26]);

        $role = Role::create(['name' => 'session-rolls', 'ar_name' => 'رول الجلسات']);
        Permission::create(['name' => 'view session-rolls', 'ar_name' => 'عرض رول الجلسات']);
        Permission::create(['name' => 'show session-roll', 'ar_name' => 'مشاهدة رول الجلسة']);
        Permission::create(['name' => 'create session-rolls', 'ar_name' => 'إضافة رول الجلسات']);
        Permission::create(['name' => 'edit session-rolls', 'ar_name' => 'تعديل رول الجلسات']);
        Permission::create(['name' => 'delete session-rolls', 'ar_name' => 'حذف رول الجلسات']); //31
        $role->syncPermissions([27,28,29,30,31]);
    }
}
