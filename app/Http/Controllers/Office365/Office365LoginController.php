<?php

namespace App\Http\Controllers\Office365;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Mail;
use Illuminate\Http\Request;
use App\TokenStore\TokenCache;
use Session;
use Carbon\Carbon;
class Office365LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Redirect the user to the o365 authentication page.
     *
     * References to env('GRAPH_TENANT_ID') can be changed to
     * config('services.graph.tenant_id') which bypasses the Laravel
     * config cache.
     *
     * See https://github.com/SocialiteProviders/Providers/issues/337
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('graph')
            ->setTenantId(config('services.graph.tenant_id'))
            ->stateless()
            ->redirect();

            dd('call back');
    }

    /**
     * Obtain the user information from o365.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('graph')->setTenantId(config('services.graph.tenant_id'))
            ->stateless()->user();
            // dd($user);
        $token=$user->token;
        $id=$user->id;

        Session::put('user_token', $token);
        Session::put('user_id', $id);
        $token=Session::get('user_token');
        // dd($token);
        // 2c9464e3-9a5a-4ad3-8ae1-e62860113103
    //dd($arr1);
//       $date =Carbon::now();
// //   dd($date->toTimeString(), $date->toFormattedDateString(), $date->toDayDateTimeString());
//      $date_time=$date->toDayDateTimeString();
// dd($token);
        return redirect()->route('user_login',compact('token'));

    }



}
