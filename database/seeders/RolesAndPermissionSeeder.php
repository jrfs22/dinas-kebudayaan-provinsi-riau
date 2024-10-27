<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Berita
        $permissionBerita = ['tambah berita', 'lihat berita', 'ubah berita', 'hapus berita'];
        $permissionKategoriBerita = ['tambah kategory berita', 'lihat kategory berita', 'ubah kategory berita', 'hapus kategory berita'];

        // Berita
        $permissionGallery = ['tambah gallery', 'lihat gallery', 'ubah gallery', 'hapus gallery'];
        $permissionKategoriGallery = ['tambah kategori gallery', 'lihat kategori gallery', 'ubah kategori gallery', 'hapus kategori gallery'];

        // Agenda
        $permissionAgenda = ['tambah agenda', 'lihat agenda', 'ubah agenda', 'hapus agenda'];
        $permissionKategoriAgenda = ['tambah kategori agenda', 'lihat kategori agenda', 'ubah kategori agenda', 'hapus kategori agenda'];

        // klasifikasi
        $permissionKlasifikasi = ['tambah klasifikasi', 'lihat klasifikasi', 'ubah klasifikasi', 'hapus klasifikasi'];
        $permissionKategoriKlasifikasi = ['tambah kategori klasifikasi', 'lihat kategori klasifikasi', 'ubah kategori klasifikasi', 'hapus kategori klasifikasi'];

        // PPID
        $permissionPpid = ['tambah ppid', 'lihat ppid', 'ubah ppid', 'hapus ppid'];
        $permissionKategoriPpid = ['tambah kategori ppid', 'lihat kategori ppid', 'ubah kategori ppid', 'hapus kategori ppid'];
        $permissionPpidFiles= ['tambah ppid files', 'lihat ppid files', 'ubah ppid files', 'hapus ppid files'];

        // Survey
        $permissionSurvey = ['tambah survey', 'lihat survey', 'ubah survey', 'hapus survey'];
        $permissionPertanyaanSurvey = ['tambah pertanyaan survey', 'lihat pertanyaan survey', 'ubah pertanyaan survey', 'hapus pertanyaan survey'];
        $permissionRepondenSurvey = ['lihat responden'];
        $permissionRepondenPesan = ['lihat pesan'];

        $profiles = [
            'ubah sejarah', 'ubah struktur', 'ubah visi', 'ubah misi', 'ubah sambutan', 'update fungsi', 'update kontak', 'tambah kontak', 'hapus kontak', 'tambah sop', 'ubah sop', 'hapus sop'
        ];

        $settings = [
            'ubah breadcrumb', 'ubah hero', 'ubah tentang kami', 'ubah upt museum', 'ubah sitari', 'ubah footer'
        ];

        $pengguna = [
            'lihat pengguna', 'tambah pengguna', 'hapus pengguna', 'lihat hak akses', 'tambah hak akses', 'ubah hak akses', 'delete hak akses'
        ];

        $permissions = array_merge(
            $permissionBerita,
            $permissionKategoriBerita,
            $permissionGallery,
            $permissionKategoriGallery,
            $permissionAgenda,
            $permissionKategoriAgenda,
            $permissionKlasifikasi,
            $permissionKategoriKlasifikasi,
            $permissionPpid,
            $permissionKategoriPpid,
            $permissionPpidFiles,
            $permissionSurvey,
            $permissionPertanyaanSurvey,
            $permissionRepondenSurvey,
            $permissionRepondenPesan,
            $profiles,
            $settings,
            $pengguna,
        );

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $AdminPermissions = array_merge(
            $permissionBerita,
            $permissionGallery,
            $permissionGallery,
            $permissionAgenda,
            $permissionKlasifikasi
        );

        $adminRole->givePermissionTo($AdminPermissions);

        $superAdminRole = Role::create(['name' => 'super admin']);
        $superAdminRole->givePermissionTo(Permission::all());
    }
}
