<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class SettingController extends Controller
{
	public function credential()
	{
		return view('dashboard.credential');
	}

    public function changeCredentials()
    {
    	$user = User::find(Auth::id());
    }
}
