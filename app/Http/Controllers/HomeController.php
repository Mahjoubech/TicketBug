<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
public function index(){

    $tickets = Ticket::where('user_id', Auth::id())->latest()->paginate(3);


        if (request()->has('search')) {
            $search = request()->get('search', '');

            $tickets = $tickets->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('location', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');

            });
        }
    return view('Dashboard',compact('tickets'));

}

}
