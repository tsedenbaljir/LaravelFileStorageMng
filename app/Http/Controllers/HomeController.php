<?php

namespace App\Http\Controllers;

use App\File;
use App\Folder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=File::all();
        $folders = Folder::all();
        $userID = Auth::getUser();
        $userFilesCount = File::where('created_by_id', $userID->id)->count();

        if (! Gate::allows('folder_access')) {
            return abort(401);
        }
        
        if(Gate::allows('user_view')){
            $users = User::all();
            return view('adminHome', compact('users','folders','files', 'userFilesCount'));
        }
        
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Folder.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Folder.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('folder_delete')) {
                return abort(401);
            }
            $folders = Folder::onlyTrashed()->get();
        } else {
            $folders = Folder::all();
        }
        return view('home', compact('folders','files'));
    }
}
