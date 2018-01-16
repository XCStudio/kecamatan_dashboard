<?php

namespace App\Http\Controllers\Auth;


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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function loginProcess(Request $request)
    {
        try {
            $remember = (bool)$request->input('remember_me');
            if (!Sentinel::authenticate($request->all(), $remember)) {
                flash()->error('Wrong email or password!');

                return redirect()->back()->withInput();
            }

            flash()->success('Login success! Welcome to Bali Tower admin page!');

            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            flash()->error('Error login!' . $e);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function registerProcess(Request $request)
    {
        try {
            $status = !empty($request->status) ? 1 : 1;
            $request->merge( [ 'status' => $status ] );
            $user = Sentinel::register($request->all());


            //Sentinel::findRoleBySlug('admin')->users()->attach( $user );

            flash()->success( trans('message.user.create-success') );
            return redirect()->route( '/' );

        } catch (Exception $e) {
            flash()->error( trans('message.user.create-error') );
            return back()->withInput();
        }
    }

}
