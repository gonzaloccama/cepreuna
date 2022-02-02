<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Socialite;

class GoogleController extends Controller
{
    public function goToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function goHandleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $verify_user = $this->findUser($user->email, $user->id);
//            $verify_user = $this->findUser('11000000@cepreuna.edu.pe', '114983635457625325000');

            if ($verify_user->status && isset($verify_user->data->Estado)) {
                if ($verify_user->data->Estado != 'Inactivo') {
                    $findUser = User::where('user_google_id', $user->id)->first();

                    if (isset($findUser) && !empty($findUser)) {
                        $findUser->update([
                            'user_google_id' => $user->id,
                        ]);
                        Auth::login($findUser);
                        return redirect()->intended($this->redirectTo());
                    } else {

                        $register = new User();

                        $register->email = $user->email;
                        $register->user_google_id = $user->id;
                        $register->role = 4;
                        $register->phone = $verify_user->data->Celular;
                        $register->user_firstname = $verify_user->data->Nombres;
                        $register->user_lastname = $verify_user->data->Apellidos;
                        $register->user_dni = $verify_user->data->Dni;

                        $register->save();

                        Auth::login($register);
                        return redirect()->intended($this->redirectTo());
                    }
                } else {
                    return redirect('login')->with('error', 'El usuario no tiene autorización para ingresar.');
                }
            } else {
                return redirect('login')->with('error', 'Las credenciales del usuario no se encuentran en nuestros registros.');
            }

        } catch (Exception $exception) {
            return redirect('login')->with('error', 'Algo salio mal con las credenciales.');
        }
    }

    private function findUser($email, $idgsuite)
    {
        if ($email && $idgsuite) {
            $token = 'eyJpdiI6ImhTSVMvUmlwL3o3WmdTTDRhQkZlU3c9PSIsInZhbHVlIjoia2xWbzN1'
                . 'dWtnaEUrbjlBNE5lZEN0QT09IiwibWFjIjoiNTU3MTc5MTYwZDZiYmM5NTBhZTAwYTg5'
                . 'OTkxMjQ1ZjMyNTdkODk1ZjUxZGIyMjNmN2MwMjdhYWI1ODA2NWJhZCJ9';
            $client = new Client(['verify' => false]);
            try {
                $response = $client
                    ->request('GET', 'https://test.cepreuna.edu.pe/api/social/validate?_token=' . $token
                        . '&email=' . $email . '&idgsuite=' . $idgsuite)
                    ->getBody();
                return json_decode($response);
            } catch (RequestException $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    protected function redirectTo()
    {
        if (Auth::user()->role == 1) {
            return '/admin/users';  // admin dashboard path
        } else {
            return '/social';  // member dashboard path
        }
    }
}
