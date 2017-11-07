<?php

namespace Sides\PollBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\MappedSuperclass
 * @ORM\Table(name="opinion")
 */
abstract class BaseOpinion
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
     * @var integer $votes
     */
    protected $votes;

    /**
     * @var integer $ordering
     */
    protected $ordering;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @var \Sides\PollBundle\Entity\BasePoll
     */
    protected $poll;

    /**
     * @var float $votesPercentage
     */
    protected $votesPercentage;


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
     * @return $this
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
     * Set votes
     *
     * @param integer $votes
     *
     * @return BaseOpinion
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes
     *
     * @return integer 
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     *
     * @return BaseOpinion
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer 
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BaseOpinion
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
     * @return BaseOpinion
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
     * Set poll
     *
     * @param \Sides\PollBundle\Entity\BasePoll $poll
     */
    public function setPoll(\Sides\PollBundle\Entity\BasePoll $poll)
    {
        $this->poll = $poll;
    }

    /**
     * Get poll
     *
     * @return \Sides\PollBundle\Entity\BasePoll
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->id) {
            return $this->name;
        }

        return 'New Choice';
    }

    /**
     * Get the votes percentage
     *
     * @return float
     */
    public function getVotesPercentage()
    {
        if ($this->votesPercentage) {
            return $this->votesPercentage;
        }

        if ($this->poll->getTotalVotes() > 0) {
            return $this->votesPercentage = round($this->votes / $this->poll->getTotalVotes() * 100);
        }

        return 0;
    }
}
