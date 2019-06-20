<?php
// src/User.php
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity @Table(name="users")
 **/
class User
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;


    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $password;

    /**
     * @Column(type="integer")
     * @var integer
     */
    protected $isAdmin;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    // stupid simple encryption (please don't copy it!)
    public function setPassword($password)
    {
        $this->password = sha1($password);
    }

    public function getIsAdmin(){
        return $this->isAdmin;
    }

    public function setIsAdmin($admin){
        $this->isAdmin=$admin;
    }
}