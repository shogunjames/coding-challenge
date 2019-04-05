<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
 */
class Blog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $headline;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $urlid;

    /**
     * @ORM\Column(type="text")
     */
    private $urlslug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $introduction;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $introductiontext;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $displayDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $authorid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $authorfirstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $authorlastname;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $imageid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $imagetext;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="text")
     */
    private $source;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getUrlid(): ?string
    {
        return $this->urlid;
    }

    public function setUrlid(?string $urlid): self
    {
        $this->urlid = $urlid;

        return $this;
    }

    public function getUrlslug(): ?string
    {
        return $this->urlslug;
    }

    public function setUrlslug(string $urlslug): self
    {
        $this->urlslug = $urlslug;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(?string $introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }

    public function getIntroductiontext(): ?string
    {
        return $this->introductiontext;
    }

    public function setIntroductiontext(?string $introductiontext): self
    {
        $this->introductiontext = $introductiontext;

        return $this;
    }

    public function getDisplayDate(): ?string
    {
        return $this->displayDate;
    }

    public function setDisplayDate(?string $displayDate): self
    {
        $this->displayDate = $displayDate;

        return $this;
    }

    public function getAuthorid(): ?int
    {
        return $this->authorid;
    }

    public function setAuthorid(?int $authorid): self
    {
        $this->authorid = $authorid;

        return $this;
    }

    public function getAuthorfirstname(): ?string
    {
        return $this->authorfirstname;
    }

    public function setAuthorfirstname(?string $authorfirstname): self
    {
        $this->authorfirstname = $authorfirstname;

        return $this;
    }

    public function getAuthorlastname(): ?string
    {
        return $this->authorlastname;
    }

    public function setAuthorlastname(?string $authorlastname): self
    {
        $this->authorlastname = $authorlastname;

        return $this;
    }

    public function getImageid(): ?int
    {
        return $this->imageid;
    }

    public function setImageid(?int $imageid): self
    {
        $this->imageid = $imageid;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getImagetext(): ?string
    {
        return $this->imagetext;
    }

    public function setImagetext(?string $imagetext): self
    {
        $this->imagetext = $imagetext;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

}
