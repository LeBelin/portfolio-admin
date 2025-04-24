<div>
    
    @if($showSuccessMessage)
    <div style="padding: 5px;"></div>
        <flux:callout variant="success" icon="check-circle" heading="Article modifié avec succès !" />
        <div style="padding: 5px;"></div>
    @endif


    <flux:modal name="edit-article" class="md:w-150">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Modifier l'article</flux:heading>
                <flux:subheading>Modifier les informations de l'article comme il se doit</flux:subheading>
            </div>

            <flux:input wire:model="title" label="Titre" placeholder="Titre" />
            <flux:input wire:model="url" label="Url" placeholder="l'Url" />
            <flux:input wire:model="image" label="Url de l'image" placeholder="Url de l'Image" />
            <!-- Sélecteur de la date -->
            <flux:input type="date" label="Date" wire:model="date_article" max="2999-12-31" />



            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update">Modifier l'article</flux:button>
            </div>
        </div>
    </flux:modal>

</div>
