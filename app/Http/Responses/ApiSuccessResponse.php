<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response as HttpResponse;

class ApiSuccessResponse implements Responsable
{
    public function __construct(
        protected mixed $data,
        protected bool $message = true,
        protected int $status = HttpResponse::HTTP_OK,
        protected array $headers = []
    ) {
    }

    public function toResponse($request)
    {
        return response()->json(
            data: [
                'data' => $this->data,
                'success' => $this->message,
                'status' => $this->status,
            ],
            status: $this->status,
            headers: $this->headers
        );
    }
}
