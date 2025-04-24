<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Flux;

class ArticleCreate extends Component
{
    public $title;
    public $url;
    public $image;
    public $date_article;
    public $showSuccessMessage = false;

    public function render()
    {
        return view('livewire.article-create');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'image' => 'required',
            'date_article' => 'required|date',
        ]);

        Article::create([
            'title' => $this->title,
            'url' => $this->url,
            'image' => $this->image,
            'date_article' => $this->date_article,
            'created_at' => now(), // Ajoutez la valeur de created_at
            'updated_at' => now(), // Ajoutez la valeur de updated_at
        ]);
        

        $this->showSuccessMessage = true;
        $this->resetForm();

        Flux::modal("create-article")->close();

        $this->dispatch("reloadArticles");
    }

    public function resetForm()
    {
        $this->title = '';
        $this->url = '';
        $this->image = '';
        $this->date_article = '';
    }
}
