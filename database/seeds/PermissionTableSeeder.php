<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Permission::insert([
          // Rol modülü izin
          [
            'name' => 'list-roles',
            'display_name' => 'Rolleri Görüntüleme',
          ],
          [
            'name' => 'add-role',
            'display_name' => 'Rol Ekleme',
          ],
          [
            'name' => 'edit-role',
            'display_name' => 'Rol Düzenleme',
          ],
          [
            'name' => 'delete-role',
            'display_name' => 'Rol Silme',
          ],

          // İzin modülü izin
          [
            'name' => 'list-permissions',
            'display_name' => 'İzinleri Görüntüleme',
          ],
          [
            'name' => 'add-permission',
            'display_name' => 'İzin Ekleme',
          ],
          [
            'name' => 'edit-permission',
            'display_name' => 'İzin Düzenleme',
          ],
          [
            'name' => 'delete-permission',
            'display_name' => 'İzin Silme',
          ],

          // Kullanıcı modülü izin
          [
            'name' => 'list-users',
            'display_name' => 'Kullanıcıları Görüntüleme',
          ],
          [
            'name' => 'add-user',
            'display_name' => 'Kullanıcı Ekleme',
          ],
          [
            'name' => 'edit-user',
            'display_name' => 'Kullanıcı Düzenleme',
          ],
          [
            'name' => 'delete-user',
            'display_name' => 'Kullanıcı Silme',
          ],

          // Statik İçerikler modülü izin
          [
            'name' => 'list-statics',
            'display_name' => 'Statik İçerikleri Görüntüleme',
          ],
          [
            'name' => 'add-static',
            'display_name' => 'Statik İçerik Ekleme',
          ],
          [
            'name' => 'edit-static',
            'display_name' => 'Statik İçerik Düzenleme',
          ],
          [
            'name' => 'delete-static',
            'display_name' => 'Statik İçerik Silme',
          ],

          // Menü modülü izin
          [
            'name' => 'list-menus',
            'display_name' => 'Menüleri Görüntüleme',
          ],
          [
            'name' => 'add-menu',
            'display_name' => 'Menü Ekleme',
          ],
          [
            'name' => 'edit-menu',
            'display_name' => 'Menü Düzenleme',
          ],
          [
            'name' => 'delete-menu',
            'display_name' => 'Menü Silme',
          ],

          // Sayfa modülü izin
          [
            'name' => 'list-pages',
            'display_name' => 'Sayfaları Görüntüleme',
          ],
          [
            'name' => 'add-page',
            'display_name' => 'Sayfa Ekleme',
          ],
          [
            'name' => 'edit-page',
            'display_name' => 'Sayfa Düzenleme',
          ],
          [
            'name' => 'delete-page',
            'display_name' => 'Sayfa Silme',
          ],

          // Müşteri Grupları
          [
            'name' => 'list-customergroups',
            'display_name' => 'Müşteri Grupları Görüntüleme',
          ],
          [
            'name' => 'add-customergroup',
            'display_name' => 'Müşteri Grubu Ekleme',
          ],
          [
            'name' => 'edit-customergroup',
            'display_name' => 'Müşteri Grubu Düzenleme',
          ],
          [
            'name' => 'delete-customergroup',
            'display_name' => 'Müşteri Grubu Silme',
          ],

          // Öznitelikler
          [
            'name' => 'list-attributes',
            'display_name' => 'Müşteri Grupları Görüntüleme',
          ],
          [
            'name' => 'add-attribute',
            'display_name' => 'Müşteri Grubu Ekleme',
          ],
          [
            'name' => 'edit-attribute',
            'display_name' => 'Müşteri Grubu Düzenleme',
          ],
          [
            'name' => 'delete-attribute',
            'display_name' => 'Müşteri Grubu Silme',
          ],

          // Kategoriler
          [
            'name' => 'list-categories',
            'display_name' => 'Müşteri Grupları Görüntüleme',
          ],
          [
            'name' => 'add-category',
            'display_name' => 'Müşteri Grubu Ekleme',
          ],
          [
            'name' => 'edit-category',
            'display_name' => 'Müşteri Grubu Düzenleme',
          ],
          [
            'name' => 'delete-category',
            'display_name' => 'Müşteri Grubu Silme',
          ],

          // Ürünler
          [
            'name' => 'list-products',
            'display_name' => 'Müşteri Grupları Görüntüleme',
          ],
          [
            'name' => 'add-product',
            'display_name' => 'Müşteri Grubu Ekleme',
          ],
          [
            'name' => 'edit-product',
            'display_name' => 'Müşteri Grubu Düzenleme',
          ],
          [
            'name' => 'delete-product',
            'display_name' => 'Müşteri Grubu Silme',
          ],
        ]);

        $role = \App\Role::where('name', 'owner')->first();
        $perms = \App\Permission::where('id', '!=', 1)->get();

        $role->attachPermissions($perms);
    }
}
