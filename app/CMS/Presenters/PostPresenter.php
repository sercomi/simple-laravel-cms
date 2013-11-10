<?php namespace CMS\Presenters;

use CMS\Helpers;

/**
* User Presenter
*/
class PostPresenter extends Presenter
{
    public function created_at()
    {
        return $this->resource->created_at->format('Y-m-d');
    }

    public function content()
    {
        if (empty($this->resource->content)) {
            return Helpers::parseMarkdown($this->resource->rawContent);
        }
        return $this->resource->content;
    }

    public function excerpt()
    {
        return Helpers::excerpt(strip_tags($this->content));
    }

}
