<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Type;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

        return view('profile', ['model' => User::findOrFail(Auth::user()->id), 'types' => Type::all(), 'activities' => Activity::all()]);
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $r)
    {
        $errors = null;

        $r->validate([
            'telegram' => 'required|max:255'
        ]);

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

        if(!$errors) Session::flash('flash message', ['message' => __('Profile saved'), 'type' => 'success']);

        if ($r->password) $user->update(['password' => Hash::make($r->password)]);

        return $this->index();
    }
}
