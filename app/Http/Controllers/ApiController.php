<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$validated = $request->validate([
            'api_end_point' => 'required|string|max:50',
            'lastname' => 'required|string|max:80',
            'username' => 'required|string|unique:users|max:45',
            'email' => 'required|string|email|unique:users|max:80',
            'password' => 'required|string|min:6|max:150',
            'id_users_roles' => 'required|integer'
        ]);

        $user = Api::create($validated);

        return response()->json($user, 201);*/
    }
}
