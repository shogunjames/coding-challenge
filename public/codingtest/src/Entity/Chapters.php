<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
 */
class Chapters{
/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $blogid;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chaptersorder;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chaptersheadline;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chapterstext;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chaptersimage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chapterimageid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chapterimageheight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chapterimagewidth;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chapterimagetext;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chapterimageurl;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chapterimagesource;

    public function setBlogsid(?int $blogid): self
    {
        $this->blogid = $blogid;

        return $this;
    }

    public function getChaptersorder(): ?int
    {
        return $this->chaptersorder;
    }

    public function setChaptersorder(?int $chaptersorder): self
    {
        $this->chaptersorder = $chaptersorder;

        return $this;
    }

    public function getChaptersheadline(): ?string
    {
        return $this->chaptersheadline;
    }

    public function setChaptersheadline(?string $chaptersheadline): self
    {
        $this->chaptersheadline = $chaptersheadline;

        return $this;
    }

    public function getChapterstext(): ?string
    {
        return $this->chapterstext;
    }

    public function setChapterstext(?string $chapterstext): self
    {
        $this->chapterstext = $chapterstext;

        return $this;
    }

    public function getChaptersimage(): ?string
    {
        return $this->chaptersimage;
    }

    public function setChaptersimage(?string $chaptersimage): self
    {
        $this->chaptersimage = $chaptersimage;

        return $this;
    }

    public function getChapterimageid(): ?int
    {
        return $this->chapterimageid;
    }

    public function setChapterimageid(?int $chapterimageid): self
    {
        $this->chapterimageid = $chapterimageid;

        return $this;
    }

    public function getChapterimageheight(): ?int
    {
        return $this->chapterimageheight;
    }

    public function setChapterimageheight(?int $chapterimageheight): self
    {
        $this->chapterimageheight = $chapterimageheight;

        return $this;
    }

    public function getChapterimagewidth(): ?int
    {
        return $this->chapterimagewidth;
    }

    public function setChapterimagewidth(?int $chapterimagewidth): self
    {
        $this->chapterimagewidth = $chapterimagewidth;

        return $this;
    }

    public function getChapterimagetext(): ?string
    {
        return $this->chapterimagetext;
    }

    public function setChapterimagetext(?string $chapterimagetext): self
    {
        $this->chapterimagetext = $chapterimagetext;

        return $this;
    }

    public function getChapterimageurl(): ?string
    {
        return $this->chapterimageurl;
    }

    public function setChapterimageurl(?string $chapterimageurl): self
    {
        $this->chapterimageurl = $chapterimageurl;

        return $this;
    }

    public function getChapterimagesource(): ?string
    {
        return $this->chapterimagesource;
    }

    public function setChapterimagesource(?string $chapterimagesource): self
    {
        $this->chapterimagesource = $chapterimagesource;

        return $this;
    }


}
  