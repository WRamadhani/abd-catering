<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Catering extends Model {
    protected $fillable = ['nama','paket','harga','foto'];

    public function diorder() {
        return $this->hasMany(Order::class, 'catering_id', 'id');
    }
}
