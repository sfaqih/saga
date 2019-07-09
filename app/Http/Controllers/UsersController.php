<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use App\Users;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $user = Users::where('id', '!=', Auth::user()->id)->get();
        

        return view('users.index', ['data' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = $this->role();

        return view('users.form_add', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:5',
                'role' => 'required',
                'email' => 'required|email|unique:users,email|min:5|max:150',
                'password' => 'required|min:6|confirmed',
                'avatar' => 'image|max:5012|mimes:jpg,jpeg,png'
            ]
        );

        $avatar = $request->file('avatar');
        if ($request->hasFile('avatar')) {
            $avatar_name = $this->uploadAvatar($avatar);
        }

        Users::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar_name
        ]);
        
        return redirect('/user')->with(['status' => 'success','message' => 'User Successfully Created']);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Users::find($id);
        $role = $this->role();

        return view('users.form_edit', ['data' => $data, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:5',
                'id_role' => 'required',
                'avatar' => 'image|max:5012|mimes:jpg,jpeg,png'
            ]
        );           
        
        $user = Users::find($id);

        $avatar = $request->file('avatar');
        if ($request->hasFile('avatar')) {
            $user->avatar = $this->uploadAvatar($avatar);
        }

        $user->name = $request->name;
        $user->id_role = $request->role;

        $user->save();

        return redirect('/user')->with(['status' => 'success','message' => 'User Successfully Updated']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::find($id);
        $user->delete();

        return redirect('/user')->with(['status' => 'success','message' => 'User has been deleted']);;
    }

    private function role(Type $var = null)
    {
        $role = DB::table('role')->pluck('name', 'id');
        $data = array('' => 'Choose Role') + $role->toArray();
        
        return $data;        
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
