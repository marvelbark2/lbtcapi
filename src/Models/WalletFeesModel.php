<?php

namespace prospeak\lbtcapi\models;

use Illuminate\Database\Eloquent\Model;

class WalletFeesModel extends Model
{
    protected $table = 'wallet_fees';
    protected $fillable = ['outgoing_fee', 'deposit_fee'];
}
