<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Helpers\Backend;
use App\Http\Requests\Backend\AuthReminderEmailRequest;
use App\Http\Requests\Backend\AuthResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\AdminAuthRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\Exception\NotFoundException;

/**
 * Class AuthController.
 */
class AuthController extends Controller
{
    private $backend;

    public function __construct(Backend $backend, Request $request)
    {
        $this->middleware('admin.guest', ['except' => 'getLogout']);

        $this->backend = $backend;

        $backend->RequestsFilter($request);
    }

    public function getLogin()
    {
        return view('backend.auth.login');
    }

    public function postLogin(AdminAuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials + ['is_active' => 1], $request->has('rememberme'))) {
            alert()->success(null, 'Hoş Geldiniz!');

            return redirect()->intended('admin');
        }

        alert()->error('Kullanıcı bilgileriniz yanlış veya kullanıcı henüz aktif değil.', 'Login Hatası!');

        return redirect()->back()->withInput($request->only('email'));
    }

    public function getEmail()
    {
        return view('backend.auth.email');
    }

    public function postEmail(AuthReminderEmailRequest $request)
    {
        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->sender(settings('site_email', env('omer.oztrk0@gmail.com')));
            $message->replyTo(settings('site_no_reply_sender', 'no-reply@yonetimsistemi.com'),
                settings('site_title', 'Yönetim Sistemi'));
            $message->subject('Parolanızı Sıfırlayın!');
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                alert()->success(null, 'Lütfen email adresinizi kontrol ediniz!');

                return redirect()->back();
                break;

            case Password::INVALID_USER:
                alert()->error(null, 'Böyle bir kullanıcı bulunmamaktadır!');

                return redirect()->back();
                break;
        }
    }

    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundException();
        }

        return view('backend.auth.reset', compact('token'));
    }

    public function postReset(AuthResetPasswordRequest $request)
    {
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                alert()->success('Tekrar hoş geldiniz.', 'Parola Sıfırlandı!');

                return redirect('/');
                break;

            default:
                alert()->error(null, 'İşlem sırasında hata oluştu!');

                return redirect()->back()->withInput($request->only('email'));
                break;
        }
    }

    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save();

        \Auth::login($user);
    }

    public function getLogout()
    {
        auth()->logout();

        return redirect('/');
    }
}
