<?php

namespace Skonsoft\TranslatorBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * WordTranslationSuggestion
 *
 * @ORM\MappedSuperclass
 */
abstract class WordTranslationSuggestion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    protected $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="integer", options={"default" = 1})
     */
    protected $rank = 1;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="WordTranslation", inversedBy="suggestions")
     * @ORM\JoinColumn(name="word_translation_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $wordTranslation;

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
     * Set value
     *
     * @param string $value
     * @return KeywordTranslationSuggestion
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     * @return KeywordTranslationSuggestion
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return KeywordTranslationSuggestion
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
     * @return KeywordTranslationSuggestion
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
     * Set keywordTranslation
     *
     * @param Skonsoft\TranslatorBundle\Model\WordTranslation $wordTranslation
     * @return wordTranslationSuggestion
     */
    public function setWordTranslation(Skonsoft\TranslatorBundle\Model\WordTranslation $wordTranslation = null)
    {
        $this->wordTranslation = $wordTranslation;
    
        return $this;
    }

    /**
     * Get keywordTranslation
     *
     * @return Skonsoft\TranslatorBundle\Model\WordTranslation 
     */
    public function getWordTranslation()
    {
        return $this->wordTranslation;
    }
}
