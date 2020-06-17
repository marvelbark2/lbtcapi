<?php

namespace prospeak\lbtcapi\models;

use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    protected $table = 'wallet_history';
    protected $fillable = ['amount', 'description', 'type', '30d'];
}
