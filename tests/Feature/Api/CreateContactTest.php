<?php

namespace Tests\Feature\Api;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canCreateContact(): void
    {
        $contact = Contact::factory()->make();
        $contact['image'] = $contact->photo_url;

        $response = $this->postJson(
            route('api.contacts.create'),
            $contact->toArray()
        );

        $response->assertCreated();
        $this->assertDatabaseHas('contacts', [
            'fullname' => $contact->fullname,
            'company' => $contact->company,
            'phone_number' => $contact->phone_number,
            'email' => $contact->email,
            'birth_date' => $contact->birth_date,
        ]);

        $createdContact = Contact::find($response['data']['id']);
        unlink(public_path() . '/' . $createdContact->photo_url);
    }
}
