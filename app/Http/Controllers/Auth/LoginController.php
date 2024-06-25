<?php


namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{   

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email', $user->getEmail())->first();

            if ($findUser) {
                Auth::login($findUser);
            } else {
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => encrypt('my-google')
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/home');

        } catch (\Exception $e) {
            \Log::error('Error with Google login:', ['message' => $e->getMessage()]);
            return redirect('login')->with('error', 'Erro ao fazer login com o Google.');
        }
    }
}

