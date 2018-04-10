<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Veto
 *
 * @ORM\Table(name="veto")
 * @ORM\Entity(repositoryClass="BaseBundle\Repository\VetoRepository")
 */
class Veto
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
     * @ORM\Column(name="nomp", type="string", length=255, nullable=true)
     */
    private $nomp;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=255, nullable=true)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="longit", type="string", length=255, nullable=true)
     */
    private $longit;

    /**
     * @var string
     *
     * @ORM\Column(name="gouv", type="string", length=255, nullable=true)
     */
    private $gouv;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var int
     *
     * @ORM\Column(name="vue", type="integer", nullable=true)
     */
    private $vue;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomp
     *
     * @param string $nomp
     *
     * @return Veto
     */
    public function setNomp($nomp)
    {
        $this->nomp = $nomp;

        return $this;
    }

    /**
     * Get nomp
     *
     * @return string
     */
    public function getNomp()
    {
        return $this->nomp;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Veto
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Veto
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set longit
     *
     * @param string $longit
     *
     * @return Veto
     */
    public function setLongit($longit)
    {
        $this->longit = $longit;

        return $this;
    }

    /**
     * Get longit
     *
     * @return string
     */
    public function getLongit()
    {
        return $this->longit;
    }

    /**
     * Set gouv
     *
     * @param string $gouv
     *
     * @return Veto
     */
    public function setGouv($gouv)
    {
        $this->gouv = $gouv;

        return $this;
    }

    /**
     * Get gouv
     *
     * @return string
     */
    public function getGouv()
    {
        return $this->gouv;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Veto
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set vue
     *
     * @param integer $vue
     *
     * @return Veto
     */
    public function setVue($vue)
    {
        $this->vue = $vue;

        return $this;
    }

    /**
     * Get vue
     *
     * @return int
     */
    public function getVue()
    {
        return $this->vue;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Veto
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Veto
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Veto
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Veto
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
