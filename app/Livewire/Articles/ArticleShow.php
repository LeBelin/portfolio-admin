<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;

class ArticleShow extends Component
{
    public $article;

    public function mount($id)
    {
        $this->article = Article::find($id);
    }
    
    public function render()
    {
        return view('livewire.articles.article-show');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return to_route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
