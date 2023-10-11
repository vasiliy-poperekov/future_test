<?php

namespace Tests\Unit\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Contact;

class UpdateContactRequestTest extends TestCase
{
    use RefreshDatabase;
    private string $routePrefix = 'api.contacts.update';

    /** @test */
    public function fullnameMustBeString(): void
    {
        $createdContact = Contact::factory()->create();
        $validatedField = 'fullname';
        $brokenRule = 123;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route(
                $this->routePrefix,
                [
                    'id' => $createdContact->id,
                ]
            ),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function companyMustBeString(): void
    {
        $createdContact = Contact::factory()->create();
        $validatedField = 'company';
        $brokenRule = 123;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route(
                $this->routePrefix,
                [
                    'id' => $createdContact->id,
                ]
            ),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function phoneNumberMustBeString(): void
    {
        $createdContact = Contact::factory()->create();
        $validatedField = 'phone_number';
        $brokenRule = 123;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route(
                $this->routePrefix,
                [
                    'id' => $createdContact->id,
                ]
            ),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function emailMustBeCorrect(): void
    {
        $createdContact = Contact::factory()->create();
        $validatedField = 'email';
        $brokenRule = 'email';

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route(
                $this->routePrefix,
                [
                    'id' => $createdContact->id,
                ]
            ),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function birthDateMustBeCorrect(): void
    {
        $createdContact = Contact::factory()->create();
        $validatedField = 'birth_date';
        $brokenRule = '2000.1.1';

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route(
                $this->routePrefix,
                [
                    'id' => $createdContact->id,
                ]
            ),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function imageMustBeImage(): void
    {
        $createdContact = Contact::factory()->create();
        $validatedField = 'image';
        $brokenRule = '';

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route(
                $this->routePrefix,
                [
                    'id' => $createdContact->id,
                ]
            ),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }
}
