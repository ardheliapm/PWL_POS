<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){

      

  

      $user = UserModel::find(1); //ambil semua data dr tabel m_user
      return view('user', ['data' => $user]);

        
    }}

