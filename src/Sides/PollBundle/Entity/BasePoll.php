<?php

namespace Sides\PollBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * @ORM\MappedSuperclass
 * @ORM\Table(name="poll")
 */
abstract class BasePoll
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250)
     */
    protected $name;

    /**
     * @var string
     * 
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

    /**
     * @var boolean $published
     */
    protected $published;

    /**
     * @var boolean $closed
     */
    protected $closed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime",nullable =true)
     */
    protected $updatedAt;

    /**
     * @var \Sides\PollBundle\Entity\BaseOpinion
     */
    protected $opinions;

    /**
     * @var integer $totalVotes
     */
    protected $totalVotes;

    /**
     * __construct()
     */
    public function __construct()
    {
        $this->opinions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return BasePoll
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return BasePoll
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return BasePoll
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set closed
     *
     * @param boolean $closed
     *
     * @return BasePoll
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Get closed
     *
     * @return boolean 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BasePoll
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return BasePoll
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add opinions
     *
     * @param \Sides\PollBundle\Entity\BaseOpinion $opinions
     *
     * @return BasePoll
     */
    public function addOpinion(\Sides\PollBundle\Entity\BaseOpinion $opinions)
    {
        $opinions->setPoll($this);
        $this->opinions[] = $opinions;

        return $this;
    }

    /**
     * Remove opinions
     *
     * @param \Sides\PollBundle\Entity\BaseOpinion $opinions
     */
    public function removeOpinion(\Sides\PollBundle\Entity\BaseOpinion $opinions)
    {
        $this->opinions->removeElement($opinions);
    }

    /**
     * Get opinions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOpinions()
    {
        return $this->opinions;
    }

    /**
     * Set opinions
     *
     * @param \Doctrine\Common\Collections\Collection $opinions
     */
    public function setOpinions(\Doctrine\Common\Collections\Collection $opinions)
    {
        foreach ($opinions as $opinion) {
            $opinion->setPoll($this);
        }

        $this->opinions = $opinions;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->id && $this->name) {
            return $this->name;
        }

        return 'New Poll';
    }

    /**
     * Get the total number of votes
     *
     * @return int
     */
    public function getTotalVotes()
    {
        if ($this->totalVotes) {
            return $this->totalVotes;
        }

        $this->totalVotes = 0;

        foreach ($this->opinions as $opinion) {
            $this->totalVotes += $opinion->getVotes();
        }

        return $this->totalVotes;
    }
}
