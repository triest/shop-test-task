<?php

namespace App\DTO;

class CreateProductDTO
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?int $category_id = null,
        public ?string $price = null,

    ) {}
}
