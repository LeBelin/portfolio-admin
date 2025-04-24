<div>

    @if($showSuccessMessage)
    <div style="padding: 5px;"></div>
        <flux:callout variant="success" icon="check-circle" heading="Article ajouté avec succès !" />
    <div style="padding: 5px;"></div>
    @endif

    <flux:modal name="create-article" class="md:w-150">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Ajouter un article</flux:heading>
                <flux:subheading>Remplisser le formulaire pour crée un article !</flux:subheading>
            </div>

            <flux:textarea wire:model="title" label="Titre" placeholder="Titre de l'article" />
            <flux:textarea wire:model="url" label="Url" placeholder="Url de l'article" />
            <flux:textarea wire:model="image" label="Url de l'image" placeholder="Url de l'Image" />
            <!-- Sélecteur de la date -->
            <flux:input type="date" label="Date" wire:model="date_article" max="2999-12-31" />




            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="submit">Ajouter l'article</flux:button>
            </div>
        </div>
    </flux:modal>

</div>
