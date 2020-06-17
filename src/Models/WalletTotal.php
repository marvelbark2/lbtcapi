<?php

namespace prospeak\lbtcapi\models;

use Illuminate\Database\Eloquent\Model;

class WalletTotal extends Model
{
    protected $table = 'wallet_total';
    protected $fillable = ['amount'];
}
