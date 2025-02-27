<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmPasswordChangeMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;


class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function edit(Request $request)
    {

        $data = [
            'current_password' => $request->current_password,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ];

        Mail::to('rabehlife144@gmail.com')->send(new ConfirmPasswordChangeMail(Auth::user()->id, $data));

        echo  "check your email";
    }
    public function confirm($user, $password, $current_password, $password_confirmation)
    {
        // Validate the inputs
        Validator::make([
            'password' => $password,
            'current_password' => $current_password,
            'password_confirmation' => $password_confirmation,
        ], [
            'password' => ['required', 'confirmed', 'min:8'],
            'current_password' => ['required', 'current_password'],
            'password_confirmation' => ['required', 'same:password'],
        ])->validate();

        // Find the user
        $user = User::findOrFail($user);

        // Check if the current password is correct
        if (!Hash::check($current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($password),
        ]);

        // Return a success response
        return redirect()->route('profile.edit')->with('status', 'Password has been updated successfully!');
    }
}
