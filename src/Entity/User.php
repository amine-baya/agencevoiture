<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 * fields= {"email"},
 * message= "L'email que vous avez indiqué est déja utilisé !"
 * )
 */
class User implements UserInterface,\Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min="8",
     * minMessage = "Votre mot de passe doit comporter au minimum 8 Caractères")
     * @Assert\EqualTo(propertyPath = "confirm_password",
     * message ="oops !")
     */
    private $password;




    /**
    
     * @Assert\EqualTo(propertyPath = "password",
     * message ="Vous n'avez pas saisi le meme mot de passe !")
     */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }
    public function getSalt()
    {
        return null;
    }


    public function eraseCredentials()
    {
        
    }

  
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,

        ]);
    }
    public function unserialize($serialize)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize($serialize,['allowed_classes' => false]);
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    

}
