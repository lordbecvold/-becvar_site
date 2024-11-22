<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VisitorRepository;

/**
 * Class Visitor
 *
 * The Visitor entity represents table in the database
 *
 * @package App\Entity
 */
#[ORM\Table(name: 'visitors')]
#[ORM\Index(name: 'visitors_email_idx', columns: ['email'])]
#[ORM\Index(name: 'visitors_ip_address_idx', columns: ['ip_address'])]
#[ORM\Index(name: 'visitors_banned_status_idx', columns: ['banned_status'])]
#[ORM\Entity(repositoryClass: VisitorRepository::class)]
class Visitor
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $first_visit = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $last_visit = null;

    #[ORM\Column(length: 255)]
    private ?string $browser = null;

    #[ORM\Column(length: 255)]
    private ?string $os = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $ip_address = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private ?bool $banned_status = null;

    #[ORM\Column(length: 255)]
    private ?string $ban_reason = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $banned_time = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    /**
     * Get visitor id
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get visitor first visit
     *
     * @return DateTimeInterface|null The first visit
     */
    public function getFirstVisit(): ?DateTimeInterface
    {
        return $this->first_visit;
    }

    /**
     * Set visitor first visit
     *
     * @param DateTimeInterface $first_visit The first visit
     *
     * @return static The visitor object
     */
    public function setFirstVisit(DateTimeInterface $first_visit): static
    {
        $this->first_visit = $first_visit;

        return $this;
    }

    /**
     * Get visitor last visit
     *
     * @return DateTimeInterface|null The last visit
     */
    public function getLastVisit(): ?DateTimeInterface
    {
        return $this->last_visit;
    }

    /**
     * Set visitor last visit
     *
     * @param DateTimeInterface $last_visit The last visit
     *
     * @return static The visitor object
     */
    public function setLastVisit(DateTimeInterface $last_visit): static
    {
        $this->last_visit = $last_visit;

        return $this;
    }

    /**
     * Get visitor browser
     *
     * @return string|null The browser
     */
    public function getBrowser(): ?string
    {
        return $this->browser;
    }

    /**
     * Set visitor browser
     *
     * @param string $browser The browser
     *
     * @return static The visitor object
     */
    public function setBrowser(string $browser): static
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get visitor os
     *
     * @return string|null The os
     */
    public function getOs(): ?string
    {
        return $this->os;
    }

    /**
     * Set visitor os
     *
     * @param string $os The os
     *
     * @return static The visitor object
     */
    public function setOs(string $os): static
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Get visitor city
     *
     * @return string|null The city name
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set visitor city
     *
     * @param string $city The city name
     *
     * @return static The visitor object
     */
    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get visitor country
     *
     * @return string|null The country name
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Set visitor country
     *
     * @param string $country The country name
     *
     * @return static The visitor object
     */
    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get visitor ip address
     *
     * @return string|null The ip address
     */
    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    /**
     * Set visitor ip address
     *
     * @param string $ip_address The ip address
     *
     * @return static The visitor object
     */
    public function setIpAddress(string $ip_address): static
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    /**
     * Get visitor banned status
     *
     * @return bool|null The banned status
     */
    public function getBannedStatus(): ?bool
    {
        return $this->banned_status;
    }

    /**
     * Set visitor banned status
     *
     * @param bool $banned_status The banned status
     *
     * @return static The visitor object
     */
    public function setBannedStatus(bool $banned_status): static
    {
        $this->banned_status = $banned_status;

        return $this;
    }

    /**
     * Get visitor ban reason
     *
     * @return string|null The ban reason
     */
    public function getBanReason(): ?string
    {
        return $this->ban_reason;
    }

    /**
     * Set visitor ban reason
     *
     * @param string $ban_reason The ban reason
     *
     * @return static The visitor object
     */
    public function setBanReason(string $ban_reason): static
    {
        $this->ban_reason = $ban_reason;

        return $this;
    }

    /**
     * Get visitor banned time
     *
     * @return DateTimeInterface|null The banned time
     */
    public function getBannedTime(): ?DateTimeInterface
    {
        return $this->banned_time;
    }

    /**
     * Set visitor banned time
     *
     * @param DateTimeInterface|null $banned_time The banned time
     *
     * @return static The visitor object
     */
    public function setBannedTime(?DateTimeInterface $banned_time): static
    {
        $this->banned_time = $banned_time;

        return $this;
    }

    /**
     * Get visitor email
     *
     * @return string|null The email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set visitor email
     *
     * @param string $email The email
     *
     * @return static The visitor object
     */
    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
