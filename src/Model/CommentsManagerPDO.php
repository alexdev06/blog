<?php
namespace ADABlog\Model;

use ADABlog\Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
    public function getListOf($news_id)
    {
        $sql = 'SELECT id, news_id, author, content, date_create, published FROM comment WHERE news_id = :news_id';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':news_id', $news_id);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\Comment');

        $comments = $request->fetchAll();

        foreach ($comments as $comment) {
            $comment->setDate_create(new \DateTime($comment->date_create()));
        }

        return $comments;
    }

    public function getListPublishedOf($news_id)
    {
        $sql = 'SELECT id, news_id, author, content, date_create, published FROM comment WHERE news_id = :news_id AND published = 1 ORDER BY date_create DESC';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':news_id', $news_id);
        $request->execute();

        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\Comment');

        $comments = $request->fetchAll();

        foreach ($comments as $comment) {
            $comment->setDate_create(new \DateTime($comment->date_create()));
        }

        return $comments;
    }

    public function getList()
    {
        $sql = 'SELECT id, news_id, author, content, date_create, published FROM comment';
        $request = $this->dao->query($sql);
      
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\Comment');

        $comments = $request->fetchAll();

        foreach ($comments as $comment) {
            $comment->setDate_create(new \DateTime($comment->date_create()));
        }

        return $comments;
    }

    public function getListUnpublished()
    {
        $sql = 'SELECT id, news_id, author, content, date_create FROM comment WHERE published = 0 ORDER BY date_create DESC';
        $request = $this->dao->query($sql);
      
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\Comment');

        $comments = $request->fetchAll();

        foreach ($comments as $comment) {
            $comment->setDate_create(new \DateTime($comment->date_create()));
        }

        return $comments;
    }

    public function add(Comment $comment)
    {
        $sql = 'INSERT INTO comment SET news_id = :news_id, author = :author, content = :content, date_create = NOW()';
        $request = $this->dao->prepare($sql);

        $request->bindValue(':news_id', $comment->news_id(), \PDO::PARAM_INT);
        $request->bindValue(':author', $comment->author());
        $request->bindValue(':content', $comment->content());
        $request->execute();

        $comment->setId($this->dao->lastInsertId());

    }
    
    public function getId($id)
    {
        $sql = 'SELECT id, news_id, author, content, published FROM comment WHERE id = :id';
        $request = $this->dao->prepare($sql);
       
        $request->bindValue(':id', $id);
        $request->execute();
        
        $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'ADABlog\Entity\Comment');
        
        $comment = $request->fetch();

        return $comment;
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM comment WHERE id = ' . (int) $id);
    }

    public function modifyCommentStatus($id)
    { 
        $comment = $this->getId($id);
        $request= $this->dao->prepare('UPDATE comment SET published = :published WHERE id = :id');
        
        $request->bindValue(':id', $comment->id());
        if ($comment->published() == 0) {
            $request->bindValue(':published', 1);
        } else {
            $request->bindValue(':published', 0);
        }

        $request->execute();
    }

}