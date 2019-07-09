<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_user = Auth::user()->id;
        $data = User::find($id_user);

        return view('profile.index', ['data' => $data]);
    }

    public function update(Request $request)
    {
        Validator::extend('password_valid', function ($attribute, $value, $parameters, $validator) {
            return true;
        });

        $custom_message  = [
            'password_valid' => 'Invalid Current Password'
        ];

        $rule['name'] = 'string|min:5|required';
        $rule['avatar'] = 'image|max:5012|mimes:jpeg,jpg,png';

        if ( Auth::user()->provider_id == "") {
            $rule['old_password'] = 'password_valid';
        }
        
        if ( !empty($request->new_password) ) {
            $rule['new_password'] = 'min:6|same:password_confirmation';
            $rule['password_confirmation'] = 'required';
        }

        $this->validate(
            $request,
            
                $rule
            , $custom_message
        );

        $avatar = $request->file('avatar');

        if (Auth::check() && Auth::user()->id) {
            $id_user = Auth::user()->id;

            $user = User::find($id_user);
            $user->name = $request->name;

            if ($request->hasFile('avatar')) {
                $user->avatar = $this->uploadAvatar($avatar);
            }            
            
            if ( !empty($request->password) ) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect('/profile')->with(['status' => 'success','message' => 'Profile has been updated']);;            
        }else{
            return abort(404);
        }
    }

    private function uploadAvatar($avatar)
    {
        $avatar_name = str_replace( '.'.$avatar->getClientOriginalExtension(), '', $avatar->hashName() );
        $avatar_name = $avatar_name.date('dmY').'.'.$avatar->getClientOriginalExtension();
    
        $destinationPath = public_path('/images');
    
        $avatar->move($destinationPath, $avatar_name); 
        
        return $avatar_name;       
    }
}
