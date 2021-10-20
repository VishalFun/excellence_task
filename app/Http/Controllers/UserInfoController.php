<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserInfo::latest()->paginate(5);
    
        return view('userinfo.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userinfo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            "email"=>"required",
            "dob"=>"required",
            "contact"=>"required",
            "designation"=>"required",
            "gender"=>"required",
            "hobbies"=>"required"
        ]);

        try{
    
        UserInfo::create($request->all());
     
        return redirect()->route('userinfo.index')
                        ->with('success','User Info created successfully.');

        }
        catch(\Exception $e){
       
            return redirect()->route('userinfo.index')
            ->with('error','Email or Contact already Exists');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserInfo $userinfo)
    {
        return view('userinfo.edit',compact('userinfo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userinfo)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            "email"=>"required",
            "dob"=>"required",
            "contact"=>"required",
            "designation"=>"required",
            "gender"=>"required",
            "hobbies"=>"required"
        ]);

    

        try{
    
        $userinfo->update($request->all());
     
        return redirect()->route('userinfo.index')
                        ->with('success','User Info updated successfully.');

        }
        catch(\Exception $e){


        return redirect()->route('userinfo.index')
        ->with('error','Email or Contact already Exists');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userinfo)
    {
        
        $userinfo->delete();
        return redirect()->route('userinfo.index')
        ->with('success','User Info deleted successfully.');
    }
}
