<?php
namespace ADABlog\Model;

use \ADABlog\Fram\Manager;
use \ADABlog\Entity\News;

abstract class NewsManager extends Manager
{
    abstract public function getList($debut = -1, $limite = -1);

    abstract public function getUnique($id);

    abstract public function count();

    abstract public function delete($id);

    abstract public function modify(News $news);

    public function save(News $news)
    {
        if ($news->isValid()) {
            $news->isNew() ? $this->add($news) : $this->modify($news);
        } else {
            throw new \RuntimeException('La news doit être validée pour être enregistrée!');
        }
    }
}