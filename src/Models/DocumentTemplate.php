<?php


namespace EasyDoklad\SDK\Models;


class DocumentTemplate
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description,
    ) { }

    public static function fromArray(array $template): static
    {
        return new static(
            id: $template['id'],
            name: $template['name'],
            description: $template['description'],
        );
    }
}
