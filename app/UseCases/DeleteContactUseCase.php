<?php

namespace App\UseCases;

use App\Repositories\Contact\Daos\CheckIfContactExistsDao;
use App\Repositories\Contact\Daos\ContactDeleteDao;
use App\Repositories\Contact\Daos\ContactGetByIdDao;
use Exception;

class DeleteContactUseCase
{
    private ContactDeleteDao $deleteDao;
    private CheckIfContactExistsDao $checkDao;
    private ContactGetByIdDao $getByIdDao;

    public function __construct(
        ContactDeleteDao $deleteDao,
        CheckIfContactExistsDao $checkDao,
        ContactGetByIdDao $getByIdDao
    ) {
        $this->deleteDao = $deleteDao;
        $this->checkDao = $checkDao;
        $this->getByIdDao = $getByIdDao;
    }

    public function handle(int $id)
    {
        if (!$this->checkDao->check($id))
        {
            throw new Exception(
                'No such contact',
                404
            );
        }

        $contact = $this->getByIdDao->getById($id);

        $this->deleteDao->delete($id);
        unlink($contact->photo_url);
    }
}
