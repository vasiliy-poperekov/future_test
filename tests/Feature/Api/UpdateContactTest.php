<?php

namespace Tests\Feature\Api;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function canUpdateContact(): void
    {
        $previousData = Contact::factory()->make();
        $previousData['image'] = $previousData->photo_url;
        $postResponse = $this->postJson(
            route('api.contacts.create'),
            $previousData->toArray()
        );

        $changedData = Contact::factory()->make();
        $changedData['image'] = $changedData->photo_url;
        $response = $this->postJson(
            route(
                'api.contacts.update',
                [
                    'id' => $postResponse['data']['id'],
                ]
            ),
            $changedData->toArray()
        );

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $postResponse['data']['id'],
                'fullname' => $changedData->fullname,
                'company' => $changedData->company,
                'phone_number' => $changedData->phone_number,
                'email' => $changedData->email,
                'birth_date' => $changedData->birth_date,
            ],
        ]);
    }
}
