<?php

class Post
{

    public $id;
    public $title;
    public $content;
    public $tags;

    public function __construct($title, $content, $tags)
    {
        $this->title = $title;
        $this->content = $content;
        $this->tags = $tags;
    }

    public function getTags()
    {
        return $this->tags;
    }
}
