<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-tittle">Modification</h3>
                <hr>
            </div>
            <div class="card-block">
                <form wire:submit.prevent="save">
                    <div class="upload-image">
                        <div class="upload-image-col">
                            @if ($postForm->oldPhoto)
                            <span>Ancienne image</span>
                            <img class="" src="{{Storage::disk('public')->url($postForm->oldPhoto)}}" alt="">
                            @endif
                        </div>
                        <div class="upload-image-col">
                            @if ($postForm->cover)
                            <span>Nouvel image</span>
                            <img class="" src="{{ $postForm->cover->temporaryUrl() }}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="form-row">    
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" wire:model.defer='postForm.name' value="" name=""
                                    id="" class="form-control">
                                @error('postForm.name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label for="">Salle</label>
                            <input type="text" wire:model.defer='postForm.rooms' value="" name="" id=""
                                class="form-control">
                            @error('postForm.rooms')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label for="">Chambre</label>
                            <input type="text" wire:model.defer='postForm.bedrooms' name="" id=""
                                class="form-control">
                            @error('postForm.bedrooms')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label for="">Etage</label>
                            <input type="text" wire:model.defer='postForm.floor' name="" id=""
                                class="form-control">
                            @error('postForm.floor')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Surface en m²</label>
                                <input type="text" wire:model.defer='postForm.surface' name="" id=""
                                    class="form-control">
                                @error('postForm.surface')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Prix en Ariary</label>
                                <input type="text" wire:model.defer='postForm.price' name="" id=""
                                    class="form-control">
                                @error('postForm.price')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label for="">Adresse</label>
                            <input type="text" wire:model.defer='postForm.address' value="" name="" id=""
                                class="form-control">
                            @error('postForm.address')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <label for="">Ville</label>
                            <input type="text" wire:model.defer='postForm.city' value="" name="" id=""
                                class="form-control">
                            @error('postForm.city')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group mt-3">
                                <label for="description">Description</label>
                                <textarea type="text" wire:model.defer='postForm.description' name="description" id="description" class="form-control ">
                                </textarea>
                                @error('postForm.description')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="multi-value-select">Catégories</label>
                        <select wire:model="postForm.categories" class="form-control" multiple>
                            @foreach ($this->categories as $category)
                                <option value="{{ $category->id }}"
                                    @selected($postForm->categories?->contains($category->id))>
                                    {{ ucfirst($category->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('postForm.categories')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label>Changer la photo</label>
                                <input type="file" wire:model.defer="postForm.cover" id="cover" class="form-control"
                                    aria-placeholder="Photo">
                            @error('postForm.cover')
                                <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="float-left">
                                <div class="form-group">
                                    <div class="checkbox-fade fade-in-primary mt-4 pt-2 w-100">
                                        <label class="w-100">
                                            <input type="hidden" wire:model.defer="postForm.sold" value="0">
                                            <input wire:model.defer="postForm.sold" @checked($postForm->sold) type="checkbox"
                                                value="1">
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">En solde ?</span>
                                            @error('postForm.sold')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                    <button type="submit" wire:loading.attr='disabled' class="btn btn-outline-primary">
                                        Editer
                                    </button>
                            </div>
                        </div>
                    </div>                   
                </form>
            </div>
        </div>        
    </div>
</div>