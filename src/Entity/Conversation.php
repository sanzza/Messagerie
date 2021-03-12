<?php

namespace App\Entity;

use App\Repository\ConversationRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * @ORM\Entity(repositoryClass=ConversationRepository::class)
 * @ORM\Table(indexes={@Index(name="last_message_id_index", columns={"last_message_id"})})
 */
class Conversation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="conversation")
     */
    private $participants;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Message")
     * @ORM\JoinColumn(name="last_message_id", referencedColumnName="id")
     */
    private $lastMessage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="conversation")
     */
    private $messages;

    public function getId(): ?int
    {
        return $this->id;
    }
}
