<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $this->authorize('viewAny', \Auth::user());

        return view('tables')->with([
            'type' => 'users',
            'users' => User::paginate(8),
        ]);
    }

}
