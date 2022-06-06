<?php

namespace App\Http\Controllers;


class ContentController extends Controller
{

    public function index()
    {

        return view('content.admin.showgoods');
    }

    public function warehouse()
    {

        return view('content.admin.showwarehouse');
    }

    public function showuser () {
        return view ('content.admin.showuser');
    }

    public function goodsuser() {
        return view('content.user.showgoods');
    }

}
