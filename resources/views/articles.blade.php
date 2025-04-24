<x-layouts.app :title="__('Articles')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">Articles</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gérer les articles') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <livewire:articles />
</x-layouts.app>
