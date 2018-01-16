<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Activation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Show the form for logging the user in.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('Auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processLogin(Request $request)
    {
        try {
            $remember =  (bool) $request->input( 'remember' );

            if ( ! Sentinel::forceAuthenticate( $request->all(), $remember ) ) {
                flash()->error( 'Wrong email or password!' );
                return redirect()->back()->withInput();
            }

            flash()->success('Login success! Welcome to Bali Tower admin page!');
            return redirect()->route('/');
        } catch (\Exception $e) {
            flash()->error( 'Error login!' . $e );
            return redirect()->back()->withInput();
        }
    }
    /**
     * Show the form for the user registration.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('Auth.register');
    }
    /**
     * Handle posting of the form for the user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function processRegistration(Request $request)
    {
        $input = $request->all();
        print_r($input);
        $rules = [
            'email'            => 'required|email|unique:users',
            'password'         => 'required',
            'password_confirm' => 'required|same:password',
        ];
        $validator = Validator::make($input, $rules);
        if (!$validator->fails())
        {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        if ($user = Sentinel::register($input))
        {
            $activation = Activation::create($user);
            $code = $activation->code;
            /*$sent = Mail::send('Auth.emails.activate', compact('user', 'code'), function($m) use ($user)
            {
                $m->to($user->email)->subject('Activate Your Account');
            });*/
            //if ($sent === 0)
            if (true)
            {
                return Redirect::to('register')
                    ->withErrors('Failed to send activation email.');
            }
            return Redirect::to('login')
                ->withSuccess('Your accout was successfully created. You might login now.')
                ->with('userId', $user->getUserId());
        }
        return Redirect::to('register')
            ->withInput()
            ->withErrors('Failed to register.');
    }
}
