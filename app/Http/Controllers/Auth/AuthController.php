<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return \Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        try{
            $user = \Socialite::driver('github')->user();
        } catch (Exception $e){
            return Redirect::to('auth/github');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        /*dd($user);*/
        return Redirect::to('my');
    }

    private function findOrCreateUser($githubUser){
        if($authUser = Author::where('github_id', $githubUser->id)->first()){
            return $authUser;
        }

        return Author::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
    }
}