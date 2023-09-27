<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //المحافظات
            ['name' => 'governorates-list', 'ar_name' => "قائمة المحافظات", "routes" => "governorates.index"],
            ['name' => 'governorates-create', 'ar_name' => "اضافة محافظه", "routes" => "governorates.create,governorates.store"],
            ['name' => 'governorates-edit', 'ar_name' => "تعديل محافظه", "routes" => "governorates.edit,governorates.update"],
            ['name' => 'governorates-delete', 'ar_name' => "حذف محافظه", "routes" => "governorates.destroy"],
            //المدن
            ['name' => 'cities-list', 'ar_name' => "قائمة المدن", 'routes' => "cities.index"],
            ['name' => 'cities-create', 'ar_name' => "اضافة مدينه", 'routes' => "cities.create,cities.store"],
            ['name' => 'cities-edit', 'ar_name' => "تعديل مدينه", 'routes' => "cities.edit,cities.update"],
            ['name' => 'cities-delete', 'ar_name' => "حذف مدينه", 'routes' => "cities.destroy"],
            //الاقسام
            ['name' => 'categories-list', 'ar_name' => "قائمة الاقسام", "routes" => "categories.index"],
            ['name' => 'categories-create', 'ar_name' => "اضافة قسم", "routes" => "categories.create,categories.store"],
            ['name' => 'categories-edit', 'ar_name' => "تعديل قسم", "routes" => "categories.edit,categories.update"],
            ['name' => 'categories-delete', 'ar_name' => "حذف قسم", "routes" => "categories.destroy"],
            //المقالات
            ['name' => 'articles-list', 'ar_name' => "قائمة المقالات", "routes" => "articales.index"],
            ['name' => 'articles-create', 'ar_name' => "اضافة مقال", "routes" => "articales.create,articles.store"],
            ['name' => 'articles-edit', 'ar_name' => "تعديل مقال", "routes" => "articales.edit,articles.update"],
            ['name' => 'articles-delete', 'ar_name' => "حذف مقال", "routes" => "articales.destroy"],
            //الرتب
            ['name' => 'roles-list', 'ar_name' => "قائمة الرتب", "routes" => "roles.index"],
            ['name' => 'roles-create', 'ar_name' => "اضافة رتبه", "routes" => "roles.create,roles.store"],
            ['name' => 'roles-edit', 'ar_name' => "تعديل الرتب", "routes" => "roles.edit,roles.update"],
            ['name' => 'roles-delete', 'ar_name' => "حذف رتبه", "routes" => "roles.destroy"],
            //العملاء
            ['name' => 'clients-list', 'ar_name' => "قائمة العملاء", "routes" => "clients.index"],
            ['name' => 'clients-create', 'ar_name' => "اضافة عميل", "routes" => "clients.create,clients.store"],
            ['name' => 'clients-edit', 'ar_name' => "تعديل عميل", "routes" => "clients.edit,clients.update"],
            ['name' => 'clients-delete', 'ar_name' => "حذف عميل", "routes" => "clients.destroy"],
            //المستخدمين
            ['name' => 'users-list', 'ar_name' => "قائمة المستخدمين", "routes" => "users.index"],
            ['name' => 'users-create', 'ar_name' => "اضافة مستخدم", "routes" => "users.create,users.store"],
            ['name' => 'users-edit', 'ar_name' => "تعديل مستخدم", "routes" => "users.edit,users.update"],
            ['name' => 'users-delete', 'ar_name' => "حذف مستخدم", "routes" => "users.destroy"],
            //طلبات التبرع
            ['name' => 'donations-list', 'ar_name' => "قائمة طلبات التبرع", "routes" => "donations.index"],
            ['name' => 'donations-create', 'ar_name' => "اضافة طلب تبرع", "routes" => "donations.create,donations.store"],
            ['name' => 'donations-edit', 'ar_name' => "تعديل طلب تبرع", "routes" => "donations.edit,donations.update"],
            ['name' => 'donations-delete', 'ar_name' => "حذف طلب تبرع", "routes" => "donations.destroy"],
            //الرسايل
            ['name' => 'contacts-index', 'ar_name' => "الرسايل", "routes" => "contacts.index"],
            ['name' => 'contacts-delete', 'ar_name' => "حذف الرسايل", "routes" => "contacts.destroy"],
            //الاعدادات
            ['name' => 'settings-index', 'ar_name' => "الاعدادات", "routes" => "settings.index"],
            ['name' => 'settings-update', 'ar_name' => "تعديل الاعدادات", "routes" => "settings.update"],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'ar_name' => $permission['ar_name'],
                'routes' => $permission['routes']
            ]);
        }
    }
}
