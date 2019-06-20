<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Votes
 *
 * @Table(name="votes")
 * @Entity
 */
class Vote
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $choice;

    /**
     * @ManyToOne(targetEntity="Poll")
     * @JoinColumn(name="poll_id", referencedColumnName="id")
     */
    private $poll;

    /**
     * @ManyToOne(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getChoice()
    {
        return $this->choice;
    }

    public function setChoice($choice)
    {
        $this->choice = $choice;
    }

    public function getPoll()
    {
        return $this->poll;
    }

    public function setPoll($poll)
    {
        $this->poll = $poll;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

}
