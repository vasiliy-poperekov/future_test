<?php

namespace App\Repositories\Contact\Daos;

interface ContactDeleteDao
{
    public function delete(int $id): void;
}
