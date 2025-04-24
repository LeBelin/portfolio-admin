<?php

namespace App\Livewire;
use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\On;
use Flux;


class Articles extends Component
{

    public $articles;
    public $articleId;
    public $articleName;
    public $showSuccessMessage = false;
    
    // Affichage des articles
    public function mount()
    {
        $this->articles = Article::all();
    }

    public function render()
    {
        return view('livewire.articles');
    }

    //refresh a l'ajout d'un article
    #[On('reloadArticles')]
    public function reloadArticles()
    {
        $this->articles = Article::all();
    }

    public function edit($id)
    {
        $this->dispatch("editArticle", $id);
    }

    public function delete($id)
    {
        //de base
       // $this->clientId = $id;
        //Flux::modal('delete-client')->show();

        // ia
        $article = Article::find($id);
        if ($article) {
            $this->articleId = $id;
            $this->articleName = $article->title;
            Flux::modal('delete-article')->show();
        }
    }

    public function destroy()
    {
        Article::find($this->articleId)->delete();
        Flux::modal('delete-article')->close();
        $this->reloadArticles();
        $this->showSuccessMessage = true;
    }
}
