<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Session;
use Auth;

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
        $newHash=Hash::make($request->new);
        $userId=Auth::user()->id;
        $userPassword=Auth::user()->password;
        if(Hash::check($request->old,$userPassword)){
            if(!Hash::check($request->new,$userPassword)){
                if ($request->new===$request->confirmation) {
                    $obj_user = User::find($userId)->firstOrFail();
                    $obj_user->password = Hash::make($request->new);
                    $obj_user->save();
                    return redirect()->back()->with("sucMsg","Password changed successfully !");
                }
                else
                {
                    redirect()->back()->with("errMsg","Your new password is mismatch. Please try again.");   
                }
            } else {
                return redirect()->back()->with("errMsg","New Password cannot be same as your current password. Please choose a different password.");
            }
        } else{
            return redirect()->back()->with("errMsg","Your password is wrong");
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
