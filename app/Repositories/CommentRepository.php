<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    /**
     * @var Comment
     */

    protected  $comment; 
    
    /**
     * CommentRepository constructor
     * 
     * @param Comment $comment 
     */
    
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function save($data)
    {
        $comment = new $this->comment;

        $comment->comment = $data['comment'];
       // $Comment->user_id = Auth::id();
        $comment->user_id = $data['userId'];

        $comment->post_id = $data['postId'];

        $comment->save();

        return $comment->fresh();
    }

}