<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\User\UserRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Table\Index;

#[Entity(
    repository: UserRepository::class
)]
#[Index(columns: ['phone'], unique: true)]
class User
{
    #[Column(type: 'text', primary: true)]
    private string $id;

    public function __construct(
        #[Column(type: 'string', nullable: false)]
        public string $phone,

        ?string $id = null,
    ) {
        if ($id !== null) {
            $this->id = $id;
        }
    }

    public function getId(): string
    {
        return $this->id;
    }
}