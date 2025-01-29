<form wire:submit.prevent="store" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" wire:model.defer="postForm.name" id="name" class="form-control"
                        placeholder="Nom">
                    @error('postForm.name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <textarea wire:model.defer="postForm.description" id="description" class="form-control" placeholder="Description"></textarea>
            @error('postForm.description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group form-row">
            <div class="col-sm-4">
                <input type="text" wire:model.defer="postForm.rooms" class="form-control" placeholder="Salle">
                @error('postForm.rooms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-4">
                <input type="text" wire:model.defer="postForm.bedrooms" class="form-control" placeholder="Chambre">
                @error('postForm.bedrooms')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-4">
                <input type="text" wire:model.defer="postForm.floor" class="form-control" placeholder="Etage"
                    value="0">
                @error('postForm.floor')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group form-row">
            <div class="col-sm-6">
                <input type="text" wire:model.defer="postForm.surface" class="form-control"
                    placeholder="Surface en m²">
                @error('postForm.surface')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="text" wire:model.defer="postForm.price" class="form-control" placeholder="Prix">
                @error('postForm.price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group form-row">
            <div class="col-sm-6">
                <input type="text" wire:model.defer="postForm.city" class="form-control"
                    placeholder="Ville">
                @error('postForm.city')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-sm-6">
                <input type="text" wire:model.defer="postForm.address" class="form-control" placeholder="Addresse">
                @error('postForm.address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="multi-value-select">Catégories</label>
            <select wire:model="postForm.categories" class="form-control" multiple>
                @foreach ($this->categories as $category)
                    <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
            @error('postForm.categories')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Ajouter une photo</label>
                    <div class="input-group">
                        @if ($postForm->cover)
                            <img class="input-group-img" alt="TemporaryUrl" src="{{ $postForm->cover->temporaryUrl() }}">
                        @else
                            <span class="input-group-addon px-0"><i class="icofont icofont-image"></i></span>
                        @endif
                        <input type="file" wire:model.defer="postForm.cover" id="cover" class="form-control"
                            placeholder="Photo de couverture">
                    </div>
                    @error('postForm.cover')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div>
            <div class="checkbox-fade fade-in-primary w-100">
                <label class="w-100">
                    <input type="hidden" wire:model.defer="postForm.sold" value="0">
                    <input wire:model.defer="postForm.sold" type="checkbox" value="1">
                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                    <span class="text-inverse">En solde ?</span>
                </label>
            </div>
        </div>

    </div>
    <!--Bouton de soumission-->
    <div class="modal-footer mt-0 py-0">
        <button type="submit" 
            class="btn btn-md btn-primary my-2" 
            wire:loading.attr="disabled">
             Créer
        </button>
    </div>
</form>
