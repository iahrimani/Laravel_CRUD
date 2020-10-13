<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        $id = User::where('id', $id)->first();

        if (!$id){
            abort(404);
        }
        return view('profile.index', compact('id'));
    }
}
