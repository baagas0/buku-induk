<?php

namespace App\Http\Controllers\Tu\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | tu that recently registered with the application. Emails may also
    | be re-sent if the tu didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect tus after verification.
     *
     * @var string
     */
    protected $redirectTo = '/tu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('tu.auth');
        $this->middleware('signed')->only('tu.verify');
        $this->middleware('throttle:6,1')->only('tu.verify', 'resend');
    }

    /**
     * Show the email verification notice.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->user('tu')->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('tu.auth.verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user('tu')->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user('tu')->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user('tu')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user('tu')->markEmailAsVerified()) {
            event(new Verified($request->user('tu')));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user('tu')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user('tu')->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
