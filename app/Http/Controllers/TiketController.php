<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tiket;
use App\Models\Requestd;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class TiketController extends Controller
{

    // public function __construct()
    // {
    //     $this->Tiket = new Tiket();
    // }

    public function index(Request $request)
    {

        $keyword = $request->keyword;
        // $tikets =  Tiket::all();
        // $tikets = Tiket::orderBy('req_date', 'desc')->get();

        if (Auth::user()->user_group_id == 1) {

            $tikets = DB::table('tikets')
                ->leftJoin('users', 'users.id', '=', 'tikets.user_id')
                ->leftJoin('user_group', 'user_group.id', '=', 'tikets.user_group_id')
                ->orderBy('tikets.created_at', 'desc')
                ->paginate(10);
        } else {

            $tikets = DB::table('tikets')
                ->leftJoin('users', 'users.id', '=', 'tikets.user_id')
                ->leftJoin('user_group', 'user_group.id', '=', 'tikets.user_group_id')
                ->Where('tikets.user_group_id', '=', Auth::user()->user_group_id)
                ->orderBy('tikets.created_at', 'desc')
                ->paginate(10);
        }

        if ($request->has('keyword')) {

            $tikets = Tiket::leftJoin('users', 'users.id', '=', 'tikets.user_id')
                ->leftJoin('user_group', 'user_group.id', '=', 'tikets.user_group_id')
                ->where('no_tiket', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('username', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('req_subject', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('req_desc', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('priority', 'LIKE', '%' . $request->keyword . '%')
                ->orderBy('tikets.created_at', 'desc')
                ->paginate(10);
        }

        return view('tiket', ['tikets' => $tikets], compact('keyword'));
    }

    public function add()
    {

        $num = User::find(Auth::user()->id);
        $ticket_num = $num->user_code . date('y') . str_repeat('0', 3 - strlen(($num->ticket_num + 1))) . ($num->ticket_num + 1);

        return view('addtiket', compact('ticket_num'));
    }

    public function addtic(Request $request)
    {
        // return $request->file('attach')->store('file');

        $request['req_date'] = Carbon::now()->toDateString();

        $validated = $request->validate([
            'no_tiket' => 'required',
            'req_subject' => 'required',
            'req_desc' => 'required',
            'priority' => 'required',
            'requester' => 'required',
            // 'user_group_id' => 'required',
            'attach' => 'mimes:jpg,png,jpeg|image|max:2048',
        ]);

        // $validated['attach'] = $request->file('attach')->getClientOriginalName();

        if ($request->hasFile('attach')) {
            $filename = $request->attach->getClientOriginalName();
            $path = $request->file('attach')->storeAs('file', $filename);
        } else {
            $path = '';
        }

        $tiket = Tiket::create([
            "no_tiket" => $request->input('no_tiket'),
            "req_subject" => $request->input('req_subject'),
            "user_id" => $request->input('user_id'),
            "requester" => $request->input('requester'),
            "user_group_id" => $request->input('user_group_id'),
            "priority" => $request->input('priority'),
            "req_desc" => $request->input('req_desc'),
            "req_date" => $request->input('req_date'),
            "tiket_stat" => 1,
            "attach" => $path,
        ]);
        // dd($request);
        $num = User::find(Auth::user()->id);
        $user = User::where('id', Auth::user()->id);
        $user->update(['ticket_num' => ($num->ticket_num + 1)]);


        Session::flash('status', 'success');
        Session::flash('message', 'Ticket has been added success!');
        return redirect('ticket');
    }

    public function detailtic($slug)
    {

        $tikets =  Tiket::where('sleg', $slug)->first();


        return view('detail',  ['tikets' => $tikets]);
    }



    public function postcoment(Request $request)
    {
        // dd($request);
        $requestd = Requestd::all();

        $note = Requestd::create($request->all());
        Session::flash('status', 'success');
        Session::flash('message', 'comment added successfully!');
        return redirect()->back();
    }

    public function messages()
    {
        return [
            'upload.max' => "Maximum file size to upload is 2MB (2048 KB)."
        ];
    }
}
