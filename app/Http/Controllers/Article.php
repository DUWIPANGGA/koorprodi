<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\article as ModelsArticle;

class Article extends Controller
{
    public function index()
    {
        $articles = ModelsArticle::all();
        return view('article.show', compact('articles'));
    }

    public function main()
    {
        $articles = ModelsArticle::all();
        return view('article.index', compact('articles'));
    }

    public function showDetail($id)
    {
        $article = ModelsArticle::find($id);
        $recommendedArticles = ModelsArticle::latest()->take(8)->get();
        return view('article.show', compact('article', 'recommendedArticles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'picture_article' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);
        $path = $request->file('picture_article')->store('uploads/article', 'public');
        $result = ModelsArticle::create([
            'judul' => $request->title,
            'user_id' => Auth::user()->id,
            'content' => $request->content,
            'picture_article' => $path,
        ]);
        if ($result) {
            return redirect()->route('article.show', $result->id)->with('success', 'Successfully saved to the database');
        } else {
            return redirect()->route('article.create')->with('error', 'Failed to save to the database');
        }
    }

    public function show(string $id)
    {
        $article = ModelsArticle::find($id);
        $recommendedArticles = ModelsArticle::latest()->take(8)->get();
        return view('article.edit', compact('article', 'recommendedArticles'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'picture_article' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $article = ModelsArticle::findOrFail($id);
        $article->judul = $request->title;
        $article->content = $request->content;
        if ($request->hasFile('picture_article')) {
            Storage::delete('public/' . $article->picture_article);
            $path = $request->file('picture_article')->store('uploads', 'public');
            $article->picture_article = $path;
        }
        $article->save();
        return redirect()->route('article.main')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $article = ModelsArticle::findOrFail($id);
        $article->delete();
        return redirect()->route('article.main')->with('success', 'Article deleted successfully');
    }
}
