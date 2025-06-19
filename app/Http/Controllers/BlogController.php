<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        $posts = Post::published()
            ->with('author')
            ->latest('published_at')
            ->paginate(9);
            
        return view('pages.blog.index', compact('posts'));
    }
    
    /**
     * Display the specified blog post.
     */
    public function show(Post $post)
    {
        // Ensure only published posts are visible
        if (!$post->is_published || $post->published_at > now()) {
            abort(404);
        }
        
        // Get related posts
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();
            
        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
