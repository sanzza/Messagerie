<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipantRepository::class)
 */
class Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\User", inversedBy="participants")
     */
    private $user;

    /**
     * @ORM\ManyToOne (targetEntity="App\Entity\Conversation", inversedBy="participants")
     */
    private $conversation;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this -> user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this -> user = $user;
    }

    /**
     * @return mixed
     */
    public function getConversation()
    {
        return $this -> conversation;
    }

    /**
     * @param mixed $conversation
     */
    public function setConversation($conversation): void
    {
        $this -> conversation = $conversation;
    }


}
