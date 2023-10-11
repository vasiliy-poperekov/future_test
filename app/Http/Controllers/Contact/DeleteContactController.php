<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\UseCases\DeleteContactUseCase;
use Exception;
use Illuminate\Http\JsonResponse;

class DeleteContactController extends Controller
{
    private DeleteContactUseCase $deleteUseCase;

    public function __construct(DeleteContactUseCase $deleteUseCase)
    {
        $this->deleteUseCase = $deleteUseCase;
    }
    /**
     * @OA\Delete(
     *     path="/v1/notebook/{id}",
     *     summary="Deletes a contact",
     *     operationId="deleteContact",
     *     tags={"Notebook"},
     *     @OA\Parameter(
     *         description="Contact id to delete",
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
     *         description="Contact was deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No contact with such id"
     *     )
     * )
     */
    public function delete(int $id): JsonResponse
    {
        try {
            $this->deleteUseCase->handle($id);
        } catch (Exception $e) {
            return response()->json(
                ['data' => $e->getMessage()],
                $e->getCode()
            );
        }

        return response()->json(
            [
                'data' => "Contact with id=$id was deleted succesfully",
            ]
        );
    }
}
