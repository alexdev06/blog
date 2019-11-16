<?php
namespace ADABlog\Model;

use \ADABlog\Entity\News;

class NewsManagerPDO extends NewsManager
{
    public function getList($start = -1, $limit = -1)
    {
        $sql = 'SELECT id, author, title, content, date_create, date_update FROM news ORDER BY date_create DESC';

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
        }

        $request = $this->dao->query($sql);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\ADABlog\Entity\News');

        $listNews = $request->fetchAll();

        foreach ($listNews as $News) {
            $News->setDate_create(new \DateTime($News->date_create()));
            $News->setDate_update(new \DateTime($News->date_Update()));
        }

        $request->closeCursor();

        return $listNews;
    }

    public function getUnique($id)
    {
        $sql = 'SELECT id, author, title, content, date_create, date_update FROM news WHERE id = :id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':id', $id);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\News');

        if ($news = $request->fetch()) {
            $news->setDate_create(new \DateTime($news->date_create()));
            $news->setDate_update(new \DateTime($news->date_update()));

            return $news;
        }

        return null;
    }

    public function count()
    {
        return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    protected function add(News $news)
    {
        $sql = 'INSERT INTO news SET author = :author, title = :title, content = :content, date_create = NOW(), date_update = NOW()';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':title', $news->title());
        $request->bindValue(':author', $news->author());
        $request->bindValue(':content', $news->content());
        $request->execute();
    }

    public function modify(News $news)
    {
        $sql = 'UPDATE news SET author = :author, title = :title, content = :content, date_update = NOW() WHERE id = :id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':title' , $news->title());
        $request->bindValue(':author', $news->author());
        $request->bindValue(':content', $news->content());
        $request->bindValue(':id', $news->id(), \PDO::PARAM_INT);
        $request->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM news WHERE id = ' . (int) $id);
    }


}