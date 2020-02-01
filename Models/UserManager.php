<?php
declare(strict_types=1);

namespace App\Models;

use Ben09\Database\DBManager;

class UserManager extends DBManager
{
    protected $table = "users";

    protected $primary_key = "user_id";
}
