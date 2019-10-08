<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UserUuid;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject {
    use UserUuid;
    use Authorizable;
    use Authenticatable;

    protected $table = 'users';

    public $incrementing = false;

    protected $fillable = ['data_id','email','profile_id','Last_ip','password','api_key'];

    protected $guarded = 'data_id';

    public $timestamps = true;

    protected $hidden = [ 'password'];

    public $primaryKey = 'data_id';

    public function profile(){
        return $this->hasMany('App\Model\Profile','data_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
