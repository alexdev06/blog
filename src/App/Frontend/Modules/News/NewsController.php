<?php
namespace ADABlog\App\Frontend\Modules\News;
use ADABlog\Fram\BackController;
use ADABlog\Fram\HTTPRequest;

class NewsController extends BackController
{
    public function executeFullList(HTTPRequest $request)
    {
        $charactersLength = $this->app->config()->get('characters_length');
        $this->page->addvar('title', 'Les news');
        $manager = $this->managers->getManagerOf('News');
        $listNews = $manager->getList();
        foreach ($listNews as $news) {
            if (strlen($news->content()) > $charactersLength) {
                $outset = substr($news->content(), 0, $charactersLength);
                $outset = substr($outset, 0, strrpos($outset, ' ')) . '...';
                $news->setContent($outset);
            }
        }
        $this->page->addVar('listNews', $listNews);
    }

    public function executeShow(HTTPRequest $request)
    {
        $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
        if (empty($news)) {
            $this->app->httpResponse()->redirect404();
        }
        $this->page->addVar('title', $news->title());
        $this->page->addVar('news', $news);
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
    }
}