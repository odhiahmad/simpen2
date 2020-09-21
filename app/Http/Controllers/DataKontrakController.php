<?php

namespace App\Http\Controllers;

use App\DatabaseHarga;
use App\DataKontrak;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DataKontrakController extends Controller
{
    public function index(){

        return view('pages/user/data-kontrak/indexKontrak');
    }


}
