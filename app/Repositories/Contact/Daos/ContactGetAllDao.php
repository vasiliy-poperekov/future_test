<?php

namespace App\Repositories\Contact\Daos;

interface ContactGetAllDao
{
    public const PAGINATION_SIZE = 50;
    public function getAll(int $countPerPage = self::PAGINATION_SIZE);
}
