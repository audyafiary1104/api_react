<?php

namespace App\Http\Controllers\Credentials;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Profile;
use Illuminate\Hashing\BcryptHasher;
use App\Model\User;
use PHPUnit\Exception;
use App\Library\Library;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Auth;
class UserCredentialsController extends Controller
{


  public function Register(Request $request)
  {
      try{
          $validate = $this->library()->Email_validate($request->email);
          if($validate->status = 200){
              if (!$validate->disposable){
                  $ip = $request->ip();
                  $user = User::create([
                      'email' => $request->email,
                      'Last_ip' => $ip,
                      'password' =>  app('hash')->make($request->password),
                  ]);
                  Profile::create([
                      'first_name' => $request->first_name,
                      'data_id' => $user->data_id,
                      'last_name' => $request->last_name,
                      'address' => $request->address,
                      'country'  => $request->country
                  ]);
                  return response()->json(['status' => 'success','Massage'=>'Please Verify Your email Address']);
              }
              return response()->json(['status' => 'failed','Massage'=> 'email Not Support']);

          }
          return response()->json(['status' => 'failed','massage'=>$validate->error]);

      }catch (Exception $e){
          return response()->json(['status' => 'failed','massage'=> $e->getMessage()]);
      }
    }
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email',$request->email);
        $credentials = $request->only(['email', 'password']);
        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        if (!$user->first()->email_verified){
            return response()->json(['message' => 'Email Not Verified'], 401);
        }
        return $this->respondWithToken($token);
  }

}
