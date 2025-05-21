<?php

namespace App\DTO;

class OrderUpdateDTO
{
    public function __construct(
        public ?int $status_id = null,

    ) {}
}
