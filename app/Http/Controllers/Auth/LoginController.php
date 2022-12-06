<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return Inertia::render('Auth/Login');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        /**
         * validate request
         */
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        //get email and password from request
        $credentials = $request->only('email', 'password');

        //attempt to login
        if (Auth::attempt($credentials)) {

            //regenerate session
            $request->session()->regenerate();

            //redirect route dashboard
            return redirect('/posts');
        }

        //if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
