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
abstract class WordTranslation extends AbstractPersonalTranslation{

    /**
     * Convinient constructor
     *
     * @param string $locale
     * @param string $field
     * @param string $value
     */
    public function __construct($locale = null, $field = null, $value = null) {
        $this->setLocale($locale);
        $this->setField($field);
        $this->setContent($value);
        $this->suggestions = new ArrayCollection();
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

}
