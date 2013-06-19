<?php
namespace Skonsoft\TranslatorBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * WordTranslationTranscript Describe a world translation transcript in different alphabets
 * e.g: Hello (en) can be transcripted using other alphabets than latin (chinese, imazighen, ...)
 *
 * @author mabroukskander<at>gmail.com
 *
 * @ORM\MappedSuperclass
 */
abstract class WordTranslationTranscript
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
     * @var string
     *
     * @ORM\Column(name="alphabet", type="string", length=10)
     */
    protected $alphabet;

    /**
     * @ORM\ManyToOne(targetEntity="WordTranslation", inversedBy="transcripts")
     * @ORM\JoinColumn(name="word_translation_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $wordTranslation;

    /**
     * 
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @param integer $id
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslationTranscript
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Transcripted value
     * 
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * 
     * @param string $value
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslationTranscript
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * 
     * @return string transcripted alphabet
     */
    public function getAlphabet()
    {
        return $this->alphabet;
    }

    /**
     * 
     * @param string $alphabet
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslationTranscript
     */
    public function setAlphabet($alphabet)
    {
        $this->alphabet = $alphabet;
        return $this;
    }

    /**
     * 
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslation
     */
    public function getWordTranslation()
    {
        return $this->wordTranslation;
    }

    /**
     * 
     * @param \Skonsoft\TranslatorBundle\Model\WordTranslation $wordTranslation
     * @return \Skonsoft\TranslatorBundle\Model\WordTranslationTranscript
     */
    public function setWordTranslation($wordTranslation)
    {
        $this->wordTranslation = $wordTranslation;
        return $this;
    }

}
?>
