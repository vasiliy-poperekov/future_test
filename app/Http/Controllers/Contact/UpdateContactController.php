<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateContactRequest;
use App\UseCases\UpdateContactUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateContactController extends Controller
{
    private UpdateContactUseCase $updateUseCase;

    public function __construct(UpdateContactUseCase $updateUseCase)
    {
        $this->updateUseCase = $updateUseCase;
    }
    /**
     * @OA\Post(
     *     path="/v1/notebook/{id}",
     *     tags={"Notebook"},
     *     operationId="updateContact",
     *     summary="Update an existing contact.",
     *     @OA\Parameter(
     *         description="ID of contact to return",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Contact object that needs to be updated to the store",
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/UpdateContactRequest"),
     *         )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *     @OA\Response(
     *         response=404,
     *         description="Contact not found",
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Contact was updated",
     *     ),
     * )
     */
    public function update(UpdateContactRequest $request, string $id): JsonResponse
    {
        try {
            $contact = $this->updateUseCase->handle(intval($id), $request);
        } catch(Exception $e) {
            return response()->json(
                ['data' => $e->getMessage()],
                $e->getCode()
            );
        }

        return response()->json([
            'data' => $contact->toArray(),
        ]);
    }
}
