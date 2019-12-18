<?php
namespace ADABlog\Model;

use \ADABlog\Entity\News;

class NewsManagerPDO extends NewsManager
{
    public function getList($start = -1, $limit = -1)
    {
        $sql = 'SELECT id, author, title, lead, content, date_create AS dateCreate, date_update AS dateUpdate, user_username AS userUsername FROM news ORDER BY date_create DESC';

        if ($start != -1 || $limit != -1) {
            $sql .= ' LIMIT '.(int) $limit.' OFFSET '.(int) $start;
        }

        $request = $this->dao->query($sql);
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\ADABlog\Entity\News');

        $listNews = $request->fetchAll();

        foreach ($listNews as $News) {
            $News->setDateCreate(new \DateTime($News->dateCreate()));
            $News->setDateUpdate(new \DateTime($News->dateUpdate()));
        }

        $request->closeCursor();

        return $listNews;
    }

    public function getListPagined($page)
    {
        $limite = 5;
        $debut = ($page - 1) * $limite;
        $sql = 'SELECT id , author, title, lead, content, date_create AS dateCreate, date_update AS dateUpdate, user_username AS userUsername FROM news ORDER BY date_create DESC LIMIT :limit OFFSET :debut';
        $requete = $this->dao->prepare($sql);
        
        $requete->bindValue(':limit', $limite, \PDO::PARAM_INT);
        $requete->bindValue(':debut', $debut, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\ADABlog\Entity\News');

        $listeNews = $requete->fetchAll();

        foreach ($listeNews as $News) {
            $News->setDateCreate(new \DateTime($News->dateCreate()));
            $News->setDateUpdate(new \DateTime($News->dateUpdate()));
        }

        $requete->closeCursor();

        return $listeNews;

    }

    public function getUnique($id)
    {
        $sql = 'SELECT id, author, title, lead, content, date_create AS dateCreate, date_update AS dateUpdate, user_username AS userUsername FROM news WHERE id = :id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':id', $id);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\News');

        if ($news = $request->fetch()) {
            $news->setDateCreate(new \DateTime($news->dateCreate()));
            $news->setDateUpdate(new \DateTime($news->dateUpdate()));

            return $news;
        }

        return null;
    }

    public function count()
    {
        return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    public function add(News $news)
    {
        $sql = 'INSERT INTO news SET author = :author, title = :title, lead=:lead, content = :content, date_create = NOW(), date_update = NOW(), user_username = :user_username';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':title', $news->title());
        $request->bindValue(':author', $news->author());
        $request->bindValue(':lead', $news->lead());
        $request->bindValue(':content', $news->content());
        $request->bindValue(':user_username', $news->userUsername());

        $request->execute();
    }

    public function modify(News $news)
    {
        $sql = 'UPDATE news SET author = :author, title = :title, lead = :lead, content = :content, date_update = NOW(), user_username = :user_username WHERE id = :id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':title' , $news->title());
        $request->bindValue(':author', $news->author());
        $request->bindValue(':content', $news->content());
        $request->bindValue(':lead', $news->lead());
        $request->bindValue(':id', $news->id(), \PDO::PARAM_INT);
        $request->bindValue(':user_username', $news->userUsername());

        $request->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM news WHERE id = ' . (int) $id);
    }


}