<?php

namespace App\Models;

use App\Http\Controllers\PromocodeController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Service\WebSMSService;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function callToVerify()
    {
        $code = random_int(100000, 999999);
        
        $this->forceFill([
            'verification_code' => $code
        ])->save();

        // $toPhone = $this->phone;
        // $msg = "Код для подтверждения: " . $code;

        // $net = new WebSMSService();

        // try {
        // // $ret = $net->getSaldo();
        // // print_r($ret);

        // $ret = $net-> sendSms($toPhone, $msg);
        // // print_r($ret);
        // } catch (Exception $ex) {
        // // print $ex->getMessage();
        // }

    }


    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function addresses() {
        return $this->hasMany(Address::class);
    }

    public function childrens() {
        return $this->hasMany(Child::class);
    }

    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function promocodes() {
        return $this->belongsToMany(Promocode::class);
    }
}
