<?php

namespace techcampBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="techcampBundle\Repository\PageRepository")
 */
class Page
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pageId", type="string", unique=true)
     */
    private $pageId;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text")
     */
    private $content;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pageID
     *
     * @param integer $pageID
     * @return Page
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;

        return $this;
    }

    /**
     * Get pageID
     *
     * @return integer 
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
}
