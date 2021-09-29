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
        $users = session('data_login');
        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function login()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
        return view('login');
    }

    public function register()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
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

    public function verifikasi_pengguna()
    {
        $users = session('data_login');
        return view('admin.verifikasi-pengguna', [
            'users' => $users
        ]);
    }

    public function post_verifikasi_pengguna(Request $request)
    {
        echo "VERIFIKASI PENGGUNA"; 
    }

    public function perpanjangan_skck()
    {
        return view('admin.perpanjangan-skck');
    }

    public function tambah_skck()
    {
        $users = session('data_login');
        $laporan_id = session('laporan_id');
        if (!$laporan_id) {
            return redirect()->route('buat-laporan')->with('laporan_belum_ada', 'Laporan belum dibuat, silahkan mengisi laporan terlebih dahulu!');
        } else {
            return view('admin.tambah-skck', [
                'users' => $users
            ]);
        }
    }

    public function post_tambah_skck(Request $request)
    {
        $laporan_id = session('laporan_id');
        $validatedData = $request->validate([ 
            "nama_lengkap"          => 'required',
            "ttl"                   => 'required',
            "agama"                 => 'required',
            "kebangsaan"            => 'required',
            "jenis_kelamin"         => 'required|filled',
            "status_kawin"          => 'required|filled',
            "pekerjaan"             => 'required',
            "alamat_lengkap"        => 'required',
            "no_ktp"                => 'required',
            "no_telepon"            => 'required',
            "status_hubungan"       => 'required|filled',
            "nama_pasangan"         => 'required',
            "umur_pasangan"         => 'required',
            "agama_pasangan"        => 'required',
            "kebangsaan_pasangan"   => 'required',
            "pekerjaan_pasangan"    => 'required',
            "alamat_pasangan"       => 'required',
            "nama_ayah"             => 'required',
            "umur_ayah"             => 'required',
            "agama_ayah"            => 'required',
        ]);

        dd($validatedData);

        $gambar_cek = $request->file('foto');
        if (!$gambar_cek) {
            $gambar = "null;";
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('foto')->move(public_path('foto'), strtolower($randomNamaGambar));
        }

        $data_skck = new Detail;
        $saveDataSkck = $data_skck->create([
            "foto" => $gambar->getFileName(),
            "status_skck" => "unverified", 
            "nama_lengkap" => $validatedData["nama_lengkap"],
            "ttl" => $validatedData["ttl"],
            "agama" => $validatedData["agama"],
            "kebangsaan" => $validatedData["kebangsaan"],
            "jenis_kelamin" => $validatedData["jenis_kelamin"],
            "status_kawin" => $validatedData["status_kawin"],
            "pekerjaan" => $validatedData["pekerjaan"],
            "alamat_lengkap" => $validatedData["alamat_lengkap"],
            "no_ktp" => $validatedData["no_ktp"],
            "no_passport" => $validatedData["no_passport"],
            "no_kitaskitap" => $validatedData["no_kitaskitap"],
            "no_telepon" => $validatedData["no_telepon"],
            "status_hubungan" => $validatedData["status_hubungan"],
            "nama_pasangan" => $validatedData["nama_pasangan"],
            "umur_pasangan" => $validatedData["umur_pasangan"],
            "agama_pasangan" => $validatedData["agama_pasangan"],
            "kebangsaan_pasangan" => $validatedData["kebangsaan_pasangan"],
            "pekerjaan_pasangan" => $validatedData["pekerjaan_pasangan"],
            "alamat_pasangan" => $validatedData["alamat_pasangan"],
            "nama_ayah" => $validatedData["nama_ayah"],
            "umur_ayah" => $validatedData["umur_ayah"],
            "agama_ayah" => $validatedData["agama_ayah"],
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $saveDataSkck->save(); 
        $saveDataSkck->laporan()->attach($laporan_id);
        dump($saveDataSkck);
        dd($saveDataSkck);
        // $sessionLaporan_forget = session()->forget(['laporan_id']);
        // dump($sessionLaporan_forget);
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
        $users = session('data_login');
        $laporan_id = session('laporan_id');
        if ($laporan_id) {
            return redirect()->route('tambah-skck')->with('laporan_telah_ada', 'Laporan telah dibuat, silahkan selesaikan pembuatan skck.');
        } else {
            return view('admin.buat-laporan', [
                'users' => $users
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('berhasil_logout', 'Anda telah logout!');
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
        $saveLaporan->save();
        $laporan_id = session(['laporan_id' => $saveLaporan->id]);

        return redirect()->route('tambah-skck');
        // dump($validatedData);
        // dd($laporan_kode);
    }

    public function postLogin(Request $request)
    {
        $cariUser = Login::where('login_username', $request->login_username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'petugas':
                // if ($request->login_password == $data_login->login_password) {
                //     $users = session(['data_login' => $data_login]);
                //     return redirect()->route('dashboard');
                // }
                // break;
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'user':
                // if ($request->login_password == $data_login->login_password) {
                //     $users = session(['data_login' => $data_login]);
                //     return redirect()->route('dashboard');
                // }
                // break;
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
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
