<?php

namespace App\Repositories\Contact\Daos;

use App\Dtos\ContactDto;
use App\Models\Contact;

interface ContactCreateDao
{
    public function create(ContactDto $contactDto): Contact;
}
