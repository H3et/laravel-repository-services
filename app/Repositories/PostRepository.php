<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

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
}