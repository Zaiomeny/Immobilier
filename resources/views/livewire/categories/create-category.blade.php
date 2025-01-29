<form wire:submit.prevent="store" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <input id="name" type="text" wire:model.defer="categoryForm.name" class="form-control" placeholder="Nom de la catégorie">
            @error('categoryForm.name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="color">Couleur de la catégorie</label>
            <select class="form-control" wire:model.defer="categoryForm.color">
                <option selected> De quelle couleur sera affichée cette catégorie ? </option>
                <option value="default"> Gris </option>
                <option value="primary"> Bleu foncé </option>
                <option value="info"> Bleu clair </option>
                <option value="warning"> Jaune </option>
                <option value="danger"> Rouge </option>
                <option value="success"> Vert </option>
            </select>
            @error('categoryForm.color')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <!--Bouton de soumission-->
    <div class="modal-footer mt-0 py-0">
        <button type="submit" class="btn btn-primary my-2" wire:loading.attr='disabled'>
            <i class="ti-save-alt"> Créer</i>
        </button>
    </div>
</form>
