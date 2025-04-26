<?php

namespace App\Livewire\Articles;
use App\Models\Article;

use Livewire\Component;

class ArticleIndex extends Component
{
    public function render()
    {
        $articles = Article::get();

        return view('livewire.articles.article-index', compact('articles'));
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return to_route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
