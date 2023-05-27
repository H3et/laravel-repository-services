<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CommentService
{
    /**
     * @var $commentRepository
     */
    protected $commentRepository;

    /**
     * PostService constructor.
     *
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

     /**
     * Validate post data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveCommentData($data)
    {
        $validator = Validator::make($data, [
            'comment' => 'required',
            'userId' => 'required',
            'postId' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->commentRepository->save($data);

        return $result;
    }

}