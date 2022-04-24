<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /** @ORM\Column(type="string") */
    private $phone;

    /** @ORM\Column(type="string") */
    private $key;

    /** @ORM\Column(type="datetime", name="created_at") */
    private $createdAt;

    /** @ORM\Column(type="datetime", name="updated_at") */
    private $updatedAt;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('name', [
            new Assert\Length(['max' => 255]),
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
        $metadata->addPropertyConstraints('phone', [
            new Assert\Length(['max' => 15]),
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
        $metadata->addPropertyConstraints('key', [
            new Assert\NotBlank([
                'message' => 'Поле не должно быть пустым'
            ]),
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
        $metadata->addPropertyConstraints('created_at', [
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
        $metadata->addPropertyConstraints('updated_at', [
            new Assert\Type([
                'type' => 'string',
                'message' => 'Поле должно быть строкой',
            ])
        ]);
    }
}
