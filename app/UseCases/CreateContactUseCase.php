<?php

namespace App\UseCases;

use App\Dtos\ContactDto;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use App\Repositories\Contact\Daos\ContactCreateDao;

class CreateContactUseCase
{
    private ContactCreateDao $createDao;

    public function __construct(ContactCreateDao $createDao)
    {
        $this->createDao = $createDao;
    }

    public function handle(CreateContactRequest $request): Contact
    {
        $photoUrl = null;
        if ($request->has('image')) {
            $path = public_path('images/');
            !is_dir($path) && mkdir($path, 0777, true);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move($path, $imageName);
            $photoUrl = 'images/' . $imageName;
        }

        return $this->createDao->create(
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
