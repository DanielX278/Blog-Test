<?php

class PostRepository
{

    public function save(Post $post)
    {
        $posts = $this->getAll();
        $posts[] = $post;
        $this->store($posts);
    }
    public function getAllByDatabase()
    {
        try {
            $username = 'root';
            $password = '';
            $pdo = new PDO('mysql:host=localhost;dbname=blogdef', $username, $password);
            $query = $pdo->query('SELECT post.user_id, post.title, post.content, user.id,user.firstName, post.id, tags.id, tags.title, post_tag.post_id, post_tag.tag_id FROM post INNER JOIN user ON post.user_id=user.id INNER JOIN post_tag ON post.id=post_tag.post_id INNER JOIN tags ON tags.id=post_tag.tag_id GROUP BY post.id');

            $postsdb = $query->fetchAll();
            $posts = [];


            foreach ($postsdb as $postdb) {
                $tagsdb = [];
                $postid = $postdb['post_id'];
                $statement = $pdo->prepare('SELECT post.id, tags.id, post_tag.post_id, tags.title, post_tag.tag_id FROM post INNER JOIN post_tag ON post.id=post_tag.post_id INNER JOIN tags ON tags.id=post_tag.tag_id WHERE post_tag.post_id=:postid');
                $statement->bindParam(':postid', $postid);
                $statement->execute();
                $id = $statement->fetchAll();
                foreach ($id as $tag) {
                    $tagsdb[] = $tag['title'];
                }

                $posts[] = new Post($postdb[1], $postdb['content'], $postdb['firstName'], $tagsdb);
            }
            return $posts;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function getAll()
    {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . 'posts.json';
        $fileContent = file_get_contents($fileName);
        $decodedContent = json_decode($fileContent, true);
        $posts = [];
        foreach ($decodedContent as $postData) {
            $posts[] = new Post($postData['title'], $postData['content'], $postData['author'], $postData['tags']);
        }
        return $posts;
    }
    public function getAllPostsByTag($selTag)
    {
        $exists = 0;
        $posts = $this->getAllByDatabase();
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
        foreach ($posts as $index => $post) {
            if ($post->title === $removing) {
                unset($posts[$index]);
            }
        }

        $this->store($posts);
    }
    public function removeByDatabase($removingdb)
    {
        $posts = $this->getAllByDatabase();
        foreach ($posts as $post) {
            
            if ($post->title === $removingdb) {
                try {
                    $username = 'root';
                    $password = '';
                    $pdo = new PDO('mysql:host=localhost;dbname=blogdef', $username, $password);
                    $statement=$pdo->prepare("DELETE FROM post WHERE title=:title");
                    $statement->bindParam(":title", $post->title);
                    $statement->execute();
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
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

    public function uploadDatabase(Post $post)
    {
        try {
            $username = 'root';
            $password = '';
            $pdo = new PDO('mysql:host=localhost;dbname=blogdef', $username, $password);
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['loggedUser']['user_id'];
            $statementPost = $pdo->prepare("INSERT INTO post (title, content, creation_date, user_id) VALUES (:title, :content, NOW(), :user_id)");
            $statementPost->bindParam(':title', $title);
            $statementPost->bindParam(':content', $content);
            $statementPost->bindParam(':user_id', $user_id);
            $statementPost->execute();
            $post_id = $pdo->lastInsertId();


            $query = $pdo->query("SELECT MAX(id) AS maxidpost from post");
            $row = $query->fetch();
            $_SESSION['maxidpost'] = $row['maxidpost'];

            foreach ($post->tags as $tag) {
                $statementTag = $pdo->prepare("INSERT INTO tags (title) VALUES (:title)");
                $statementTag->bindParam(':title', $tag);
                $statementTag->execute();
                $tag_id = $pdo->lastInsertId();
                $pdo->exec("INSERT INTO post_tag (post_id, tag_id) values ($post_id, $tag_id)");

                $query = $pdo->query("SELECT MAX(id) AS maxidtag from tags");
                $row = $query->fetch();
                $_SESSION['maxidtag'] = $row['maxidtag'];
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
