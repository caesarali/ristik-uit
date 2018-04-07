<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Hash;
use Validator;

class PasswordController extends Controller
{
    public function change()
    {
    	return view('dashboard.credential');
    }

    public function update()
    {
    	Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, \Auth::user()->password);
        });
 
        // message for custom validation
        $messages = [
            'password' => 'Invalid current password.',
        ];
 
        // validate form
        $validator = Validator::make(request()->all(), [
            'current_password'      => 'required|password',
            'password'              => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
 
        ], $messages);
 
        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }
 
        // update password
        $user = User::find(Auth::id());
 
        $user->password = bcrypt(request('password'));
        $user->save();
 
        return redirect()
            ->route('password.change')
            ->withSuccess('Password berhasil diperbarui.');
    }

    public function reset()
    {
    	$user = User::find(Auth::id());
 
        $user->password = bcrypt('admin');
        $user->save();
 
        return redirect()
            ->route('password.change')
            ->withSuccess('Password berhasil direset.');
    }
}
