<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $articles = Article::get();

        return view('livewire.articles.article-index', [
            'articles' => Article::paginate(10),
        ]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return to_route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
