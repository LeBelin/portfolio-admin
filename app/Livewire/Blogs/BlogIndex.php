<?php

namespace App\Livewire\Blogs;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blogs.blog-index', [
            'blogs' => Blog::paginate(10),
        ]);
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return to_route('blogs.index')->with('success', 'Blog supprimé avec succès.');
    }
}
