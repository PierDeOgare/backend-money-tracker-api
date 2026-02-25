<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**SHOW WHICH WALLET MADE A TRANSACTION */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
