<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Detail;
use App\Models\Login;
use App\Models\Laporan;


class BackController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function daftar_skck()
    {
        return view('admin.daftar-skck');
    }

    public function perpanjangan_skck()
    {
        return view('admin.perpanjangan-skck');
    }

    public function tambah_skck()
    {
        return view('admin.tambah-skck');
    }

    public function edit_skck()
    {
        return view('admin.edit-skck');
    }

    public function laporan_masuk()
    {
        return view('admin.laporan-masuk');
    }

    public function buat_laporan()
    {
        return view('admin.buat-laporan');
    }

    public function post_buat_laporan(Request $request)
    {
        $validatedData = $request->validate([
            'laporan_header' => 'required',
            'laporan_body' => 'required',
            'laporan_jeniskeperluan' => 'required|filled',
        ]);
        $laporan_kode = strtoupper(Str::random(5) . "-" . Str::random(5));
        $laporan = new Laporan; 
        $saveLaporan = $laporan->create([
            "laporan_header" => $validatedData["laporan_header"],
            "laporan_jeniskeperluan" => $validatedData["laporan_jeniskeperluan"],
            "laporan_body" => $validatedData["laporan_body"],
            "laporan_kode" => $laporan_kode,
            "laporan_pengirim" => "admin",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return redirect()->route('dashboard');
        // dump($validatedData);
        // dd($laporan_kode);
    }

    public function postLogin(Request $request)
    {
        $cariUser = Login::where('username', $request->username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('username', $request->username)->firstOrFail();
        switch ($data_login->level) {
            case 'admin':
                $cek_password = Hash::check($request->password, $data_login->password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'petugas':
                if ($request->password == $data_login->password) {
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('dashboard');
                }
                break;
            case 'pengguna':
                if ($request->password == $data_login->password) {
                    $users = session(['data_login' => $data_login]);
                    return redirect()->route('dashboard');
                }
                break;
        }
        return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
    }

    public function postRegister(Request $request)
    {
        $login_data = new Login;
        $validatedLogin = $request->validate([
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $hashPassword = Hash::make($request->password, [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "admin";
        $login_data = Login::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $hashPassword,
            'level' => $level,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $login_data->save();
        return redirect('/dashboard/login')->with('berhasil_register', 'Berhasil melakukan registrasi');
    }

    public function print_baru()
    {
        return view('admin.print-skck-baru');
    }

    public function print_perpanjang()
    {
        return view('admin.print-skck-perpanjang');
    }
}
