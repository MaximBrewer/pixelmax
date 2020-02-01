<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('profile', ['model' => User::findOrFail(Auth::user()->id)]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $r)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->update([
            'telegram' => $r->telegram,
            'activity_id' => $r->activity_id,
            'type_id' => $r->type_id,
            'mail' => $r->mail,
            'telegram' => $r->telegram,
            'slack_address' => $r->slack_address,
            'slack_name' => $r->slack_name,
            'slack_token' => $r->slack_token,
            's3_address' => $r->s3_address,
            's3_access_key' => $r->s3_access_key,
            's3_access_secret' => $r->s3_access_secret
        ]);
        
        return $this->index();
    }
}
