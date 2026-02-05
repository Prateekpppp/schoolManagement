<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeinvoice extends Model
{
    //
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'invoice_id','feeinvoice_no');
    }
}
