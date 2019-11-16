<?php
namespace ADABlog\Entity;

use \ADABlog\Fram\Entity;

class News extends Entity 
{
    protected $author;
    protected $title;
    protected $content;
    protected $date_create;
    protected $date_update;

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;
    const USER_INVALIDE = 4;
    const HEADER_INVALIDE = 5;

    public function isValid()
    {
        return !( empty($this->author)  || empty($this->title) || empty($this->content));
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

    public function setContent($content)
    {

        if (!is_string($content) || empty($content)) {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        }

        $this->content = $content;
    }

    public function setDate_create(\DateTime $dateCreate)
    {
        $this->date_create = $dateCreate;
    }

    public function setDate_update(\DateTime $dateUpdate)
    {
        $this->date_update = $dateUpdate;
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
 
    public function content()
    {
        return $this->content;
    }

    public function date_create()
    {
        return $this->date_create;
    }

    public function date_update()
    {
        return $this->date_update;
    }
}