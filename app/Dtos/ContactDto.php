<?php

namespace App\Dtos;

class ContactDto
{
    private ?string $fullname;
    private ?string $company;
    private ?string $phoneNumber;
    private ?string $email;
    private ?string $birthDate;
    private ?string $photoUrl;

    public function __construct(
        string $fullname = null,
        string $company = null,
        string $phoneNumber = null,
        string $email = null,
        string $birthDate = null,
        string $photoUrl = null
    ) {
        $this->fullname = $fullname;
        $this->company = $company;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->photoUrl = $photoUrl;
    }

    public function getFullName(): ?string
    {
        return $this->fullname;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photoUrl;
    }

    public function setFullname(?string $fullname): void
    {
        $this->fullname = $fullname;
    }

    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setBirthDate(?string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function setPhotoUrl(?string $photoUrl): void
    {
        $this->photoUrl = $photoUrl;
    }

    public function toArray(): array
    {
        return [
            'fullname' => $this->fullname,
            'company' => $this->company,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
            'birth_date' => $this->birthDate,
            'photo_url' => $this->photoUrl,
        ];
    }
}
