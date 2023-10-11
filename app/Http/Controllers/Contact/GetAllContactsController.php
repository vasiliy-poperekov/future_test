<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\UseCases\GetAllContactsUseCase;
use Illuminate\Http\JsonResponse;

class GetAllContactsController extends Controller
{
    private GetAllContactsUseCase $getAll;

    public function __construct(GetAllContactsUseCase $getAll)
    {
        $this->getAll = $getAll;
    }

    /**
     * @OA\Get(
     *     path="/v1/notebook",
     *     description="Returns page with list of contacts",
     *     operationId="getAllContacts",
     *     tags={"Notebook"},
     *     @OA\Parameter(
     *         description="Number of page",
     *         in="query",
     *         name="page",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/ContactList")
     *     )
     * )
     */
    public function getAll(): JsonResponse
    {
        return response()->json(
            $this->getAll->handle()->toArray()
        );
    }
}
