<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\UseCases\GetContactsByIdUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class GetContactByIdController extends Controller
{
    private GetContactsByIdUseCase $getByIdUseCase;

    public function __construct(GetContactsByIdUseCase $getByIdUseCase)
    {
        $this->getByIdUseCase = $getByIdUseCase;
    }

    /**
     * @OA\Get(
     *     path="/v1/notebook/{id}",
     *     summary="Find contact by id",
     *     description="Returns a single contac",
     *     operationId="getContactById",
     *     tags={"Notebook"},
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
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Contact")
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Contact not found"
     *     )
     * )
     */
    public function getById(int $id): JsonResponse
    {
        try {
            $contact = $this->getByIdUseCase->handle($id);
        } catch (Exception $e) {
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
