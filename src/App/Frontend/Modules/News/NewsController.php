<?php
namespace ADABlog\App\Frontend\Modules\News;
use ADABlog\Fram\BackController;
use ADABlog\Fram\HTTPRequest;
use ADABlog\Entity\Comment;

class NewsController extends BackController
{

    public function executeNewsPages(HTTPRequest $request)
    {
        $charactersLength = $this->app->config()->get('characters_length');
        $this->page->addvar('title', 'Les News');
        $this->page->addVar('visitor', $this->app->visitor());

        $this->page->addVar('page',$request->getData('page'));

        $manager = $this->managers->getManagerOf('News');

        $totalNews = $manager->count();
        $totalPages = ceil($totalNews / 5);

        if ($request->getData('page') > $totalPages) {
            $this->app->httpResponse()->redirect404();
        }
        $listeNews = $manager->getListPagined($request->getData('page'));

        foreach ($listeNews as $news) {
            if (strlen($news->content()) > $charactersLength) {
                $outset = substr($news->content(), 0, $charactersLength);
                $outset = substr($outset, 0, strrpos($outset, ' ')) . '...';

                $news->setContent($outset);
            }
        }

        $this->page->addVar('totalPages', $totalPages);
        $this->page->addVar('listeNews', $listeNews);

    }

    public function executeShow(HTTPRequest $request)
    {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
        if (empty($news)) {
            $this->app->httpResponse()->redirect404();
        }
        $this->page->addVar('visitor', $this->app->visitor());
        $this->page->addVar('title', $news->title());
        $this->page->addVar('news', $news);
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListPublishedOf($news->id()));
    }

    public function executeInsertComment(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Ajout d\'un commentaire');
        if ($request->postExists('pseudo')) {
            $comment = new Comment([
                'news_id' => $request->getData('news'),
                'author' => $request->postData('pseudo'),
                'content' => $request->postData('message')
            ]);
           
            if ($comment->isValid()) {
                $this->managers->getManagerOf('Comments')->save($comment);
                $this->app->visitor()->setFlash('Le commentaire a été envoyé.');
                $this->app->httpResponse()->redirect('news-'.$request->getData('news'));
                
            } else {
                $this->page->addVar('erreurs', $comment->erreurs());
            }
            $this->page->addVar('comment', $comment);
            
        }
    }
}