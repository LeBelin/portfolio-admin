<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Article n°') }} {{ $article->id }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gerer les article de la veille technologique') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- btn retour -->
    <a href="{{ route('articles.index') }}" class="mb-4">
        <flux:button variant="danger" icon="arrow-left">Retour</flux:button>
    </a>

    <a href="{{ $article->url }}" class="mb-4" target="_blank">
        <div class="max-w-xs mx-auto w-150 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-4 flex flex-col items-center space-y-3">
            <!-- Image en haut -->
            <img src="{{ $article->image }}" alt="Image de l'article" class="w-32 h-32 object-cover rounded-md">

            <!-- Titre -->
            <h2 class="text-lg font-bold text-center text-gray-800">{{ $article->title }}</h2>

            <!-- Date -->
            <p class="text-sm text-gray-500 text-center">Publié le {{ $article->date_article }}</p>

            <!-- Boutons icônes -->
            <div class="flex space-x-2 mt-2">
                <a href="{{ route('articles.edit', $article->id) }}">
                    <flux:button variant="ghost" icon="pencil" title="Modifier"></flux:button>
                </a>
                <a wire:click="delete({{ $article->id }})" wire:confirm="Tes sur de suprimmer l'article ?" href="{{ route('articles.index') }}">
                    <flux:button variant="ghost" icon="trash" title="Supprimer"></flux:button>
                </a>
            </div>
        </div>
    </a>



</div>