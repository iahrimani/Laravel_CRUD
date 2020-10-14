<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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

    public function getEdit()
    {
    	return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
    	$request->validate([
    		'full_name' => 'max:30',
    		'email' 	=> 'email',
    		'age' 		=> 'integer',
    	]);

    	Auth::user()->update([
    		'full_name' => $request->input('full_name'),
    		'email' 	=> $request->input('email'),
    		'age' 		=> $request->input('age'),
    	]);

    	return redirect()
    	->route('profile.edit')
    	->with('success', 'Профиль успешно обновлён !');
    }

}
