<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;

class ArticleEdit extends Component
{
    public $title, $url, $image, $date_article;
    public $articleId;

    public function mount($id)
    {
        $article = Article::find($id);
        
        $this->articleId = $article->id; // ← TRÈS IMPORTANT !!
        $this->title = $article->title;
        $this->url = $article->url;
        $this->image = $article->image;
        $this->date_article = $article->date_article;
    }
    
    

    public function render()
    {
        return view('livewire.articles.article-edit');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'image' => 'required',
            'date_article' => 'required',
        ]);
    
        // Ici on retrouve l'article avec son ID
        $article = Article::findOrFail($this->articleId);
    
        $article->title = $this->title;
        $article->url = $this->url;
        $article->image = $this->image;
        $article->date_article = $this->date_article;
        $article->save();
    
        return to_route('articles.index')->with('success', 'Article modifié avec succès.');
    }
    
}
