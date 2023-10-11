<?php

namespace Tests\Feature\Api;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetAllContactsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function getContacts(): void
    {
        $contacts = Contact::factory()->count(3)->create()->toArray();

        $response = $this->getJson(
            route('api.contacts.getAll')
        );

        $response->assertOk();
        $response->assertJson([
            'data' => [
                ['id' => $contacts[0]['id']],
                ['id' => $contacts[1]['id']],
                ['id' => $contacts[2]['id']],
            ],
        ]);
    }
}
