<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
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
        return view('pages/user/data-user/indexUser');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {


        $rules = array(
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $form_data = array(
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'user'
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

        if($request->password != ''){
            $rules = array(
                'name' => 'required',
                'username' => 'required',
                'password' => 'required'
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            $form_data = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),

            );
            User::whereId($request->hidden_id)->update($form_data);
        }else{
            $rules = array(
                'name' => 'required',
                'username' => 'required',
            );

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }


            $form_data = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make('admin123'),

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

        if (auth()->user()->role == 'admin') {
            return redirect()->to('/admin/beranda');
        } else if (auth()->user()->role == 'user') {
            return redirect()->to('/user/beranda');
        }

        return redirect()->to('/');
    }
}
