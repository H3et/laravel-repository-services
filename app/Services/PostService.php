<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostService
{
    /**
     * @var $postRepository
     */
    protected $postRepository;

    /**
     * PostService constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Get all post.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    /**
     * Get post by id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

}