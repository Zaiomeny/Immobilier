<form wire:submit.prevent='save' action="">
    <div class="row">
        <div class="col">
            <input type="text"  class="form-control" wire:model.defer="categoryForm.name" id="">
        </div>
        <div class="col">
            <select class="form-control" wire:model.defer="categoryForm.color">
                <option value="default" @selected($categoryForm->color == 'default')>Gris
                </option>
                <option value="primary" @selected($categoryForm->color == 'primary')> Bleu foncé
                </option>
                <option value="info" @selected($categoryForm->color == 'info')> Bleu clair
                </option>
                <option value="warning" @selected($categoryForm->color == 'warning')> Jaune
                </option>
                <option value="danger" @selected($categoryForm->color == 'danger')> Rouge
                </option>
                <option value="success" @selected($categoryForm->color == 'success')> Vert
                </option>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn w-100 btn-sm btn-outline-primary" wire:loading.attr='disabled'>
                Modifier</button>
        </div>
    </div>
</form>
