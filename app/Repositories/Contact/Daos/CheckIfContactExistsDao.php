<?php

namespace App\Repositories\Contact\Daos;

interface CheckIfContactExistsDao
{
    public function check(int $id): bool;
}
