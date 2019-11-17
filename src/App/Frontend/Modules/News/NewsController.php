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
}