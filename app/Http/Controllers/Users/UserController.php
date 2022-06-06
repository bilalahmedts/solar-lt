<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Models\Campaign;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = new User;
        if ($request->has('name')) {
            if (!empty($request->name)) {
                $query = $query->where('name', 'LIKE', "%{$request->name}%");
            }
        }
        if ($request->has('email')) {
            if (!empty($request->email)) {
                $query = $query->where('email','LIKE', "%{$request->email}%");
            }
        }
        if ($request->has('campaign_id')) {
            if (!empty($request->campaign_id)) {
                $query = $query->where('campaign_id','LIKE', "%{$request->campaign_id}%");
            }
        }
        $campaigns = Campaign::all();
        $users = $query->sortable()->paginate(10);
        return view('users.index', compact('users','campaigns'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $roles = explode(',', $request->role);

        $user->syncRoles($roles);
        $user->update($request->except("role"));

        Session::flash('success', 'User updated successfully!');
        return redirect()->route('users.index');
    }
}
