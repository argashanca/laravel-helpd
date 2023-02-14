<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tiket;
use App\Models\Roles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{

    // public function dashboard(Request $request)
    // {
    //     $request->session()->flush();
    // }

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function manage()
    {
        $users =  User::paginate(10);
        return view('admin.manage', ['users' => $users]);
    }

    public function manageadd()
    {

        return view('admin.manage-add');
    }

    public function manageaddus(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users|max:255',
            'user_code' => 'required|unique:users',
            'password' => 'required|confirmed',
            // 'passconf' => 'required|same:password',
            'user_group_id' => 'required',
            'status' => 'required',
            'role_id' => 'required',
        ]);

        $request['password'] =  Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'user has been added success!');
        return redirect('manage');
    }

    public function manageedit($slug)
    {
        $users =  User::where('slug', $slug)->first();
        return view('admin.manage-edit', ['users' => $users]);
    }

    public function manageupdate(Request $request, $slug)
    {

        $validated = $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            // 'password' => 'max:255',
            'department' => 'required',
            'status' => 'required',
            'role_id' => 'required',
        ]);
        $users =  User::where('slug', $slug)->first();

        if ($request->input('password') == "") {
            $users->update([
                'fullname'      => $request->input('fullname'),
                'username'     => $request->input('username'),
                'department'     => $request->input('department'),
                'status'     => $request->input('status'),
                'role_id'     => $request->input('role_id'),

            ]);
        } else {
            $users->update([
                'fullname'      => $request->input('fullname'),
                'username'     => $request->input('username'),
                'password'  => Hash::make($request->input('password')),
                'department'     => $request->input('department'),
                'status'     => $request->input('status'),
                'role_id'     => $request->input('role_id'),
            ]);
        }

        // $request['password'] =  Hash::make($request->password);
        // $users->update($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'user has been updated success!');
        return redirect('manage');

        // $validated = $request->validate([
        //     'fullname' => 'required',
        //     'username' => 'required',
        //     // 'password' => 'max:255',
        //     'department' => 'required',
        //     'status' => 'required',
        //     'role_id' => 'required',
        // ]);

        // // $request['password'] =  Hash::make($request->password);
        // $users =  User::where('slug', $slug)->first();
        // $users->update($request->all());

        // Session::flash('status', 'success');
        // Session::flash('message', 'user has been updated success!');
        // return redirect('manage');
    }

    public function delete($slug)
    {
        $users =  User::where('slug', $slug)->first();
        $users->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'user has been deleted success!');
        return redirect('manage');
    }

    public function deletetic($slug)
    {
        $tikets =  Tiket::where('sleg', $slug)->first();
        $tikets->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'Ticket has been deleted success!');
        return redirect('ticket');
    }

    public function ticketedit($slug)
    {

        $tikets =  Tiket::where('sleg', $slug)->first();
        return view('admin.ticket-edit',  ['tikets' => $tikets]);
    }

    public function ticketupdate(Request $request, $slug)
    {
        // dd($request->all());



        $validated = $request->validate([
            'req_subject' => 'required',
            'req_desc' => 'required',
            'priority' => 'required',
            'username' => 'required',
            // 'department' => 'required',
            'tiket_stat' => 'required',
            // 'req_date' => 'required',
        ]);

        $tikets =  Tiket::where('sleg', $slug)->first();

        if ($request->input('req_close') == "") {
            $tikets->update([
                'req_subject' => $request->input('req_subject'),
                'req_desc' => $request->input('req_desc'),
                'priority' => $request->input('priority'),
                'username' => $request->input('username'),
                // 'department' => $request->input('department'),
                'tiket_stat' => $request->input('tiket_stat'),
                // 'req_date' => $request->input('req_date'),
                'req_close' => $request->input('req_close'),
            ]);
        } else {
            $tikets->update([
                'req_subject' => $request->input('req_subject'),
                'req_desc' => $request->input('req_desc'),
                'priority' => $request->input('priority'),
                'username' => $request->input('username'),
                // 'department' => $request->input('department'),
                'tiket_stat' => $request->input('tiket_stat'),
                // 'req_date' => $request->input('req_date'),
                'req_close' => $request->input('req_close'),
            ]);
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Tickets has been updated success!');
        return redirect('ticket');
    }
}
