<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Article') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gerer les article de la veille technologique') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- message de succès -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)" class="p-4 mb-4 text-sm text-green-800 bg-green-100 border-l-4 border-green-500 rounded-lg shadow-md transition-all transform hover:scale-105 hover:shadow-xl">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- btn ajouter -->
    <a href="{{ route('articles.create') }}" class="mb-4">
        <flux:button variant="primary"><flux:icon.plus />Ajouter un article</flux:button>
    </a>

    <!-- Barre de recherche -->
    <div style="padding: 5px;"></div>
    <flux:input kbd="⌘K" icon="magnifying-glass" placeholder="Rechercher..." type="text" id="search"/>
    <div style="padding: 5px;"></div>
    
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
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700 mt-6 space-y-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="background-color:#f0f7ff;">
                <tr>
                    <th scope="col" class="px-6 py-3">Titre</th>
                    <th scope="col" class="px-6 py-3">Url</th>
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Date de l'article</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles->sortByDesc('date_article') as $article)
                    <tr class="odd:bg-white even:bg-gray-50 border-b dark:border-gray-700 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            {{ $article->title }}
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            <a href="{{ $article->url }}" target="_blank">
                                <flux:button variant="primary" size="sm"><flux:icon.link /> Lien</flux:button>
                            </a>
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            <img src="{{ $article->image }}" alt="Article Image" class="object-cover rounded" style="width: 200px; height: auto;">
                        </td>
                        <td class="px-6 py-2 text-gray-600 dark:text-gray-300">
                            {{ \Carbon\Carbon::parse($article->date_article)->locale('fr')->translatedFormat('d F Y') }}
                        </td>

                        <td class="px-6 py-2">
                            <flux:dropdown>
                                <flux:button variant="primary">
                                    <flux:icon.chevron-down />Options
                                </flux:button>
                                <flux:menu>
                                    <a href="{{ route('articles.edit', $article->id) }}">
                                        <flux:menu.item icon="pencil-square" kbd="✏️">
                                            Modifier
                                        </flux:menu.item>
                                    </a>
                                    <a wire:click="delete({{ $article->id }})" wire:confirm="Tes sur de suprimmer l'article ?" href="#">
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

</div>
