<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class EditController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('auth.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        if ($request->password == null) {
            $user->fill([
                'username' => $request->username,
                'email' => $request->email,
            ]);
        }else{
            $user->fill([
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
            ]);            
        }

        $user->profile()->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'description' => $request->description
        ]);
    
        $user->save();

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->back();
    }
}
