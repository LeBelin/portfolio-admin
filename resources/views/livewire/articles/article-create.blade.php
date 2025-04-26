<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Ajouter un article') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Gerer les article de la veille technologique') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- btn retour -->
    <a href="{{ route('articles.index') }}" class="mb-4">
        <flux:button variant="danger">Retour</flux:button>
    </a>

    <div>
    <div class="flex gap-10">
        <!-- FORMULAIRE -->
        <div class="w-1/2 w-full p-4 ">
            <form class="mt-6 space-y-6">
                <flux:input id="inputTitle" type="text" label="Titre" placeholder="Titre" />
                <flux:input id="inputUrl" type="url" label="URL" placeholder="Lien" />
                <flux:input id="inputImage" type="url" label="Image" placeholder="Lien de l'image" />
                <flux:input id="inputDate" type="date" label="Date" />
                <flux:button type="button" variant="primary">Ajouter</flux:button>
            </form>
        </div>

        <!-- APERÇU -->
        <a id="previewLink" href="#" target="_blank" class="block">
            <div class="w-1/2 p-4 border rounded-lg shadow-lg bg-white">
                <h2 class="text-2xl font-bold mb-4">Aperçu en direct</h2>

                <div id="preview" class="space-y-4">
                    <img id="previewImage" src="" alt="Image de l'article" class="w-full h-48 object-cover rounded-lg opacity-0 transform scale-95 transition-all duration-500 hidden">
                    
                    <!-- Le titre est maintenant un lien -->
                        <h3 id="previewTitle" class="text-xl font-semibold text-gray-700 opacity-0 transform scale-95 transition-all duration-500" style="font-size: 22px; padding: 10px 0;">Titre...</h3>

                    <p id="previewDate" class="text-gray-500 opacity-0 transform scale-95 transition-all duration-500">Date...</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- SCRIPT -->
<script>
    const inputTitle = document.getElementById('inputTitle');
    const inputUrl = document.getElementById('inputUrl');
    const inputImage = document.getElementById('inputImage');
    const inputDate = document.getElementById('inputDate');

    const previewTitle = document.getElementById('previewTitle');
    const previewLink = document.getElementById('previewLink');
    const previewImage = document.getElementById('previewImage');
    const previewDate = document.getElementById('previewDate');

    function formatDateFr(dateString) {
        if (!dateString) return 'Date...';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' });
    }

    function updatePreview() {
        previewTitle.textContent = inputTitle.value || 'Titre...';
        previewTitle.classList.remove('opacity-0', 'scale-95');
        previewTitle.classList.add('opacity-100', 'scale-100');

        previewLink.href = inputUrl.value || '#';

        if (inputImage.value) {
            previewImage.src = inputImage.value;
            previewImage.classList.remove('opacity-0', 'scale-95', 'hidden');
            previewImage.classList.add('opacity-100', 'scale-100');
        } else {
            previewImage.classList.add('opacity-0', 'scale-95');
            previewImage.classList.remove('opacity-100', 'scale-100');
            previewImage.classList.add('hidden');
        }

        // 👉 Ici on formatte la date proprement en français !
        previewDate.textContent = formatDateFr(inputDate.value);
        previewDate.classList.remove('opacity-0', 'scale-95');
        previewDate.classList.add('opacity-100', 'scale-100');
    }

    inputTitle.addEventListener('input', updatePreview);
    inputUrl.addEventListener('input', updatePreview);
    inputImage.addEventListener('input', updatePreview);
    inputDate.addEventListener('input', updatePreview);
</script>




</div>
