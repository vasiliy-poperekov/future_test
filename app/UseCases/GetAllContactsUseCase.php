<?php

namespace App\UseCases;

use App\Repositories\Contact\Daos\ContactGetAllDao;

class GetAllContactsUseCase
{
    private ContactGetAllDao $getAllDao;

    public function __construct(ContactGetAllDao $getAllDao)
    {
        $this->getAllDao = $getAllDao;
    }

    public function handle()
    {
        return $this->getAllDao->getAll();
    }
}
