
<fragment>

    <div class="card py-3 px-2">
        <div class="card-header">
            <h3 class=".card-header-text ">{{__('Tous mes suivis')}}</h3>
        </div>
        <div class="card-block">
            <table class="table">
                    <tr>
                        <x-table-header :currentField="$orderField" :direction="$orderDirection" name="name"> NOM
                        </x-table-header>
                        <x-table-header :currentField="$orderField" :direction="$orderDirection" name="email">EMAIL
                        </x-table-header>
                        <th class="text-center">Posts</th>
                        <th class="text-center">Followers</th>
                        <th></th>
                    </tr>
                <tbody>
                    @forelse($this->users as $user)
                        <tr>
                            <td class="middle">
                                <span wire:navigate class="link"
                                href="{{ route('user.profile', ['user' => $user->id]) }}">{{ $user->name }}
                                </span>
                            </td>
                            <td class="middle">{{ $user->email }}</td>
                            <td class="middle text-center">{{ $user->posts->count() }}</td>
                            <td class="middle text-center">{{ $user->followers->count()}}</td>
                            <td class="d-flex py-1"> 
                                <div>
                                    <a wire:navigate
                                    href="{{ route('user.profile', ['user' => $user->id]) }}" 
                                    class="btn btn-sm btn-secondary">Voir le profile</a>
                                </div>
                                <div>
                                    <livewire:user.toggle-following-user :$user/>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-3 text-center">{{__("Il semblerait que vous ne suivez personne pour le moment :(")}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</fragment>
