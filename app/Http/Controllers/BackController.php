<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Detail;
use App\Models\Login;
use App\Models\LaporanDetail;
use App\Models\Laporan;

class BackController extends Controller
{
    public function verifikasi_skck()
    {
        $users = session('data_login');
        return view('admin.verifikasi-skck', [
            'users' => $users,
        ]);
    }

    public function post_verifikasi_skck(Request $request)
    {
        // $users      = session('data_login');
        // $skck_id    = $request->id_skck;
        // $skck       = Detail::find($skck_id);
        // $pengguna   = Login::find($skck->login_id);

        // $mail_username  = "siakadtk123@gmail.com";
        // $mail_password  = "Fathur160199Seven";

        // try {
        //     $mail = new PHPMailer(); // create a new object
        //     $mail->IsSMTP(true); // enable SMTP
        //     // $mail->IsMAIL(); // enable SMTP
        //     $mail->SMTPDebug = 0;
        //     $mail->Debugoutput = 'html';
        //     $mail->SMTPAuth = true; // authentication enabled
        //     $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        //     $mail->Host = "smtp.gmail.com";
        //     $mail->Port = 465; // or 587 / 465
        //     // $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        //     // $mail->Host = "smtp.gmail.com";
        //     // $mail->Port = 587; // or 587
        //     $mail->Username = $mail_username;
        //     $mail->Password = $mail_password;

        //     // $mail = new PHPMailer(true);
        //     // $mail->isSMTP();
        //     // $mail->SMTPDebug = 2;
        //     // $mail->Debugoutput = 'html';
        //     // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //     // $mail->Host = 'smtp.gmail.com';
        //     // $mail->Port = 587;
        //     // // $mail->Port = 465;
        //     // $mail->SMTPSecure = 'tls';
        //     // $mail->SMTPAuth = true;
        //     // $mail->Username = env('MAIL_USERNAME');
        //     // $mail->Password = env('MAIL_PASSWORD');


        //     // $mail->addAddress($pengguna->login_email, "VERIFIKASI SKCK");
        //     // $mail->addAddress("fathurwalkers44@gmail.com", "BEM Teknik Unidayan");

        //     $mail->setFrom($mail_username, "VERIFIKASI SKCK");
        //     $mail->addAddress("fathurwalkers44@gmail.com", "STATUS SKCK");

        //     $mail->isHTML(true);
        //     $mail->Subject = "Verifikasi SKCK";
        //     $mail->Body = "Silahkan klik link dibawah ini untuk mem-verifikasi skck anda.<br>";

        //     $mail->Body .= "http://127.0.0.1:5001/verifikasi/";
        //     $mail->Body .= $pengguna->login_token;
        //     $mail->Body .= "/";
        //     $mail->Body .= $pengguna->login_username;
        //     $mail->Body .= " <br>";

        //     $mail->send();
        //     // dd($mail);
        //     return redirect()->route('dashboard')->with('berhasil_verifikasi', "Verfikasi SKCK telah dikirim ke email anda, silahkan cek email anda untuk konfirmasi verifikasi skck.");
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }
    }

    public function terima_verifikasi($token)
    {
        $token_user = $token;

        $pengguna = Login::where('login_username', $token_user)->first();
        $findSKCK = Detail::where('login_id', $pengguna->id)->first();
        $findSKCK->update([
            'status_skck' => 'verified',
            'updated_at' => now(),
        ]);
        // dd($findSKCK);
        $mail_username  = "siakadtk123@gmail.com";
        $mail_password  = "Fathur160199Seven";
        $mail_send  = $pengguna->login_email;

        try {
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(true); // enable SMTP
            // $mail->IsMAIL(); // enable SMTP
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 / 465
            // $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            // $mail->Host = "smtp.gmail.com";
            // $mail->Port = 587; // or 587
            $mail->Username = $mail_username;
            $mail->Password = $mail_password;

            // $mail = new PHPMailer(true);
            // $mail->isSMTP();
            // $mail->SMTPDebug = 2;
            // $mail->Debugoutput = 'html';
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->Host = 'smtp.gmail.com';
            // $mail->Port = 587;
            // // $mail->Port = 465;
            // $mail->SMTPSecure = 'tls';
            // $mail->SMTPAuth = true;
            // $mail->Username = env('MAIL_USERNAME');
            // $mail->Password = env('MAIL_PASSWORD');


            // $mail->addAddress($pengguna->login_email, "VERIFIKASI SKCK");
            // $mail->addAddress("fathurwalkers44@gmail.com", "BEM Teknik Unidayan");

            $mail->setFrom($mail_username, "VERIFIKASI SKCK");
            $mail->addAddress($mail_send);

            $mail->isHTML(true);
            $mail->Subject = "Verifikasi SKCK";
            $mail->Body = "SKCK Anda telah diverifikasi. <br> 
                            Silahkan lanjutkan Proses Pembuatan / Perpanjangan SKCK ke Loket Pembuatan SKCK Polres Pasarwajo, membawa persyaratan untuk melakukan pencetakan SKCK. <br>";

            $mail->send();
            return redirect()->route('dashboard')->with('berhasil_verifikasi', "Verfikasi SKCK telah dikirim ke email pengguna");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        // return redirect()->route('dashboard')->with('berhasil_konfirmasi', 'SKCK telah di verifikasi!');
    }

    public function user_request_verifikasi()
    {
        $users      = session('data_login');
        $pengguna   = Login::find($users->id);
        $laporan_kode = strtoupper(Str::random(5) . "-" . Str::random(5));
        $laporan = new Laporan;
        $saveLaporan = $laporan->create([
            "laporan_header"            => "VERIFIKASI SKCK",
            "laporan_jeniskeperluan"    => "Verifikasi",
            "laporan_body"              => $pengguna->login_username,
            "laporan_kode"              => $laporan_kode,
            "laporan_pengirim"          => $pengguna->login_username,
            "created_at"                => now(),
            "updated_at"                => now()
        ]);
        $saveLaporan->save();
        return redirect()->route('dashboard')->with('laporan_verifikasi', 'Laporan permintaan Verifikasi SKCK Telah terkirim. silahkan menunggu balasan Email dari admin.');
    }

    public function index()
    {
        $skck = Detail::all()->count();
        $pengguna = Login::all()->count();
        $laporan = Laporan::all()->count();
        $skck_pendaftaran   = Detail::has('laporan')->get();
        $skck_perpanjangan  = Detail::has('laporan')->get();

        $arrayPendaftaran = [];
        $arrayPerpanjangan = [];
        foreach ($skck_pendaftaran as $skck_data1) {
            foreach ($skck_data1->laporan as $item1) {
                if ($item1->laporan_jeniskeperluan === 'PENDAFTARAN') {
                    $arrayPendaftaran = collect([$item1]);
                } else {
                    $arrayPendaftaran = null;
                }
            }
        }

        foreach ($skck_perpanjangan as $skck_data2) {
            foreach ($skck_data2->laporan as $item2) {
                if ($item2->laporan_jeniskeperluan === 'PERPANJANGAN') {
                    $arrayPerpanjangan = collect([$item2]);
                } else {
                    $arrayPerpanjangan = null;
                }
            }
        }
        return view('admin.index', [
            'pengguna' => $pengguna,
            'laporan' => $laporan,
            'pendaftaran' => $arrayPendaftaran,
            'perpanjangan' => $arrayPerpanjangan,
            'total_skck' => $skck
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

    public function daftar_skck()
    {
        $laporanDetail = LaporanDetail::all();
        $data_skck = Detail::all();
        return view('admin.daftar-skck', [
            'data_skck' => $data_skck,
            'laporanDetail' => $laporanDetail
        ]);
    }

    public function verifikasi_pengguna()
    {
        return view('admin.verifikasi-pengguna');
    }

    public function post_verifikasi_pengguna(Request $request)
    {
        echo "VERIFIKASI PENGGUNA";
    }

    public function batalkan(Request $request)
    {
        $request->session()->forget(['laporan_id']);
        return redirect()->route('dashboard')->with('batalkan_pembuatan', 'Permintaan Pembuatan / Perpanjangan anda telah dibatalkan.');
    }

    public function perpanjangan_skck()
    {
        $laporan_id = session('laporan_id');
        if (!$laporan_id) {
            return redirect()->route('buat-laporan')->with('laporan_belum_ada', 'Laporan belum dibuat, silahkan mengisi laporan terlebih dahulu!');
        } else {
            return view('admin.perpanjangan-skck');
        }
    }

    public function tambah_skck()
    {
        $users = session('data_login');
        $laporan_id = session('laporan_id');
        if (!$laporan_id) {
            return redirect()->route('buat-laporan')->with('laporan_belum_ada', 'Laporan belum dibuat, silahkan mengisi laporan terlebih dahulu!');
        } else {
            return view('admin.tambah-skck');
        }
    }

    public function update_skck(Request $request, $id)
    {
        $skck_id = $id;
        $users = session('data_login');
        $laporan_id = session('laporan_id');
        $data_skck = Detail::findOrFail($skck_id);
        // dd($data_skck);
        $validatedData = $request->validate([
            "jenis_keperluan_pembuatan"          => 'required|filled',
            "nama_lengkap"          => 'required',
            "ttl"                   => 'required',
            "agama"                 => 'required',
            "kebangsaan"            => 'required',
            "kabupaten"             => 'required',
            "jenis_kelamin"         => 'required|filled',
            "status_kawin"          => 'required|filled',
            "pekerjaan"             => 'required',
            "alamat_lengkap"        => 'required',
            "no_ktp"                => 'required',
            "no_telepon"            => 'required',
            "jenis_pidana_value_a"            => 'required',
            "jenis_pidana_value_b"            => 'required',
            "jenis_pidana_value_c"            => 'required',
            "jenis_pidana_value_d"            => 'required',
            "jenis_pidana_value_e"            => 'required',
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
            "kebangsaan_ayah"       => 'required',
            "pekerjaan_ayah"        => 'required',
            "alamat_sekarang_ayah"  => 'required',
        ]);
        $saveDataSkck = $data_skck->update([
            "jenis_keperluan_pembuatan"          => $validatedData["jenis_keperluan_pembuatan"],
            "nama_lengkap"          => $validatedData["nama_lengkap"],
            "ttl"                   => $validatedData["ttl"],
            "agama"                 => $validatedData["agama"],
            "kebangsaan"            => $validatedData["kebangsaan"],
            "kabupaten"            => $validatedData["kabupaten"],
            "jenis_kelamin"         => $validatedData["jenis_kelamin"],
            "status_kawin"          => $validatedData["status_kawin"],
            "pekerjaan"             => $validatedData["pekerjaan"],
            "alamat_lengkap"        => $validatedData["alamat_lengkap"],
            "no_ktp"                => $validatedData["no_ktp"],
            "no_passport"           => $request->no_passport,
            "no_kitaskitap"         => $request->no_kitaskitap,
            "no_telepon"            => $validatedData["no_telepon"],
            "jenis_pidana_value_a"            => $validatedData["jenis_pidana_value_a"],
            "jenis_pidana_value_b"            => $validatedData["jenis_pidana_value_b"],
            "jenis_pidana_value_c"            => $validatedData["jenis_pidana_value_c"],
            "jenis_pidana_value_d"            => $validatedData["jenis_pidana_value_d"],
            "jenis_pidana_value_e"            => $validatedData["jenis_pidana_value_e"],
            "no_telepon"            => $validatedData["no_telepon"],
            "no_telepon"            => $validatedData["no_telepon"],
            "no_telepon"            => $validatedData["no_telepon"],
            "status_hubungan"       => $validatedData["status_hubungan"],
            "nama_pasangan"         => $validatedData["nama_pasangan"],
            "umur_pasangan"         => $validatedData["umur_pasangan"],
            "agama_pasangan"        => $validatedData["agama_pasangan"],
            "kebangsaan_pasangan"   => $validatedData["kebangsaan_pasangan"],
            "pekerjaan_pasangan"    => $validatedData["pekerjaan_pasangan"],
            "alamat_pasangan"       => $validatedData["alamat_pasangan"],
            "nama_ayah"             => $validatedData["nama_ayah"],
            "umur_ayah"             => $validatedData["umur_ayah"],
            "agama_ayah"            => $validatedData["agama_ayah"],
            "kebangsaan_ayah"            => $validatedData["kebangsaan_ayah"],
            "pekerjaan_ayah"            => $validatedData["pekerjaan_ayah"],
            "alamat_sekarang_ayah"            => $validatedData["alamat_sekarang_ayah"],
            "updated_at"            => now()
        ]);
        return redirect()->route('daftar-skck')->with('berhasil_update', 'Data telah di-perbarui!');
    }

    public function post_tambah_skck(Request $request)
    {
        $users = session('data_login');
        $laporan_id = session('laporan_id');
        $validatedData = $request->validate([
            "foto"                  => 'required',
            "jenis_keperluan_pembuatan"          => 'required|filled',
            "nama_lengkap"          => 'required',
            "ttl"                   => 'required',
            "agama"                 => 'required',
            "kebangsaan"            => 'required',
            "kabupaten"             => 'required',
            "jenis_kelamin"         => 'required|filled',
            "status_kawin"          => 'required|filled',
            "pekerjaan"             => 'required',
            "alamat_lengkap"        => 'required',
            "no_ktp"                => 'required',
            "no_telepon"            => 'required',
            "jenis_pidana_value_a"            => 'required',
            "jenis_pidana_value_b"            => 'required',
            "jenis_pidana_value_c"            => 'required',
            "jenis_pidana_value_d"            => 'required',
            "jenis_pidana_value_e"            => 'required',
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
            "kebangsaan_ayah"       => 'required',
            "pekerjaan_ayah"        => 'required',
            "alamat_sekarang_ayah"  => 'required',
        ]);
        $gambar_cek = $request->file('foto');
        if (!$gambar_cek) {
            $gambar = "null;";
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('foto')->move(public_path('foto'), strtolower($randomNamaGambar));
        }



        $data_skck = new Detail;
        $saveDataSkck = $data_skck->create([
            "foto"                  => $gambar->getFileName(),
            "status_skck"           => "unverified",
            "jenis_keperluan_pembuatan"          => $validatedData["jenis_keperluan_pembuatan"],
            "nama_lengkap"          => $validatedData["nama_lengkap"],
            "ttl"                   => $validatedData["ttl"],
            "agama"                 => $validatedData["agama"],
            "kebangsaan"            => $validatedData["kebangsaan"],
            "kabupaten"             => $validatedData["kabupaten"],
            "jenis_kelamin"         => $validatedData["jenis_kelamin"],
            "status_kawin"          => $validatedData["status_kawin"],
            "pekerjaan"             => $validatedData["pekerjaan"],
            "alamat_lengkap"        => $validatedData["alamat_lengkap"],
            "no_ktp"                => $validatedData["no_ktp"],
            "no_passport"           => $request->no_passport,
            "no_kitaskitap"         => $request->no_kitaskitap,
            "no_telepon"            => $validatedData["no_telepon"],
            "jenis_pidana_value_a"            => $validatedData["jenis_pidana_value_a"],
            "jenis_pidana_value_b"            => $validatedData["jenis_pidana_value_b"],
            "jenis_pidana_value_c"            => $validatedData["jenis_pidana_value_c"],
            "jenis_pidana_value_d"            => $validatedData["jenis_pidana_value_d"],
            "jenis_pidana_value_e"            => $validatedData["jenis_pidana_value_e"],
            "status_hubungan"       => $validatedData["status_hubungan"],
            "nama_pasangan"         => $validatedData["nama_pasangan"],
            "umur_pasangan"         => $validatedData["umur_pasangan"],
            "agama_pasangan"        => $validatedData["agama_pasangan"],
            "kebangsaan_pasangan"   => $validatedData["kebangsaan_pasangan"],
            "pekerjaan_pasangan"    => $validatedData["pekerjaan_pasangan"],
            "alamat_pasangan"       => $validatedData["alamat_pasangan"],
            "nama_ayah"             => $validatedData["nama_ayah"],
            "umur_ayah"             => $validatedData["umur_ayah"],
            "agama_ayah"            => $validatedData["agama_ayah"],
            "kebangsaan_ayah"       => $validatedData["kebangsaan_ayah"],
            "pekerjaan_ayah"        => $validatedData["pekerjaan_ayah"],
            "alamat_sekarang_ayah"  => $validatedData["alamat_sekarang_ayah"],
            "created_at"            => now(),
            "updated_at"            => now()
        ]);
        // dd($saveDataSkck);
        $usersInfo = Login::where('id', $users->id)->first();
        $saveDataSkck->save();
        $saveDataSkck->laporan()->attach($laporan_id);
        $saveDataSkck->login()->associate($usersInfo->id);
        $saveDataSkck->save();
        $request->session()->forget(['laporan_id']);
        return redirect()->route('dashboard')->with('berhasil_buat_skck', 'Selamat! SKCK Telah berhasil dibuat!');
    }

    public function edit_skck(Request $request, $id)
    {
        $skck_id = $id;
        $skck = Detail::findOrFail($skck_id);
        return view('admin.edit-skck', [
            'skck' => $skck
        ]);
    }

    public function laporan_masuk()
    {
        $data_laporan = Laporan::all();
        return view('admin.laporan-masuk', [
            'data_laporan' => $data_laporan
        ]);
    }

    public function buat_laporan()
    {
        $users = session('data_login');
        $laporan_id = session('laporan_id');
        $skck = Detail::where('login_id', $users->id)->first();
        // dd($skck);
        if (!empty($skck)) {
            return redirect()->route('dashboard')->with('skck_telah_ada', 'SKCK Sudah pernah dibuat!');
        } else {
            if ($laporan_id) {
                return redirect()->route('tambah-skck')->with('laporan_telah_ada', 'Laporan telah dibuat, silahkan selesaikan pembuatan skck.');
            } else {
                $cariuser = Login::find($users->id);
                // dd($cariuser->id);
                $data_skck = Detail::where('login_id', $cariuser->id)->first();
                if ($data_skck == null) {
                    return view('admin.buat-laporan');
                } else {
                    return redirect()->route('dashboard')->with('request_error', 'SKCK sudah pernah dibuat. anda tidak dapat membuat skck baru lagi!');
                }
            }
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
        $users = session('data_login');
        $pengirim = $users->login_nama;
        $validatedData = $request->validate([
            'laporan_header'            => 'required',
            'laporan_body'              => 'required',
            'laporan_jeniskeperluan'    => 'required|filled',
        ]);
        $laporan_kode = strtoupper(Str::random(5) . "-" . Str::random(5));
        $laporan = new Laporan;
        $saveLaporan = $laporan->create([
            "laporan_header"            => $validatedData["laporan_header"],
            "laporan_jeniskeperluan"    => strtoupper($validatedData["laporan_jeniskeperluan"]),
            "laporan_body"              => $validatedData["laporan_body"],
            "laporan_kode"              => $laporan_kode,
            "laporan_pengirim"          => $pengirim,
            "created_at"                => now(),
            "updated_at"                => now()
        ]);
        $saveLaporan->save();
        $laporan_id = session(['laporan_id' => $saveLaporan->id]);
        switch ($saveLaporan->laporan_jeniskeperluan) {
            case "PENDAFTARAN":
                return redirect()->route('tambah-skck');
                break;
            case "PERPANJANGAN":
                return redirect()->route('perpanjangan-skck');
                break;
        }
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
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'user':
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
            'login_nama' => 'required',
            'login_username' => 'required',
            'login_password' => 'required',
            'login_email' => 'required'
        ]);
        $hashPassword = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "user";
        $login_status = "verified";
        $login_data = Login::create([
            'login_nama' => $validatedLogin["login_nama"],
            'login_username' => $validatedLogin["login_username"],
            'login_password' => $hashPassword,
            'login_email' => $validatedLogin["login_email"],
            'login_token' => $token,
            'login_level' => $level,
            'login_status' => $login_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $login_data->save();
        return redirect()->route('login')->with('berhasil_register', 'Berhasil melakukan registrasi!');
    }

    public function print_baru(Request $request)
    {
        $id_skck = $request->skck;
        $users = session('data_login');
        $alldetail = Detail::all();
        $detail = $alldetail->where('id', $id_skck)->first();
        return view('admin.print-skck-baru', [
            'detail' => $detail
        ]);
    }

    public function print_perpanjang()
    {
        return view('admin.print-skck-perpanjang');
    }

    public function admin_lihat_skck($id)
    {
        $users = session('data_login');
        // $findUser = Login::find($users->id);
        $reqId = $id;
        $data_skck = Detail::find($reqId);
        if ($data_skck == null) {
            return redirect()->route('dashboard')->with('request_error', 'Maaf, data skck anda tidak ditemukan!');
        } else {
            return view('admin.lihat-skck-admin', [
                'users' => $users,
                'data_skck' => $data_skck
            ]);
        }
    }

    public function lihat_skck()
    {
        $users = session('data_login');
        $findUser = Login::find($users->id);
        $data_skck = Detail::where('login_id', $findUser->id)->first();
        // dd($data_skck);
        if ($data_skck == null) {
            return redirect()->route('dashboard')->with('request_error', 'Maaf, data skck anda tidak ditemukan!');
        } else {
            return view('admin.lihat-skck', [
                'users' => $users,
                'data_skck' => $data_skck
            ]);
        }
    }

    public function profile()
    {
        $users = session('data_login');
        $findUser = Login::find($users->id);
        $data_skck = Detail::where('login_id', $findUser->id)->first();
        if ($data_skck == null) {
            // return redirect()->route('dashboard')->with('request_error', 'Maaf, data skck anda tidak ditemukan!');
            return view('admin.profile', [
                'users' => $users,
                'data_skck' => $data_skck
            ]);
        } else {
            return view('admin.profile', [
                'users' => $users,
                'data_skck' => $data_skck
            ]);
        }
    }

    public function daftar_pengguna()
    {
        $daftar_Users = Login::where('login_level', 'user')->get();
        return view('admin.daftar-pengguna', [
            'daftar_users' => $daftar_Users
        ]);
    }

    public function hapus_pengguna(Request $request, $id)
    {
        $pengguna_id = $id;
        $findUser = Login::findOrFail($pengguna_id);
        $findUser->forceDelete();
        return redirect()->route('daftar-pengguna')->with('status_delete', 'Data telah dihapus!');
    }

    public function hapus_skck(Request $request, $id)
    {
        $users = session('data_login');
        $skck_id = $id;
        $findskck = Detail::find($skck_id);
        $finduser = Login::findOrFail($users->id);
        // die;
        switch ($finduser->login_level) {
            case 'admin':
                // $finduser->detail()->dissociate($findskck->id);
                // $findskck->laporan()->detach();
                $findskck->delete();
                return redirect()->route('daftar-skck')->with('status_delete', 'Data telah dihapus!');
                break;

            case 'user':
                // $findusers->detail()->detach([$findskck->id]);
                $finduser->detail()->dissociate($findskck->id);
                $findskck->delete();
                return redirect()->route('daftar-skck')->with('status_delete', 'Data telah dihapus!');
                break;
        }
        // $finduser->detail()->dissociate($findskck->id);

        // $findskck->delete();
        // return redirect()->route('daftar-skck')->with('status_delete', 'Data telah dihapus!');
    }

    public function laporan_detail(Request $request)
    {
        $id_laporan = $request->id;
        $users = session('data_login');
        $laporan = Laporan::find($id_laporan);
        return view('admin.laporan-detail', [
            'users' => $users,
            'laporan' => $laporan
        ]);
    }

    public function laporan_hapus(Request $request)
    {
        $id_laporan = $request->id;
        $users = session('data_login');
        $laporan = Laporan::find($id_laporan);
        $laporan->detail()->detach();
        $laporan->delete();
        return redirect()->route('laporan-masuk')->with('laporan_terhapus', 'Laporan telah dihapus');
    }
}