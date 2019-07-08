<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Catering;

class Order extends Model {
    protected $fillable = ['user_id','catering_id','no_pesanan','jumlah_pesanan','waktu_pesanan','total','alamat_pesanan'];

    public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function catering() {
    	return $this->belongsTo(Catering::class, 'catering_id', 'id');
    }
}
