<?php

namespace App\UseCases;

use App\Dtos\ContactDto;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\Contact\Daos\CheckIfContactExistsDao;
use App\Repositories\Contact\Daos\ContactGetByIdDao;
use App\Repositories\Contact\Daos\ContactUpdateDao;
use Exception;

class UpdateContactUseCase
{
    private ContactUpdateDao $updateDao;
    private CheckIfContactExistsDao $checkDao;
    private ContactGetByIdDao $getByIdDao;

    public function __construct(
        ContactUpdateDao $updateDao,
        CheckIfContactExistsDao $checkDao,
        ContactGetByIdDao $getByIdDao
    ) {
        $this->updateDao = $updateDao;
        $this->checkDao = $checkDao;
        $this->getByIdDao = $getByIdDao;
    }

    public function handle(int $id, UpdateContactRequest $request): Contact
    {
        if (!$this->checkDao->check($id))
        {
            throw new Exception(
                'No such contact',
                404
            );
        }

        $photoUrl = null;
        if ($request->has('image')) {
            $path = public_path('images/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $photoUrl = 'images/' . $imageName;
        
            $contact = $this->getByIdDao->getById($id);
            if (isset($contact->photo_url))
            {
                unlink(public_path() . '/' . $contact->photo_url);
            }
        }

        return $this->updateDao->update(
            $id,
            new ContactDto(
                $request->fullname,
                $request->company,
                $request->phone_number,
                $request->email,
                $request->birth_date,
                $photoUrl
            )
        );
    }
}
