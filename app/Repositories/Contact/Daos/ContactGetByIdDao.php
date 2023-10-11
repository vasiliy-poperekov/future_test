<?php

namespace App\Repositories\Contact\Daos;

use App\Models\Contact;

interface ContactGetByIdDao
{
    public function getById(int $id): Contact;
}
