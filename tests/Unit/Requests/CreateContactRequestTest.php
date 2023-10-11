<?php

namespace Tests\Unit\Requests;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateContactRequestTest extends TestCase
{
    use RefreshDatabase;
    private string $routePrefix = 'api.contacts.create';

    /** @test */
    public function fullnameIsRequired(): void
    {
        $validatedField = 'fullname';
        $brokenRule = null;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function fullnameMustBeString(): void
    {
        $validatedField = 'fullname';
        $brokenRule = 123;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function companyMustBeString(): void
    {
        $validatedField = 'company';
        $brokenRule = 123;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function phoneNumberIsRequired(): void
    {
        $validatedField = 'phone_number';
        $brokenRule = null;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function phoneNumberMustBeString(): void
    {
        $validatedField = 'phone_number';
        $brokenRule = 123;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function emailIsRequired(): void
    {
        $validatedField = 'email';
        $brokenRule = null;

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function emailMustBeCorrect(): void
    {
        $validatedField = 'email';
        $brokenRule = 'email';

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function birthDateMustBeCorrect(): void
    {
        $validatedField = 'birth_date';
        $brokenRule = '2000.1.1';

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }

    /** @test */
    public function imageMustBeImage(): void
    {
        $validatedField = 'image';
        $brokenRule = '';

        $contact = Contact::factory()->make([
            $validatedField => $brokenRule,
        ]);

        $response = $this->postJson(
            route($this->routePrefix),
            $contact->toArray()
        );

        $response->assertJsonValidationErrors($validatedField);
    }
}
