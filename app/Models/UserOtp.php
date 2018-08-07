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
    static function useOtp(Request $request,$refcode,$otp)
    {
        $old = self::where("user_id",$request->user()->id)
                ->where("status","unuse")
                ->where("refcode",$refcode)
                ->where("otp",$otp);
        if($old->count() != 1){
            return false;
        }
        $res = $old->first();
        $res->status = "used";
        return $res->save();

    }
    static function checkValidOtp(Request $request,$otp,$refcode)
    {
        return self::where("user_id",$request->user()->id)
                ->where("status","unuse")
                ->where("refcode",$refcode)
                ->where("otp",$otp)
                ->where('created_at','>',now()->subMinutes(15))->count();
    }
    static function getOtp(Request $request)
    {
        $old = self::where("user_id",$request->user()->id)
                ->where("status","unuse")
                ->where('created_at','>',now()->subMinutes(15));


        if($old->count() == 0){
            $code = strtoupper(str_random(4));
            $otp = rand(100000, 999999);
            $o = self::create([
                'user_id' => $request->user()->id,
                'refcode' => $code,
                'otp' => $otp,
            ]);
            $sendsms = true;
        }else{
            $o = $old->first();
            $sendsms = false;
        }
        return [
            'user_id' => $request->user()->id,
            'refcode' => $o->refcode,
            'otp' => $o->otp,
            'sendsms' => $sendsms,
            'expired_at' => $o->created_at->addMinutes(15)->format('Y-m-d H:i:s')
        ];
    }
}
