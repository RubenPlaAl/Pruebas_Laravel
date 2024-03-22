<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function image_update(Request $request): RedirectResponse
    {

    $user=Auth::user();
    $image_path=$request->file('image_path');
    $validate=$this->validate($request,
    [

       'image_path' => 'required|mimes:jpg,png,jpeg,gif,svg|max:1024',
   ]
);
    if($image_path){
    if(!empty($user->image)){
    Storage::disk('users')->delete($user->image);
    }
      $image_path_name = time().$image_path->getClientOriginalName();
      Storage::disk('users')->put($image_path_name, File::get($image_path));
      $user->image= $image_path_name;
      $user->update();
      return Redirect::route('profile.edit')->with('status', 'image-updated');
}

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
