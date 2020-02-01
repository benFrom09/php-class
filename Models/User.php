<?php
namespace App\Models;

use Ben09\Database\Entities\Entity;

class User extends Entity
{
    protected $user_id;

    protected $user_name;


    public function setUserName(string $name) {
        $this->user_name = $name;
    }

    public function setUserId(int $id) {
        $this->user_id = $id;
    }

    public function getUserName():string {
        return $this->user_name;
    }

    public function getUserId():int {
        return $this->user_id;
    }
}