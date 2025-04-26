<?php

namespace App\Livewire\Articles;

use Livewire\Component;
use App\Models\Article;

class ArticleCreate extends Component
{
    public $title, $url, $image, $date_article;

    public function render()
    {
        return view('livewire.articles.article-create');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'image' => 'required|url',
            'date_article' => 'required|date',
        ]);

        Article::create([
            'title' => $this->title,
            'url' => $this->url,
            'image' => $this->image,
            'date_article' => $this->date_article,
        ]);

        return to_route('articles.index')->with('success', 'Article ajouter avec succée.');
    }
}
