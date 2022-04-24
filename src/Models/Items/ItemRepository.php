<?php


namespace App\Models\Items;


use App\Entity\Item;
use App\EntityManagerFactory;
use App\Models\Items\Dto\ItemDto;
use Doctrine\ORM\EntityManager;

class ItemRepository
{
    public EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::query();
    }

    /**
     * @param ItemDto[] $itemsEntityDto
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function massAdd(array $itemsEntityDto)
    {
        foreach ($itemsEntityDto as $field) {
            $entity = new Item();

            $entity->setName($field->name);
            $entity->setKey($field->key);
            $entity->setPhone($field->phone);
            $entity->setCreatedAt(new \DateTime($field->createdAt));
            $entity->setUpdatedAt(new \DateTime($field->updatedAt));

            $this->entityManager->persist($entity);
        }

        $this->entityManager->flush();
    }

    public function add(Item $itemEntity, ItemDto $itemDto)
    {
        $itemEntity->setName($itemDto->name);
        $itemEntity->setKey($itemDto->key);
        $itemEntity->setPhone($itemDto->phone);
        $itemEntity->setCreatedAt(new \DateTime($itemDto->createdAt));
        $itemEntity->setUpdatedAt(new \DateTime($itemDto->updatedAt));

        $this->entityManager->persist($itemEntity);
        $this->entityManager->flush();
    }

    public function getItems(): array
    {
        return $this->entityManager->getRepository(Item::class)->findAll();
    }

    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Item::class)->find($id);
    }

    public function delete(Item $itemEntity)
    {
        $this->entityManager->remove($itemEntity);
        $this->entityManager->flush();
    }
}
