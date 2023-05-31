<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\CommentService;
use Exception;
class CommentController extends Controller
{

    /**
     * @var commentService
     */
    protected $commentService;

    /**
     * PostController Constructor
     *
     * @param CommentService $commentService
     *
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }


    /**
     * Display a listing of the resource.
     */
    /*public function index($postId, $userId)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->commentService->getCommentsById($postId, $userId);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'comment',
            'userId',
            'postId',
        ]);

        $result = ['status' => 200];

        try {
            $result['comment'] = $this->commentService->saveCommentData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
