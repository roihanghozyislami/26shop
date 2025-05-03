<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function userpage(Request $request){

        $query = DB::table('user'); 

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('id_user', $search); // cocokkan ID secara tepat
            });
        }

        $users = $query->paginate(10); // atau ->get() jika tidak ingin paginate

        return view('user', ['user' => $users]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:1',
            'level' => 'required|string',
        ]);

        // Cek jika level tidak valid
        if ($request->input('level') === 'none') {
            return redirect()->back()->with('gagal', 'Level tidak boleh "none".');
        }

        // Simpan ke database
        DB::table('user')->insert([
            'nama' => $request->input('nama'),
            'password' => Hash::make($request->input('password')),
            'level' => $request->input('level'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('berhasil', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi dasar
        $request->validate([
            'nama' => 'required|string|max:255',
            'level' => 'required|string',
            'password' => 'nullable|string|min:1',
        ]);

        if ($request->input('level') === 'none') {
            return redirect()->back()->with('gagal', 'Level tidak boleh "none".');
        }

        // Data untuk update
        $data = [
            'nama' => $request->input('nama'),
            'level' => $request->input('level'),
            'updated_at' => now(),
        ];

        // Jika password diisi, update juga
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }

        DB::table('user')->where('id_user', $id)->update($data);

        return redirect()->back()->with('berhasil', 'User berhasil diperbarui.');
    }

    public function delete($id)
    {
        DB::table('user')->where('id_user', $id)->delete();

        return redirect()->back()->with('berhasil', 'User berhasil dihapus.');
    }

}
