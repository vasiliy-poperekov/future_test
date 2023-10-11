<?php

namespace App\UseCases;

use App\Models\Contact;
use App\Repositories\Contact\Daos\CheckIfContactExistsDao;
use App\Repositories\Contact\Daos\ContactGetByIdDao;
use Exception;

class GetContactsByIdUseCase
{
    private ContactGetByIdDao $getByIdDao;
    private CheckIfContactExistsDao $checkDao;

    public function __construct(
        ContactGetByIdDao $getByIdDao,
        CheckIfContactExistsDao $checkDao
    ) {
        $this->getByIdDao = $getByIdDao;
        $this->checkDao = $checkDao;
    }

    public function handle(int $id): Contact
    {
        if (!$this->checkDao->check($id))
        {
            throw new Exception(
                'No such contact',
                404
            );
        }
        return $this->getByIdDao->getById($id);
    }
}
