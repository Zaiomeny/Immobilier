<x-app-layout>
    <div class="row">
        <div class="col-lg-8">
            <div class="card h-100 py-3 px-2">
                <x-posts.post-card class="h-100" :$post></x-posts.post-card>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-block px-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row mb-0">
                                <div class="col-6 b-r-default">
                                    <h5 class="text-center text-primary">{{ formatMoney($post->price) }}</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-center text-primary">{{ $post->surface }} m²</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                            <h3>Caractéristiques :</h3>
                            <table class="table table-striped">
                                <tbody>
                                    <tr class="p-0">
                                        <td>Salle</td>
                                        <td class="text-right">{{ $post->rooms }}</td>
                                    </tr>
                                    <tr class="p-0">
                                        <td>Chambre</td>
                                        <td class="text-right">{{ $post->bedrooms }}</td>
                                    </tr>
                                    <tr class="p-0">
                                        <td>Etage</td>
                                        <td class="text-right">{{ $post->floor ?: 'RDC' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <h3>Spécificités :</h3>
                            @foreach ($post->categories as $category)
                                <span class="badge badge-{{ $category->color }}">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($post->user->id !== currentUser()->id)
                <div class="card-footer px-2">
                    <hr>
                    <h3>Intéressé(e)s ?</h3>
                    @if (session('success'))
                        <div class="text-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('post.contact', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Votre nom</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                            <x-input-error for="name"></x-input-error>
                        </div>
                        <div class="form-group">
                            <label for="phone">Votre téléphone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                            <x-input-error for="phone"></x-input-error>
                        </div>
                        <div class="form-group">
                            <label for="email">Votre email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{currentUser()->email}}" required>
                            <x-input-error for="email"></x-input-error>
                        </div>
                        <div class="form-group">
                            <label for="message">Votre message</label>
                            <textarea name="message" id="message" class="form-control" required></textarea>
                            <x-input-error for="message"></x-input-error>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-mini btn-warning w-100">Me contacter</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
