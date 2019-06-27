<?php

namespace Crypto\Models;

use Illuminate\Database\Eloquent\Model;

class KeyValueModel extends Model
{
    protected $table = 'key_values';

    public function getValue($key) {
        return KeyValueModel::select('input_value')
            ->where('input_key', '=', $key)
            ->get()[0];
    }
}
