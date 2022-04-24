<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Table(name="item")
 * @ORM\Entity
 */
class Item implements \JsonSerializable
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**  @ORM\Column(type="string") */
    private string $name;

    /** @ORM\Column(type="string") */
    private string $phone;

    /** @ORM\Column(name="`key`", type="string") */
    private string $key;

    /** @ORM\Column(type="datetime", name="created_at") */
    private DateTime $createdAt;

    /** @ORM\Column(type="datetime", name="updated_at") */
    private DateTime $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @param DateTime $createdAt
     * @throws \Exception
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param DateTime $updatedAt
     * @throws \Exception
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

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
        $metadata->addPropertyConstraint('createdAt', new Assert\DateTime());
        $metadata->addPropertyConstraints('updatedAt', [
            new Assert\DateTime([
                'message' => 'Поле должно быть датой',
            ])
        ]);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'key' => $this->key,
            'phone' => $this->phone,
            'createdAt' => $this->createdAt->format("Y-m-d H:i:s"),
            'updatedAt' => $this->createdAt->format("Y-m-d H:i:s")
        ];
    }
}
