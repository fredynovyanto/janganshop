<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('dashboards.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('dashboards.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::where('id', Auth::id())->findOrFail($id);
        if(!$user){
            Alert::toast('You cant edit other users', 'error')->autoClose(3000)->hideCloseButton();
            return view('dashboards.users.index');
        }else{
            return view('dashboards.users.edit', compact('user'));
        }
    }

    public function update(Request $request, User $user)
    {

    }
}
