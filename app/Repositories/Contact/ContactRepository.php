<?php

namespace App\Repositories\Contact;

use App\Dtos\ContactDto;
use App\Models\Contact;
use App\Repositories\Contact\Daos\CheckIfContactExistsDao;
use App\Repositories\Contact\Daos\ContactCreateDao;
use App\Repositories\Contact\Daos\ContactDeleteDao;
use App\Repositories\Contact\Daos\ContactGetAllDao;
use App\Repositories\Contact\Daos\ContactGetByIdDao;
use App\Repositories\Contact\Daos\ContactUpdateDao;

class ContactRepository implements 
    ContactCreateDao,
    ContactDeleteDao,
    ContactGetAllDao,
    ContactGetByIdDao,
    ContactUpdateDao,
    CheckIfContactExistsDao
{
    public function create(ContactDto $contactDto): Contact
    {
        return Contact::create(
            $contactDto->toArray(),
        );
    }

    public function getAll(int $countPerPage = self::PAGINATION_SIZE)
    {
        return Contact::paginate($countPerPage);
    }

    public function getById(int $id): Contact
    {
        return Contact::find($id);
    }

    public function delete(int $id): void
    {
        Contact::destroy($id);
    }

    public function update(int $id, ContactDto $contactDto): Contact
    {
        $contact = Contact::find($id);

        $contact->fullname = $contactDto->getFullName() == null ? $contact->fullname : $contactDto->getFullName();
        $contact->company = $contactDto->getCompany() == null ? $contact->company : $contactDto->getCompany();
        $contact->phone_number = $contactDto->getPhoneNumber() == null ? $contact->phone_number : $contactDto->getPhoneNumber();
        $contact->email = $contactDto->getEmail() == null ? $contact->email : $contactDto->getEmail();
        $contact->birth_date = $contactDto->getBirthDate() == null ? $contact->birth_date : $contactDto->getBirthDate();
        $contact->photo_url = $contactDto->getPhotoUrl() == null ? $contact->photo_url : $contactDto->getPhotoUrl();
        $contact->save();
        
        return $contact;
    }

    public function check(int $id): bool
    {
        return Contact::where('id', $id)->exists();
    }
}
