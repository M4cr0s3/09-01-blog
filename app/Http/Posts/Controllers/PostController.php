<?php

namespace App\Http\Posts\Controllers;

use App\Core\Enums\ModerationEnum;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function moderation(Request $request): View
    {
        $posts = Post::query()
            ->where(
                'moderation',
                $request->query('moderation_type', ModerationEnum::PENDING)
            )
            ->get();

        return view('post.moderation', compact('posts'));
    }

    public function moderate(Request $request, Post $post): RedirectResponse
    {
        $post->update([
            'moderation' => $request->input('moderation'),
            'moderation_comment' => $request->input('moderation_comment')
        ]);

        return redirect()->route('posts.moderation');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
