<?php

namespace Tests\Feature\Api;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetContactByIdTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canGetContactById(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->getJson(
            route(
                'api.contacts.getById',
                [
                    'id' => $contact->id,
                ]
            )
        );

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $contact->id,
            ],
        ]);
    }
}
