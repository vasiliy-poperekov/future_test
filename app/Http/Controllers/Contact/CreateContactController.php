<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateContactRequest;
use App\UseCases\CreateContactUseCase;
use Illuminate\Http\JsonResponse;

class CreateContactController extends Controller
{
    private CreateContactUseCase $createUseCase;

    public function __construct(CreateContactUseCase $createUseCase)
    {
        $this->createUseCase = $createUseCase;
    }

    /**
     * @OA\Post(
     *     path="/v1/notebook",
     *     tags={"Notebook"},
     *     operationId="createContact",
     *     summary="Add a new contact to the store",
     *     @OA\RequestBody(
     *         description="Contact object that needs to be added to the store",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/CreateContactRequest"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Invalid input",
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     */
    public function create(CreateContactRequest $request): JsonResponse
    {
        $contact = $this->createUseCase->handle($request);

        return response()->json([
            'data' => [
                'id' => $contact->id,
            ],
        ], 201);
    }
}
