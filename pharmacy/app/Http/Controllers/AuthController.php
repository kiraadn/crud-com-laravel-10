<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use App\Http\Requests\ResetPassword;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->is_role == '1') {
                return redirect()->intended('/admin/dashboard')->with('success', 'Credenciais validadas, acesso concedido!');
            } else {
                return redirect()->back()->with('error', 'Credenciais incorrectas, por favor tente novamente com os dados correctos!');
            }
        } else {
            return redirect()->back()->with('error', 'Credenciais incorrectas, por favor tente novamente com os dados correctos!');
        }
    }


    public function forgot()
    {
        return view('auth.forgot');
    }

    public function forgot_post(Request $request)
    {
        // dd($request->all());

        $count = User::where('email','=', $request->email)->count();

        if($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send( new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Senha foi resetada. Por favor verifique seu email, SPAM ou a pasta junk.');

        } else {
            return redirect()->back()->withInput()->with('error', 'Email não reconhecido pelo Sistema!');
        }
    }


    public function getReset($token){
       // dd($token);
        if(Auth::check()){
            return redirect()->route('dashboards.dashboard');
        }

        $user = User::where('remember_token', '=', $token );

        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();
        $data['token'] = $token;

        return view('auth.reset', $data)->with('success', 'Por favor, redefina sua senha nesta página.');

    }

    public function postReset($token, ResetPassword $request){

        $user = User::where('remember_token', '=', $token );

        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Senha redefinida com sucesso!');

    }


    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
