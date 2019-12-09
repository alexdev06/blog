<?php
namespace ADABlog\Entity;

use \ADABlog\Fram\Entity;

class News extends Entity 
{
    protected $author;
    protected $title;
    protected $lead;
    protected $content;
    protected $dateCreate;
    protected $dateUpdate;

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;
    const USER_INVALIDE = 4;
    const LEAD_INVALIDE = 5;

    public function isValid()
    {
        return !( empty($this->author)  || empty($this->title) || empty($this->lead) || empty($this->content));
    }

    // SETTERS //

    
    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author)) {
            $this->erreurs[] = self::AUTEUR_INVALIDE;
        }

        $this->author = $author;
    }

    public function setTitle($title)
    {
        if (!is_string($title) || empty($title)) {
            $this->erreurs[] = self::TITRE_INVALIDE;
        }

        $this->title = $title;
    }

    public function setLead($lead)
    {   
        if (!is_string($lead) || empty($lead)) {
            $this->erreurs[] = self::LEAD_INVALIDE;
        }

        $this->lead = $lead;
    }
    public function setContent($content)
    {

        if (!is_string($content) || empty($content)) {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }

        $this->content = $content;
    }

    public function setDateCreate(\DateTime $dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    public function setDateUpdate(\DateTime $dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;
    }


    // GETTER //

    public function author()
    {
        return $this->author;
    }

    public function title()
    {
        return $this->title;
    }
 
    public function lead()
    {
        return $this->lead;
    }

    public function content()
    {
        return $this->content;
    }

    public function dateCreate()
    {
        return $this->dateCreate;
    }

    public function dateUpdate()
    {
        return $this->dateUpdate;
    }
}