<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Blog') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gerer les blogs du portfolio') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- message de succès -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)" class="p-4 mb-4 text-sm text-green-800 bg-green-100 border-l-4 border-green-500 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- btn ajouter -->
    <a href="{{ route('blogs.index') }}">
        <flux:button variant="primary" icon="plus">Ajouter un blog</flux:button>
    </a>

    <!-- Barre de recherche -->
    <div style="padding: 10px;"></div>
    <flux:input kbd="⌘K" icon="magnifying-glass" placeholder="Rechercher..." type="text" id="search"/>
    
    <script>
        document.getElementById('search').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>

    <!-- tableau -->
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700 mt-2 space-y-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="background-color:#f0f7ff;">
                <tr>
                    <th scope="col" class="px-6 py-3">Titre</th>
                    <th scope="col" class="px-6 py-3">Url</th>
                    <th scope="col" class="px-6 py-3">desc apercus</th>
                    <th scope="col" class="px-6 py-3">content</th>
                    <th scope="col" class="px-6 py-3">Images</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs->sortByDesc('published_at') as $blog)
                    <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">  
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            {{ $blog->title }}
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            <a href="https://andybelin.com/blog/{{ $blog->slug }}" target="_blank">
                                <flux:button variant="primary" size="sm" icon="link">Lien</flux:button>
                            </a>
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            {{ $blog->excerpt }}
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            {{ $blog->content }}
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            <img src="{{ $blog->image }}" alt="Article Image" class="object-cover rounded" style="width: 200px; height: auto;">
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            {{ \Carbon\Carbon::parse($blog->published_at)->locale('fr')->translatedFormat('d F Y') }}
                        </td>

                        <td class="px-6 py-2">
                            <flux:dropdown>
                                <flux:button variant="primary" icon="chevron-down">
                                    Options
                                </flux:button>
                                <flux:menu>
                                    <a href="{{ route('blogs.index', $blog->id) }}">
                                        <flux:menu.item icon="eye" kbd="👀">
                                            Voir
                                        </flux:menu.item>
                                    </a>
                                    <a href="{{ route('blogs.index', $blog->id) }}">
                                        <flux:menu.item icon="pencil-square" kbd="✏️">
                                            Modifier
                                        </flux:menu.item>
                                    </a>
                                    <a wire:click="delete({{ $blog->id }})" wire:confirm="Tes sur de suprimmer l'article ?" href="#">
                                        <flux:menu.item icon="trash" variant="danger" kbd="🗑️">
                                            Supprimer
                                        </flux:menu.item>
                                    </a>
                                </flux:menu>
                            </flux:dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $blogs->links() }}

</div>
