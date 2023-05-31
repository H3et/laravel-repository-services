<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Post;
use App\Http\Resources\PostsCollection;
class PostRepository
{
    /**
     * @var Post
     */

    protected  $post; 
    
    /**
     * PostRepository constructor
     * 
     * @param Post $post 
     */
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getAll()
    {
        return PostsCollection::collection($this->post->with('comment')->get());
    }

        /**
     * Get post by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return PostsCollection::collection($this->post
            ->where('id', $id)
            ->with('comment')
            ->get());
    }

    /**
     * Save Post
     *
     * @param $data
     * @return Post
     */
    public function save($data)
    {
        $post = new $this->post;

        $post->data = $data['data'];
       // $post->user_id = Auth::id();
        $post->user_id = 1;

        $post->save();

        return $post->fresh();
    }

    public function getPostCommentsById($postId, $userId) {
        $posts = $this->post
            ->where('id', $postId)
            ->with(['comment' => function($q) use ($userId) {
                $q->where('user_id', '=', $userId);
            }])
            ->get();
        
        return PostsCollection::collection($posts);
    }

    public function getAllPostCommentsByUserId($userId) {
        $posts = $this->post
                ->whereHas('comment', function($query) use($userId) {
                    $query->whereUserId($userId);
                })->get();
        
        return PostsCollection::collection($posts);
    }
}