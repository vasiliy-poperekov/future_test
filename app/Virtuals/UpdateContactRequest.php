<?php

namespace App\Virtuals;

/**
 * @OA\Schema(
 *      title="Update contact request",
 *      description="Update contact request body data",
 *      type="object"
 * )
 */
class UpdateContactRequest
{
    /**
     * @OA\Property(
     *      title="fullname",
     *      description="Full name of contact",
     *      example="Petrov Petr Petrovich"
     * )
     *
     * @var string
     */

    public $fullname;
    /**
     * @OA\Property(
     *     title="company",
     *     description="Name of contacts company",
     *     example="Past"
     * )
     *
     * @var string
     */

    public $company;
    /**
     * @OA\Property(
     *     title="phone_number",
     *     description="Phone number of contact",
     *     example="+78888888888"
     * )
     *
     * @var string
     */

    public $phone_number;
    /**
     * @OA\Property(
     *     title="email",
     *     description="Email of contact",
     *     example="newuser@mail.com"
     * )
     *
     * @var string
     */

    public $email;
    /**
     * @OA\Property(
     *     title="birth_date",
     *     description="Date of contacts birth",
     *     format="date",
     *     example="2002-02-02",
     *     type="string"
     * )
     *
     * @var \Date
     */
    public $birth_date;

    /**
     * @OA\Property(
     *     title="image",
     *     description="Image of contact",
     *     property="image",
     *     type="file",
     *     format="file",
     * )
     */
    public $image;
}
