<?php
namespace ADABlog\Entity;

use \ADABlog\Fram\Entity;

class Comment extends Entity
{
    protected $author;
    protected $content;
    protected $date_create;
    protected $published;
    protected $news_id;

    const AUTEUR_INVALIDE = 1;
    const CONTENU_INVALIDE = 2;
    const REFERENCE_INVALIDE = 3;
    const PUBLICATION_INVALIDE = 4;

    public function isValid()
    {
        return !(empty($this->author) || empty($this->content));
    }

    // SETTERS //
    
    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author)) {
            $this->erreurs[] = self::AUTEUR_INVALIDE;
        }

        $this->author = $author;
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

    public function setNews_id($news_id)
    {
        if (!is_integer($news_id) || empty($news_id)) {
            $this->erreurs[] = self::REFERENCE_INVALIDE;
        }

        $this->news_id = $news_id;
    }

    public function setPublished($published)
    {
        $this->published = $published;
    }

    // GETTERS //

    public function author()
    {
        return $this->author;
    }

    public function content()
    {
        return $this->content;
    }

    public function date_create()
    {
        return $this->date_create;
    }

    public function published()
    {
        return $this->published;
    }

    public function news_id()
    {
        return $this->news_id;
    }

}