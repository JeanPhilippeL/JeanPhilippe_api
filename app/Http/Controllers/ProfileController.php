<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        return Profile::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        return $user->profile;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $profile = new Profile();
        if ($user->profile == null) {
            $profile->user_id = $user->id;
        }
        //$profile->ddn = $request->ddn;
        $profile->web_site_url = $request->web_site_url;
        $profile->facebook_url = $request->facebook_url;
        $profile->linkedin_url = $request->linkedin_url;
        $profile->save();
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
