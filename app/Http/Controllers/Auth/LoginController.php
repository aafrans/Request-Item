<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_PENDING = '-';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        Log::info('Login attempt', ['email' => $credentials['email']]);

        $attempt = Auth::attempt(
            $credentials,
            $request->filled('remember')
        );

        Log::info('Login result', ['success' => $attempt]);

        return $attempt;
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->handleUserRedirect(Auth::user());
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function handleUserRedirect($user)
    {
        if ($user->role === self::ROLE_PENDING || is_null($user->role)) {
            Auth::logout();
            return redirect('/login')->with('error', 'Akunmu belum disetujui, segera hubungi admin');
        }

        if ($user->role === self::ROLE_ADMIN) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === self::ROLE_USER) {
            return redirect()->route('user.dashboard');
        }

        // Default redirect jika peran tidak dikenali
        Auth::logout();
        return redirect('/login')->with('error', 'Peran pengguna tidak valid');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Cek apakah email ada
        $user = User::where($this->username(), $request->{$this->username()})->first();

        if (!$user) {
            $errors = [$this->username() => 'Email tidak terdaftar.'];
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
