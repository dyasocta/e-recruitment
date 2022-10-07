<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Mail\UserVerif;
use App\Providers\RouteServiceProvider;
use App\Models\User;
// use App\Models\Biodata;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;


// use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message=[
            'kualifikasi.required' => '- Pilih Kualifikasi',
            'no_ktp.min' => '- Nomor Identitas (KTP) Harus Berisi 16 Digit',
            'no_ktp.required' => '- Nomor Identitas (KTP) Harus Disi',
            'name.required' => '- Nama Tidak Boleh Kosong',
            'name.regex' => '- Nama Harus Berupa Huruf',
            'tempat_lahir.required' => '- Isikan Tempat Lahir Anda',
            'tempat_lahir.alpha' => '- Tempat Lahir Harus Berupa Huruf',
            'tanggal_lahir.required' => '- Isikan Tanggal Lahir Anda',
            'jenis_kelamin.required' => '- Pilih Jenis Kelamin Anda',
            'no_hp.required' => '- Isikan Nomor Handphone Anda',
            'no_hp.min' => '- Nomor Handphone Minimal Berisi 11 Digit',
            'email.required' => '- Isikan Alamat E-mail Anda',
            'email.email' => '- Sesuaikan E-mail Anda Dengan Benar',
            'email.unique' => '- Email Sudah Ada',
            'password.required' => '- Password Harus Diisi',
            'password.min' => '- Password Harus Berupa 8 karakter',
            'password.letters' => '- Passwor Memerlukan Setidaknya Satu Huruf',
            'password.mixedCase' => '- Password Memerlukan Setidaknya Satu Huruf Besar dan Satu Huruf Kecil',
            'password.symbols' => '- Password Memerlukan Setidaknya Satu Simbol (.,@)',
            'password.uncompromised' => '- Password Sudah Dipakai',
            'level.required' => '- Level kosong'
        ];
        return Validator::make($data, [
            'level' => ['required','string'],
            'kualifikasi' => ['required', 'string'],
            'no_ktp' => ['required', 'numeric', 'min:16'],
            'name' => 'required|regex:/^[a-zA-Z ]*$/|max:255',
            'tempat_lahir' => ['required', 'alpha'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string'],
            'no_hp' => ['required','numeric','min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],

        ],$message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Mail::to($data['email'])->send(new UserVerif());
        return User::create([
            'level' => $data['level'],
            'kualifikasi' => $data['kualifikasi'],
            'no_ktp' => $data['no_ktp'],
            'name' => $data['name'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
