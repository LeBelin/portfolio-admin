<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Modifier un article') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gerer les article de la veille technologique') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- btn retour -->
    <a href="{{ route('articles.index') }}" class="mb-4">
        <flux:button variant="danger"><flux:icon.arrow-left />Retour</flux:button>
    </a>

    <div class="w-150">
        <form wire:submit="submit" class="mt-6 space-y-6">
            <flux:input wire:model="title" type="text" label="Titre" description="Modifier le titre de l'article." placeholder="Titre de l'article" />
            <flux:input wire:model="url" type="url" label="Lien" description="Modifier le lien l'article." placeholder="URL de l'article" />
            <flux:input wire:model="image" type="url" label="Image" description="Modifier l'url de l'image de l'article." placeholder="URL de l'image" />
            <flux:input wire:model="date_article" type="date" label="Date" description="Modifier la date de l'article." placeholder="Date de l'article" />
            <flux:button type="submit" variant="primary">Modifier</flux:button>
        </form>
    </div>

</div>
