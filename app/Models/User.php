<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'custom_users_table';

    protected $primaryKey = 'custom_id_column';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'custom_id_column',
        'custom_name_column',
        'custom_email_column',
        'custom_password_column',
    ];

    public function getAuthIdentifierName() {
        return 'custom_id_column';
    }

    public function getAuthIdentifier() {
        return $this->custom_id_column;
    }

    public function getAuthEmail() {
        return $this->custom_email_column;
    }

    public function getAuthPassword() {
        return $this->custom_password_column;
    }

    public function getRememberToken() {
        return null;
    }

    public function setRememberToken($value) {
        return;
    }

    public function getRememberTokenName() {
        return null;
    }
}
