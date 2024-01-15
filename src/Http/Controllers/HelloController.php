<?php
namespace marketplace\src\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Savvy\Hello\Repositories\Interfaces\HelloRepositoryInterface;

class HelloController extends Controller
{

    public function __construct(protected HelloRepositoryInterface $helloRepository)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index()
    {
        $result = $this->helloRepository->showHello();
        return $this->apiResponse($result);
    }
}