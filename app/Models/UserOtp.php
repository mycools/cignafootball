<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class UserOtp extends Model
{
    protected $fillable = [
        'user_id',
        'refcode',
        'otp',
        'status'
    ];
    protected $date = [
        'created_at'
    ];
    static function getOtp(Request $request)
    {
        $old = UserOtp::where("user_id",$request->user()->id)
                ->where("status","unuse")
                ->where('created_at','>',now()->subMinutes(15));
        if($old->count() == 0){
            $code = strtoupper(str_random(4));
            $otp = rand(100000, 999999);
            $o = UserOtp::create([
                'user_id' => $request->user()->id,
                'refcode' => $code,
                'otp' => $otp
            ]);
        }else{
            $o = $old->first();
        }
        return [
            'user_id' => $request->user()->id,
            'refcode' => $o->refcode,
            'otp' => $o->otp,
            'expired_at' => $o->created_at->addMinutes(15)->format('Y-m-d H:i:s')
        ];
    }
}
