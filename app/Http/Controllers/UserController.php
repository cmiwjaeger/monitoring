<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::where('id', $user->id)->get();
        return view('admin.profile', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::where('id', $user->id)->first();
        $user->name = $request->name;
        $user->save();
        return redirect()->route('user.edit',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function password(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view('admin.password', compact('user'));
    }

    public function avatar()
    {
        return view('admin.avatar');
    }

    public function changePassword(Request $request)
{
    $user = new User;
    $oldPassword = $request->old;
    $newPassword = $request->new;
    $confPassword = Hash::make($request->confirmation);
    if(Hash::check($oldPassword,$newPassword)){
        if (Hash::check($curPassword, $newPassword)) {
            $obj_user = User::find($user_id)->first();
            $obj_user->password = $confPassword;
            $obj_user->save();

            return redirect()->back()->with("success","Password changed successfully !");
        }
        else
        {
            redirect()->back()->with("error","Your new password is mismatch. Please try again.");
        }
    } else {
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }
        
}

    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'input_img' => 'required|image|mimes:jpeg,png,jpg,|max:10000',
        ]);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $avatar = time().'.'.$image->getClientOriginalExtension();
            $target_dir = public_path('/avatars/'.$request->name);

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $image->move($target_dir, $avatar);
            // $this->save();
            $user=new User;
	        $user->where('email', '=', Auth::user()->email)->update(['avatar' => 'users/'.$avatar]);
	        return Redirect::to('user_profile')->with(true);
        }
    }
}
