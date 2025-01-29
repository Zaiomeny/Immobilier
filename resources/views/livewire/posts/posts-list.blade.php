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
                    data-target="#CreatePost">{{ __('Nouveau post') }}
                </button>

                <!-- Modal Nouvel activité starts-->
                <div class="modal fade" id="CreatePost" tabindex="-1" role="dialog" aria-labelledby="CreatePost"
                    aria-hidden="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <livewire:posts.create-posts>
                        </div>
                    </div>
                </div>
                <!-- Modal Nouvel activité end-->
            </div>
        </div>
        <div class="card-block mt-0">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">PHOTO</th>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="name"> NOM
                            </x-table-header>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="description"> DESCRIPTION
                            </x-table-header>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="rooms" class="text-center">
                                SALLE </x-table-header>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="bedrooms" class="text-center">
                                CHAMBRE </x-table-header>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="floor" class="text-center">
                                ETAGE </x-table-header>
                            <x-table-header :currentField="$orderField" :direction="$orderDirection" name="price" class="text-center">
                                PRIX </x-table-header>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->posts as $post)
                            <tr wire:key='$post->id'>
                                <td><img src="{{ $post->getCover() }}" alt="" width="45px" height="35px">
                                </td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->getDescription() }}</td>
                                <td class="text-center">{{ $post->rooms }}</td>
                                <td class="text-center">{{ $post->bedrooms }}</td>
                                <td class="text-center">{{ $post->floor }}</td>
                                <td class="text-center">{{ formatMoney($post->price) }}</td>
                                <td class="text-right">
                                    @can('update', $post)
                                        <a href="{{ route('post.edit', ['post' => $post->id, 'slug' => $post->getSlug()]) }}"
                                            wire:navigate class="btn btn-sm text-center btn-outline-primary waves-effect"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="{{ __('Modifier') }}">
                                            <i class="ti-pencil mx-0"></i>
                                        </a>
                                    @endcan
                                    <a href="{{ route('post.show', ['post' => $post->id, 'slug' => $post->getSlug()]) }}"
                                        wire:navigate class="btn btn-sm text-center btn-outline-info waves-effect"
                                        data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="{{ __('Voir') }}">
                                        <i class="ti-eye mx-0"></i>
                                    </a>
                                    @can('delete', $post)
                                        <a href="#" wire:click="delete({{ $post->id }})"
                                            wire:confirm="Voulez-vous vraiment supprimer ce bien ?"
                                            class="btn btn-sm text-center btn-outline-danger waves-effect"
                                            data-toggle="tooltip" data-placement="top" title=""
                                            data-original-title="{{ __('Supprimer') }}">
                                            <i class="ti-trash mx-0"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                @if ($search)
                                    <td class="text-center" colspan="11">Aucun résultat n'a été trouvé !</td>
                                @else
                                    <td class="text-center" colspan="11">Vous n'avez créé aucun bien !</td>
                                @endif
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="w-100">
                {{ $this->posts->links() }}
            </div>
        </div>
    </div>

</div>
