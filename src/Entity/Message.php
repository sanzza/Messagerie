<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 * @ORM\Table(indexes={@Index(name="created_at_index",columns={"created_at"})})
 * @ORM\HasLifecycleCallbacks()
 */
class Message
{
    use Timestamp;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="messages")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Conversation", inversedBy="messages")
     */
    private $conversation;

    public function getId(): ?int
    {
        return $this->id;
    }
}
