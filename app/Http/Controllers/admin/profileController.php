<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UseraddRequest;
use App\Http\Requests\UsereditRequest;
use App\Models\User;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.user', [
            'profile'=>User::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UseraddRequest $request)
    {
        $data = $request->validated();
        
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('success','User has been created !!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsereditRequest $request, string $id)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::find($id)->update($data);
        return back()->with('success','User has been Updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return back()->with('success','User has been deleted !!!');
    }
}
