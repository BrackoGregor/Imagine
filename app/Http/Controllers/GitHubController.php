<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class GitHubController extends Controller
{
    function getRepositories (Request $request) {

        $user = Socialite::driver('github')->user();

        $name=$user->getNickname();
        $token=$user->token;

        var_dump($token);

        $authorization = "Authorization: Bearer ".$token;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/vnd.github.v3+json', $authorization));
        curl_setopt($curl, CURLOPT_URL, 'https://api.github.com/user/repos');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERAGENT,'Laravel');

        $response = curl_exec($curl);

        curl_close($curl);

        $response1 = json_decode($response);

        $url = 'https://api.github.com/user/repos';
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        DB::insert('insert into api_calls (api_end_point, created_at) values (?, ?)', [$url, $current_date_time]);

        return view('repositories', ['response1' => $response1, 'username' => $name, 'token' => $token]);
    }

    function getRepositoryIssues (Request $request) {

        $curl = curl_init();
        $authorization = "Authorization: Bearer ".$request->token;

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/vnd.github.v3+json', $authorization));
        curl_setopt($curl, CURLOPT_URL, 'https://api.github.com/repos/' .$request->user. '/' .$request->repository. '/issues');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_USERAGENT,'Laravel');

        $response = curl_exec($curl);

        curl_close($curl);

        $response1 = json_decode($response);

        $url = 'https://api.github.com/repos/' .$request->user. '/' .$request->repository. '/issues';
        $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
        DB::insert('insert into api_calls (api_end_point, created_at) values (?, ?)', [$url, $current_date_time]);

        return view('issues', ['response1' => $response1]);
    }
}
