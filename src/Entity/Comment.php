<?php
namespace ADABlog\Entity;

use \ADABlog\Fram\Entity;

class Comment extends Entity
{
    protected $author;
    protected $content;
    protected $dateCreate;
    protected $published;
    protected $newsId;

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

    public function setDateCreate(\DateTime $dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

    public function setNewsId($newsId)
    {
        if (!is_integer($newsId) || empty($newsId)) {
            $this->erreurs[] = self::REFERENCE_INVALIDE;
        }

        $this->newsId = $newsId;
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

    public function dateCreate()
    {
        return $this->dateCreate;
    }

    public function published()
    {
        return $this->published;
    }

    public function newsId()
    {
        return $this->newsId;
    }

}