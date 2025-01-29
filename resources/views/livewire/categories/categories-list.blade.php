<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                <input wire:model.live.debounce.500ms='search' class="form-control form-control-primary form-txt-primary"
                    placeholder="Rechercher">
            </div>
            <div class="card-header-right pr-2">
                <!-- Modal button -->
                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                    data-target="#CreateCategory">{{ __('Catégorie') }}
                </button>

                <!-- Modal nouvelle catégorie starts-->
                <div class="modal fade" id="CreateCategory" tabindex="-1" role="dialog"
                    aria-labelledby="CreateCategory" aria-hidden="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <livewire:categories.create-category></livewire>
                        </div>
                    </div>
                </div>
                <!-- Modal nouvelle catégorie end-->
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="name"> NOM </x-table-header>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="color" class="text-center">
                                COULEUR </x-table-header>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($this->categories as $category)
                            <tr wire:key='$categorie->id'>
                                <td>{{ $category->name }}</td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $category->color }}">Couleur</span>
                                </td>
                                <td class="text-right">
                                    @can('update', $category)
                                        @if ($editId !== $category->id)
                                            <a href="#" wire:click='setEditId({{ $category->id }})'
                                                class="btn btn-sm text-center btn-outline-primary waves-effect"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="{{ __('Modifier') }}">
                                                <i class="ti-pencil mx-0"></i>
                                            </a>
                                        @endif
                                    @endcan
                                    @can('delete', $category)
                                        <a href="#" wire:click="delete({{ $category->id }})"
                                            wire:confirm="Voulez-vous vraiment supprimer cette catégorie ?"
                                            class="btn btn-sm text-center btn-outline-danger waves-effect"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="{{ __('Supprimer') }}">
                                            <i class="ti-trash mx-0"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @if ($editId === $category->id)
                                <tr>
                                    <td colspan="3" class="px-1">
                                        <livewire:categories.update-category :category="$category" :key="'category-' . $category->id" />
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                @if ($search && $search != '')
                                    <td class="text-center" colspan="3">Aucun résultat n'a été trouvé !</td>
                                @else
                                    <td class="text-center" colspan="3">Aucune catégorie n'a été créée !</td>
                                @endif
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="w-100">
                {{ $this->categories->links() }}
            </div>
        </div>

    </div>
</div>
