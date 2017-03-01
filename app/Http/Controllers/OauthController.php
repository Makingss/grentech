<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;

class OauthController extends Controller
{
    protected $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
        $this->middleware('auth');
    }

    public function oauth(Request $request)
    {
        $response = $this->http->post('http://192.168.254.128/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',//'authorization_code',
                'client_id' => '5',
                'client_secret' => 'zJs1YxdzOupnHEEA5eATEsia0bcTmQlHLU7L3dz7',//'W8IuK4Ighp56qNGnweMiY0NsmYswhSusy4L1aEF9',
                // 'redirect_uri' => 'http://192.168.254.128/callback',
                //'code' => $request->code,
                'username' => '542397809@qq.com',
                'password' => '111111',
                'scope' => '',
            ],
        ]);
        #return json_decode((string)$response->getBody(), true);
        $access_token = Arr::get(json_decode((string)$response->getBody(), true), 'access_token');
        return $this->getUserByToken($access_token);
    }

    private function getUserByToken($accessToken)
    {
        $heades = ['Authorization' => 'Bearer' . $accessToken];
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://192.168.254.128/api/user', $heades);
        $response = $this->http->send($request);
        dd($response);
        return json_decode((string)$response->getBody(), true);

    }

    public function redirect()
    {
        $query = http_build_query([
            'client_id' => 3,
            'redirect_uri' => 'http://192.168.254.128/callback',
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect('http://192.168.254.128/oauth/authorize?' . $query);
    }

    public function showClient()
    {
        return view('passport.client');
    }
}

