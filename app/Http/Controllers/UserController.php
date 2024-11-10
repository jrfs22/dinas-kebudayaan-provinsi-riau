<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\DepartementModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'super admin')->get();

        $departement = DepartementModel::whereNot('name', 'Disbud')->get();

        return view('after-login.pengguna.index', compact('users', 'departement'));
    }

    public function profile()
    {
        return view('after-login.pengguna.profil');
    }

    public function getPermissionsByRoleName($roleName)
    {
        $role = Role::where('name', $roleName)->with('permissions')->first();

        return $role ? $role->permissions : collect();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,id',
                'departement_id' => 'required|exists:departement,id',
            ], [
                'name.required' => 'Nama Pengguna tidak boleh kosong.',
                'email.required' => 'Email pengguna tidak boleh kosong.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'departement_id.required' => 'Departement tidak boleh kosong.',
                'departement_id.exists' => 'Departement tidak ditemukan.',
            ]);

            $user = new User();

            $user->fill($request->only([
                'name', 'email', 'departement_id'
            ]));

            $user->password = Hash::make($request->email);
            $user->role = 'admin';

            if($user->save()) {
                $role = Role::findByName('admin');
                $user->assignRole($role);
            }

            $this->alert(
                'Pengguna',
                'pengguna berhasil ditambahkan.',
                'success'
            );
            return redirect()->route('pengguna');
        } catch (Exception $e) {
            $this->alert(
                'Pengguna',
                $e->getMessage(),
                'error'
            );
            return redirect()->route('pengguna');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,id,' . $id,
                'departement_id' => 'required|exists:departement,id',
            ], [
                'name.required' => 'Nama Pengguna tidak boleh kosong.',
                'email.required' => 'Email pengguna tidak boleh kosong.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'departement_id.required' => 'Departement tidak boleh kosong.',
                'departement_id.exists' => 'Departement tidak ditemukan.',
            ]);

            $user = User::findOrFail($id);

            $user->fill($request->only([
                'name', 'email', 'departement_id'
            ]));

            $user->password = Hash::make($request->email);

            $user->update();

            $this->alert(
                'Pengguna',
                'pengguna berhasil diubah.',
                'success'
            );
            return redirect()->route('pengguna');
        } catch (Exception $e) {
            $this->alert(
                'Pengguna',
                'Pengguna tidak berhasil diubah.',
                'error'
            );
            return redirect()->route('pengguna');
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email,' . auth()->user()->id,
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ], [
                'name.required' => 'Nama tidak boleh kosong.',
                'email.required' => 'Email tidak boleh kosong.',
                'email.unique' => 'Email terkait sudah ada.',
                'old_password.required' => 'Password lama tidak boleh kosong.',
                'new_password.required' => 'Password baru tidak boleh kosong.',
            ]);

            if (!Hash::check($request->old_password, Auth::user()->password)) {
                $this->alert(
                    'Terjadi kesalahan',
                    'Password lama tidak sesuai.',
                    'error'
                );
                return redirect()->route('beranda');
            }

            Auth::user()->update([
                'password' => Hash::make($request->new_password),
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $this->alert(
                'Profil',
                'Profil berhasil diubah.',
                'success'
            );

            return redirect()->route('pengguna.profile');
        } catch (Exception $e) {
            $this->alert(
                'Profil',
                'Profil tidak berhasil diubah.',
                'error'
            );
            return redirect()->route('pengguna.profile');
        }
    }
}
