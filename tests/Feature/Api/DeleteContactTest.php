<?php

namespace Tests\Feature\Api;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canDeleteContact(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->deleteJson(
            route(
                'api.contacts.delete',
                [
                    'id' => $contact->id,
                ]
            )
        );

        $response->assertOk();
        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}
