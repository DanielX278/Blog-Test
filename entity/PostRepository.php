<?php

class PostRepository
{

    public function save(Post $post)
    {
        $posts = $this->getAll();
        $posts[] = $post;
        $this->store($posts);
    }
    public function getAll()
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'posts.json';
        $fileContent = file_get_contents($fileName);
        $decodedContent = json_decode($fileContent, true);
        $posts = [];
        foreach ($decodedContent as $postData) {
            $posts[] = new Post($postData['title'], $postData['content'], $postData['tags']);
        }
        return $posts;
    }
    public function getAllPostsByTag($selTag)
    {
        $exists = 0;
        $posts = $this->getAll();
        foreach ($posts as $i => $post) {
            foreach ($post->tags as $tag) {
                if ($tag == $selTag) {
                    $exists = 1;
                }
            }
            if ($exists != 1) {
                unset($posts[$i]);
            }
            $exists = 0;
        }
        return $posts;
    }

      public function remove($removing)
    {
        $posts = $this->getAll();
        foreach ($posts as $index => $post){
            if ($post->title === $removing) {
                unset($posts[$index]);
            }
        }

        $this->store($posts);
    } 

    public function store($posts)
    {
        $postString = json_encode($posts, JSON_PRETTY_PRINT);
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'posts.json';
        file_put_contents($fileName, $postString);
    }

    public function uploadDatabase()
    {
        try {
            $username = 'root';
            $password = '';
            $pdo = new PDO('mysql:host=localhost;dbname=blog', $username, $password);
            $title = $_POST['title'];
            $content = $_POST['content'];
            $query = <<<EOT
            INSERT INTO post (
            title,
            content,
            creation_date)
            VALUES (
            '$title',
            '$content',
            NOW()
             )
            EOT;
            $pdo->exec($query);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
