<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\On;
use Flux;

class ArticleEdit extends Component
{
    public $title;
    public $url;
    public $image;
    public $date_article;
    public $articleId;
    public $showSuccessMessage = false;

    public function render()
    {
        return view('livewire.article-edit');
    }

    #[On('editArticle')]
    public function editArticle($id)
    {
        $article = Article::find($id);

        $this->articleId = $id;
        $this->title = $article->title;
        $this->url = $article->url;
        $this->image = $article->image;
        $this->date_article = $article->date_article;

        Flux::modal('edit-article')->show();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'image' => 'required',
            'date_article' => 'required',
        ]);

        $article = Article::find($this->articleId);
        $article->title = $this->title;
        $article->url = $this->url;
        $article->image = $this->image;
        $article->date_article = $this->date_article;
        $article->save();

        Flux::modal('edit-article')->close();
        $this->dispatch('reloadArticles');

        $this->showSuccessMessage = true;
    }
}
