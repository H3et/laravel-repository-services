<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

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
        return $this->post->with('comment')->get();
    }

        /**
     * Get post by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->post
            ->where('id', $id)
            ->with('comment')
            ->get();
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
}