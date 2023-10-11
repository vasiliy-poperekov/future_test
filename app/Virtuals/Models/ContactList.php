<?php

namespace App\Virtuals\Models;

/**
 * @OA\Schema(
 *     title="ContactList",
 *     description="List of contacts",
 *     @OA\Xml(
 *         name="ContactList"
 *     )
 * )
 */
class ContactList
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtuals\Models\Contact[]
     */
    private $data;
}
