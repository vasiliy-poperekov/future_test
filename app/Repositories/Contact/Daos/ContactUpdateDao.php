<?php

namespace App\Repositories\Contact\Daos;

use App\Models\Contact;
use App\Dtos\ContactDto;

interface ContactUpdateDao
{
    public function update(int $id, ContactDto $contactDto): Contact;
}
