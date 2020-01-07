<?php

class Post
{

    public $id;
    public $title;
    public $content;
    public $author;
    public $tags;

    public function __construct($title, $content, $author, $tags)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author=$author;
        $this->tags = $tags;
    }

    public function getTags()
    {
        echo $this->tags;
    }
}
