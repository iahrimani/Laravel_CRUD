<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        $id = User::where('id', $id)->first();
//        dd($id);

        if (!$id){
            abort(404);
        }
        return view('profile.index', compact('id'));
    }

    public function getEdit()
    {
    	return view('profile.edit');
    }

        public function postEdit()
    {
    	return view('profile.edit');
    }

}
