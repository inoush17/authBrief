<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\ForgottenPasswordRequest;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\OtpCodeRequest;
use App\Http\Requests\Authentication\RegistrationRequest;
use App\Http\Requests\Authentication\NewPasswordRequest;
use App\Interfaces\AuthenticationInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            if($this->authInterface->login($data))
            return redirect()->route('dashboard');
        else
            return back()->with('error', 'Email ou mot de passe incorrect(s).');

        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function registration(RegistrationRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            $user = $this->authInterface->registration($data);

            Auth::login($user);

            return redirect()->route('dashboard');

        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }
    public function forgottenPassword(forgottenPasswordRequest $request)
    {
        $data = [
            'email' => $request->email,
        ];

        if ($this->authInterface->forgottenPassword($data['email']))
            return redirect()->route('otpCode');
        else
            return back()->with('error', 'Email non toruvé.');
        // try {

        // } catch (\Exception $ex) {
        //     return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        // }
    }
    public function checkOtpCode(OtpCodeRequest $request)
    {
        $data = [
            'email' => $request->email,
            'code' => $request->code,
        ];

        try {

            $code = $this->authInterface->checkOtpCode($data);

            if (!$code)
            return back()->with('error', 'Code de confirmation invalide.');
        else
            return redirect()->route('newPassword');

        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function newPassword(NewPasswordRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'passwordConfirm' => $request->passwordConfirm,
            'code' => $request->code,
        ];

        try {

            $user = $this->authInterface->newPassword($data);

            if (!$user)
            return back()->with('error', 'Impossible de faire la mise à jour, reprendre.');
        else
            return redirect()->route('dashboard');

        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }
}
