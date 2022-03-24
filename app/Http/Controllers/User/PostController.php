<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\postAttachment;
use App\Models\UserPost;
use App\Models\PostLike;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
    public function store(PostRequest $request)
    {
        // $this->authorize('create', UserPost::class);

        $validated = $request->validated();

        $userPost = new UserPost();
        $userPost->user_id = Auth::user()->id;
        $userPost->content = $validated['content'];
        $userPost->show_to = $request->show;
        $userPost->save();

        if ($request->file('files')) {
            $this->uploadFiles($request->file('files'), $userPost->id);
        }

        $request->session()->flash('status', 'Post uploaded successfully');

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserPost $userPost)
    {
        // $this->authorize('view', $userPost);

        // $userPostAttachment = $userPost->attachments()->get();

        // return view('post.show', compact('userPost', 'userPostAttachment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPost $userPost, Request $request)
    {
        //$this->authorize('delete', $userPost);

        $userPost->delete();

        // $postAttachments = $userPost->attachments();
        // $postAttachments->deleteAll();
        // Storage::delete($postAttachments->path);

        //$request->session()->flash('status', 'Todo deleted successfully');

        return redirect()->route('home');
    }

    public function add_like(Request $request)
    {
        $post_id = $request->post('post_id');

        if (PostLike::where(['post_id'=>$post_id, 'user_id'=>Auth::user()->id])->exists()) {
            PostLike::where(['post_id'=>$post_id, 'user_id'=>Auth::user()->id])->delete();
            $value=1;
        } else {
            $like = new PostLike();
            $like->user_id = Auth::user()->id;
            $like->post_id = $post_id;
            $like->save();
            $value=0;
        }

        return response()->json(['value'=>$value]);
    }

    public function add_comment(Request $request)
    {
        $post_id = $request->post('post_id');
        $commentMsg = $request->post('comment');

        $comment = new PostComment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;
        $comment->comment =$commentMsg;
        $comment->save();

        $msg = 'success';

        return response()->json(['msg'=>$msg]);
    }

    private function uploadFiles($files, $postId)
    {
        foreach ($files as $file) {
            $path =  Storage::putFile('public/post_attachments', $file);
            $todoAttachment = new PostAttachment();
            $todoAttachment->post_id = $postId;
            $todoAttachment->filename = $file->hashName();
            $todoAttachment->mime_type = $file->extension();
            $todoAttachment->filesize = $file->getSize();
            $todoAttachment->path = $path;
            $todoAttachment->save();
        }
    }
}