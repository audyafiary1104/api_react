<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProfileUUid;

class Profile extends Model {
    use ProfileUUid;

    protected $table = 'profile';

    public $incrementing = false;
    protected $fillable = ['first_name','last_name','address','country','data_id'];
    protected $guarded = 'profile_id';
    public function User(){
        return $this->belongsTo('App\Model\User','data_id');
    }


}
