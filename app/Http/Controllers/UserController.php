<?php


namespace App\Http\Controllers;

use App\ModelsResource\DRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    public function index()
    {
        $dataRole = DRole::all();
        if (request()->ajax()) {
            return DataTables::of(User::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages/user/data-user/indexUser', compact([
            'dataRole'
        ]));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {


        $rules = array(
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'role_user' => 'required',
            'no_hp' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
            'role' => $request->role_user,
            'role_user' => $request->role_user,
            'no_hp' => $request->no_hp
        );


        if (User::create($form_data)) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['success' => $request->username]);
        }


    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if (request()->ajax()) {
            $data = User::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


    public function update(Request $request)
    {

        if ($request->password != '') {
            $rules = array(
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'jabatan' => 'required',
                'role_user' => 'required',
                'no_hp' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            $form_data = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'jabatan' => $request->jabatan,
                'role_user' => $request->role_user,
                'role' => $request->role_user,
                'no_hp' => $request->no_hp,

            );
            User::whereId($request->hidden_id)->update($form_data);
        } else {
            $rules = array(
                'name' => 'required',
                'username' => 'required',
                'jabatan' => 'required',
                'role_user' => 'role_user',
                'no_hp' => 'required'

            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            $form_data = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'jabatan' => $request->jabatan,
                'role_user' => $request->role_user,
                'role' => $request->role_user,
                'no_hp' => $request->no_hp,

            );
            User::whereId($request->hidden_id)->update($form_data);
        }


        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }


    public function check_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::guard('web')->attempt(['username' => $username, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
        }

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');

    }

    public function redirect()
    {
        if (!auth()->check()) {
            return redirect()->to('/');
        }


        return redirect()->to('/user/beranda');
    }
}
