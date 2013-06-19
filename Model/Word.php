<?php

namespace Skonsoft\Bundle\TranslatorBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Keyword
 *
 * @ORM\MappedSuperclass
 * @ORM\Table(name="skonsoft_translator_word")
 * @Gedmo\TranslationEntity(class="\Skonsoft\Bundle\TranslatorBundle\Model\WordTranslation")
 */
abstract class Word {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(
     *   targetEntity="WordTranslation",
     *   mappedBy="object",
     *   cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->translations = new ArrayCollection();
    }

    /**
     * Add translation
     *
     * @param WordTranslation $translation
     * @return Keyword
     */
    public function addTranslation(Skonsoft\Bundle\TranslatorBundle\Model\WordTranslation $translation) {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setObject($this);
        }

        return $this;
    }

    /**
     * Remove translation
     *
     * @param WordTranslation $translation
     */
    public function removeTranslation(Skonsoft\Bundle\TranslatorBundle\Model\WordTranslation $translation) {
        $this->translations->removeElement($translation);
    }

    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getTranslations() {
        return $this->translations;
    }
    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $translations
     * @return type
     */
    public function setTranslations(\Doctrine\Common\Collections\ArrayCollection $translations) {
        return $this->translations = $translations;
    }

}
