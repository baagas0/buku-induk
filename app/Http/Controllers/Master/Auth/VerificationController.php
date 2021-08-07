<?php

namespace App\Http\Controllers\Master\Auth;

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
    | master that recently registered with the application. Emails may also
    | be re-sent if the master didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect masters after verification.
     *
     * @var string
     */
    protected $redirectTo = '/master';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('master.auth');
        $this->middleware('signed')->only('master.verify');
        $this->middleware('throttle:6,1')->only('master.verify', 'resend');
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
        return $request->user('master')->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('master.auth.verify');
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
        if (! hash_equals((string) $request->route('id'), (string) $request->user('master')->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user('master')->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user('master')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user('master')->markEmailAsVerified()) {
            event(new Verified($request->user('master')));
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
        if ($request->user('master')->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        $request->user('master')->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
