<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\UpdateProfile;
use App\Models\Admin;
use App\Models\Proprietaire;
use App\Models\Touriste;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // dd($request->user());
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

        Mail::to('rabehlife144@gmail.com')->send(new UpdateProfile(Auth::user()->name, 'You have updated your profile personal information successfully'));
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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


    public function updatePhoto(Request $request): RedirectResponse
    {

        $request->validate([
            'profile_image' => 'required',
        ]);

        $userRole = Auth::user()->role;
        $profile_image = $request->input('profile_image');

        $userId = Auth::user()->id;

        if ($userRole === 'touriste') {
            $touriste = Touriste::find($userId);
            $touriste->photo = $profile_image;
            $touriste->save();
        } elseif ($userRole === 'proprietaire') {
            $proprietaire = Proprietaire::find($userId);
            $proprietaire->photo = $profile_image;
            $proprietaire->save();
        } elseif ($userRole === 'admin') {
            $admin = Admin::find($userId);
            $admin->photo = $profile_image;
            $admin->save();
        }

        Mail::to('rabehlife144@gmail.com')->send(new UpdateProfile(Auth::user()->name, 'You have updated your profile image'));
        return redirect()->route('profile.edit')->with('status', 'image-updated');
    }
}
