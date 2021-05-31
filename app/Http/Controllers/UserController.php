<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\User;
use Auth;

class UserController extends Controller
{
    //
    public function showRegisterForm(){
      return view('frontend.register');
    }

    public function storeUser(Request $request){
      //dd($request->all());

      $messages = [
        'required' => 'Trường :attribute bắt buộc nhập.',
        'email'    => 'Trường :attribute phải có định dạng email'
    ];
    $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            'password' => 'required|numeric|min:6',
            // 'website'  => 'sometimes|required|url'

        ], $messages);
        
        if ($validator->fails()) {
            return redirect('register')
                    ->withErrors($validator)
                    ->withInput();
        } else {
          // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
          $name = $request->input('name');
          $email = $request->input('email');
          $password = bcrypt($request->input('password'));
          // $website = $request->input('website');
         
          DB::insert('insert into users (name, email, password) values (?, ?, ?)', [$name, $email, $password]);
          return redirect('register')
              ->with('message', 'Dang ki thanh cong');   
      }
    }

    public function showToken() {
      echo csrf_token();

    }

    public function login(Request $request){
      $email = $request['email'];
      $password = $request['password'];

      if (Auth::attempt(['email'=>$email, 'password' => $password]))
        return 'success';
      else
        return 'failed';
    }


    public function logout(){
      Auth::logout();
      return 'logout';
    }
}