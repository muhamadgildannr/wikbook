<?php

namespace App\Http\Controllers;

use App\Models\wikbook;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WikbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
     {
         return view('dashboard.login');
     }
    public function register()
    {
        return view('dashboard.register');
    }

     public function home()
     {
        return view('dashboard.index');
     }
     public function logout()
    {
        Auth::logout();
        return redirect('/wikbook');
    }
    public function index()
    {
        return view('dashboard.login');
    }

    public function registerAccount(Request $request)
    {
        // dd($request->all());
        // validasi input
        $request->validate([
            'email' => 'required|email:dns',
            'no_telp' => 'required',
            'password' => 'required|min:4',
            'name' => 'required|min:3',
        ]);
        // input data ke db
        User::create([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // redirect kemana setelah berhasil tambah data + dikirim pemberitahuan
        return redirect('/')->with('success', 'Berhasil menambahkan akun! silahkan login');
    }
    public function users()
     {
         $users=User::all();
         return view('dashboard.users' , compact('users'));
     }

    public function auth(Request $request)
    {
        // array ke2 sbgai custom msg
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ],[
            'email.exists' => 'email ini belum tersedia',
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi',
        ]);

        $user = $request->only('email', 'password');
        // authentication
        if (Auth::attempt($user)) {
            if(Auth::user()->role== "admin"){
                return redirect()->route('dashboard');
            }elseif(Auth::user()->role=="user"){
                return redirect()->route('tampilan');
            }
        }else {
            return redirect('/login')->back()->with('error', 'Gagal login, silahkan cek dan coba lagi!');
        }
    }
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
    public function tampilan()
    {
        return view('dashboard.tampilan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function show(wikbook $wikbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function edit(wikbook $wikbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wikbook $wikbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wikbook  $wikbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(wikbook $wikbook)
    {
        //
    }
}
