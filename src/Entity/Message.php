<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(type: 'string')]
    private ?string $username=null;


    #[ORM\Column(type: 'string')]
    private ?string $message =null;


    #[ORM\Column(type: 'datetime')]
    private ?Datetime $timestamp =null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setUsername(string $username):void
    {
        $this->username=$username;
    }

    public function setMessage(string $message):void
    {
        $this->message=$message;
    }

    public function setTimestamp(DateTime $param):void
    {
        $this->timestamp=$param;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return DateTime|null
     */
    public function getTimestamp(): ?DateTime
    {
        return $this->timestamp;
    }


}
