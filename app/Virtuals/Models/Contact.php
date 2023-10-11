<?php

namespace App\Virtuals\Models;

/**
 * @OA\Schema(
 *     title="Contact",
 *     description="Contact model",
 *     @OA\Xml(
 *         name="Contact"
 *     )
 * )
 */
class Contact
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;
    /**
     * @OA\Property(
     *     title="fullname",
     *     description="Full contacts name",
     *     example="Ivanov Ivan Ivanovich"
     * )
     *
     * @var string
     */
    private $fullname;
    /**
     * @OA\Property(
     *     title="company",
     *     description="Name of contacts company",
     *     example="Future"
     * )
     *
     * @var string
     */
    private $company;
    /**
     * @OA\Property(
     *     title="phone_number",
     *     description="Phone number of contact",
     *     example="+79996669966"
     * )
     *
     * @var string
     */
    private $phone_number;
    /**
     * @OA\Property(
     *     title="email",
     *     description="Email of contact",
     *     example="user@mail.com"
     * )
     *
     * @var string
     */
    private $email;
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
    private $birth_date;
    /**
     * @OA\Property(
     *     title="photo_url",
     *     description="Url of contact photo",
     *     example="images/1353294.jpg"
     * )
     *
     * @var string
     */
    private $photo_url;

     /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
