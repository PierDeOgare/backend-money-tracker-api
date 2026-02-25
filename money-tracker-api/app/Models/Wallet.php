<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**SHOW WHICH USER OWNS A WALLET */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**SHOW MULTIPLE TRANSACTIONS THAT HAVE BEEN DONE USING A WALLET */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
