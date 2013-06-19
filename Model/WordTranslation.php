<?php
namespace Skonsoft\TranslatorBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractPersonalTranslation;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * WordTranslation
 *
 * @ORM\MappedSuperclass
 * @ORM\Table(name="skonsoft_word_translation,
 * uniqueConstraints={@ORM\UniqueConstraint(name="word_lookup_unique_idx", columns={
 *         "locale", "object_id", "field"
 *     })}
 * )
 */
abstract class WordTranslation extends AbstractPersonalTranslation
{

    /**
     * Convinient constructor
     *
     * @param string $locale
     * @param string $field
     * @param string $value
     */
    public function __construct($locale = null, $field = null, $value = null)
    {
        $this->setLocale($locale);
        $this->setField($field);
        $this->setContent($value);
        $this->suggestions = new ArrayCollection();
        $this->transcripts = new ArrayCollection();
    }

    /**
     * @var integer $field
     *
     * @ORM\Column(type="integer", options={"default" = 5})
     */
    protected $rank = 5;

    /**
     * @ORM\ManyToOne(targetEntity="Word", inversedBy="translations")
     * @ORM\JoinColumn(name="object_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $object;

    /**
     * @ORM\OneToMany(
     *   targetEntity="WordTranslationSuggestion",
     *   mappedBy="WordTranslation",
     *   cascade={"persist", "remove"}
     * )
     */
    protected $suggestions;

    /**
     * @ORM\OneToMany(
     *   targetEntity="WordTranslationTranscript",
     *   mappedBy="WordTranslation",
     *   cascade={"persist", "remove"}
     * )
     */
    protected $transcripts;

    /**
     * Add Suggestion
     *
     * @param \Skonsoft\TranslatorBundle\Model\WordTranslationSuggestion $suggestion
     * @return WordTranslation
     */
    public function addSuggestion(Skonsoft\TranslatorBundle\Model\WordTranslationSuggestion $suggestion)
    {
        if (!$this->suggestions->contains($suggestion)) {
            $this->suggestions[] = $suggestion;
            $suggestion->setObject($this);
        }

        return $this;
    }

    /**
     * Remove Suggestion
     *
     * @param \Skonsoft\TranslatorBundle\Model\WordTranslationSuggestion $suggestion
     */
    public function removeSuggestion(Skonsoft\TranslatorBundle\Model\WordTranslationSuggestion $suggestion)
    {
        $this->suggestions->removeElement($suggestion);
    }

    /**
     * Get Suggestions
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getSuggestions()
    {
        return $this->suggestions;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $suggestion
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslation
     */
    public function setTranslations(\Doctrine\Common\Collections\ArrayCollection $suggestion)
    {
        $this->suggestions = $suggestion;
        return $this;
    }

    /**
     * Add Transcript
     *
     * @param \Skonsoft\TranslatorBundle\Model\WordTranslationTranscript $transcript
     * @return Keyword
     */
    public function addTranscript(Skonsoft\TranslatorBundle\Model\WordTranslationTranscript $transcript)
    {
        if (!$this->transcripts->contains($transcript)) {
            $this->transcripts[] = $transcript;
            $transcript->setObject($this);
        }

        return $this;
    }

    /**
     * Remove Transcript
     *
     * @param \Skonsoft\TranslatorBundle\Model\WordTranslationTranscript $transcript
     */
    public function removeTranscript(Skonsoft\TranslatorBundle\Model\WordTranslationTranscript $transcript)
    {
        $this->transcripts->removeElement($transcript);
    }

    /**
     * Get Transcripts
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getTranscripts()
    {
        return $this->transcripts;
    }

    /**
     * 
     * @param \Doctrine\Common\Collections\ArrayCollection $transcripts
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslation
     */
    public function setTranscripts(\Doctrine\Common\Collections\ArrayCollection $transcripts)
    {
        $this->transcripts = $transcripts;
        return $this;
    }

}
