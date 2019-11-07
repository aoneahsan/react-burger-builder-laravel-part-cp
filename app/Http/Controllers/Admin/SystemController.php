<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
	public function showDashborad()
    {
    	// dd("ok");
        if (Auth::user()->roles[0]->id == 1) {
	        // Users Data
	        $total_users_all = User::count();
	        $total_users = $total_users_all - 1;
	        $admins = 0;
	        $users = 0;
	        $users_c = User::with('roles')->get();
	        foreach ($users_c as $user) {
	            if ($user->roles[0]->id === 2) {
	                $admins++;
	            }
	            if ($user->roles[0]->id === 3) {
	                $users++;
	            }
	        }
	        
	        return view('project.dashborad.index', compact(
	            'total_users',
	            'admins',
	            'users'
	        ));
	    }
	}

}