<?php
class CommentManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM comments WHERE id=?");
		$query->execute([$id]);
		$comment = $query->fetchObject('Comment');
		return $comment;
	}


	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM comments");
		$comments = $query->fetchAll(PDO::FETCH_CLASS, 'Comment');
		return $comments;
	}


	public function findById($id)
	{
		return $this->find($id);
	}


	public function remove(Comment $comment)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM comments WHERE id=?");
		$query->execute([$comment->getId()]);
	}


	public function create($content, $author, $rating)
	{
		$query = $this->pdo->prepare("INSERT INTO comments (content, author, rating) VALUES(?, ?, ?)");
		$query->execute([$content, $author, $rating]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}


	public function save(Comment $comment)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE comments SET content=?, id_author=?, id_article=?, note=? WHERE id=?");
		$query->execute([$comment->getContent(), $comment->getIdAuthor(), $comment->getIdArticle(), $comment->getNote(), $comment->getId()]);
		return $this->find($comment->getId());
	}
}
?>