<?php

namespace App\Virtuals;

/**
 * @OA\Schema(
 *      title="Create contact request",
 *      description="Create contact request body data",
 *      type="object",
 *      required={"fullname", "phone_number", "email"}
 * )
 */
class CreateContactRequest
{
    /**
     * @OA\Property(
     *      title="fullname",
     *      description="Full name of contact",
     *      example="Ivanov Ivan Ivanovich"
     * )
     *
     * @var string
     */

    public $fullname;
    /**
     * @OA\Property(
     *     title="company",
     *     description="Name of contacts company",
     *     example="Future"
     * )
     *
     * @var string
     */

    public $company;
    /**
     * @OA\Property(
     *     title="phone_number",
     *     description="Phone number of contact",
     *     example="+79996669966"
     * )
     *
     * @var string
     */

    public $phone_number;
    /**
     * @OA\Property(
     *     title="email",
     *     description="Email of contact",
     *     example="user@mail.com"
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
     *     example="2000-01-01",
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
