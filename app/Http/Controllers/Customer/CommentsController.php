<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\CommentPusherEvent;
use App\Models\Comment;
use App\Models\Product;
use Auth;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::with('user')->get();
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
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        broadcast(new CommentPusherEvent($comment))->toOthers();

        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::findOrFail($id);

        $comments = Comment::where('product_id', $id)->orderBy('created_at', 'desc')->paginate(5);

        if(count($comments)) {
            return view('customers.products.sections.comment', compact('comments'));
        } else {
            return "empty";
        }
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
        if(Comment::findOrFail($id)->update($request->all())) {
            $comment = Comment::findOrFail($id);
            broadcast(new CommentPusherEvent($comment))->toOthers();
            return "success";
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        broadcast(new CommentPusherEvent($comment->toArray()))->toOthers();

        return $id;
    }
}
