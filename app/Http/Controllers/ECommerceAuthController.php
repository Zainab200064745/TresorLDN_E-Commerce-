<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ECommerceAuthController extends Controller
{
    /**
     * @author Ibrahim Ahmad <210029073@aston.ac.uk>
     * Create a re-direct property of the webpage
     */
    private $redirect = '/home';

    /**
     * This will hold the credentials for each user
     *  @author Ibrahim Ahmad <210029073@aston.ac.uk>
     * @var email - holds the email address for the user.
     * @var password - holds the user's password, kept private
     */
    private $email = "";
    private $password = "";

    /**
     * This will return to the homepage after a successful login process
     * @author Ibrahim Ahmad <210029073@aston.ac.uk>
     */
    public function returnHome() {
        return $redirect;
    }

    /**
     * This will get the email address for the user
     * @author Ibrahim Ahmad <210029073@aston.ac.uk>
     */
    protected function getEmail() {
        return $email;
    }

    /**
     * This handles the authentication process
     * @author Ibrahim Ahmad <210029073@aston.ac.uk>
     */
    public function checkUserLogin(Request $request) {
        //get the users credentials
        $login = $request->only('email', 'password');
        
        //we check if the user has logged in
        if(Auth::attempt($login)){
            //redirect to homepage
            Auth::login($login[0]);
            return redirect()->intended(returnHome())->withSuccess('You have signed in!');
        }

        //otherwise return to the login page
        else {
            return redirect()->intended('login')->withSuccess("You have failed to sign in!");
        }

    }

    /** This returns the view of the login page 
     * @author Ibrahim Ahmad <210029073@aston.ac.uk>
    */
    public function loginPage() {
        return view('login');
    }

}
