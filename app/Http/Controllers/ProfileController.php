<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\ProfilePostRequest;

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

    public function update(ProfilePostRequest $request, User $user)
    {

        if ($user->profile == null) {
            $profile = new Profile();
            $profile->ddn = $request->ddn;
            $profile->web_site_url = $request->web_site_url;
            $profile->facebook_url = $request->facebook_url;
            $profile->linkedin_url = $request->linkedin_url;
            $profile->user_id = $user->id;
            $user->profile = $profile;
        }else{
            $user->profile->ddn = $request->ddn;
            $user->profile->web_site_url = $request->web_site_url;
            $user->profile->facebook_url = $request->facebook_url;
            $user->profile->linkedin_url = $request->linkedin_url;
            $user->profile->save();
        }
        return $user->profile;
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
