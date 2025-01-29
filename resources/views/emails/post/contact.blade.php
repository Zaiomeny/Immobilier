<x-mail::message>
# Nouvelle demande de contact

Une demande vous a été envoyée concernant votre immobilier <a href="{{ route('post.show', [$post, $post->getSlug()])}}">{{$post->name}}</a>
<br>
Expéditeur : <br>
Nom : {{ $data['name'] }} <br>
Téléphone : {{ $data['phone'] }} <br>

Message : <br>
{{ $data['message']}}

</x-mail::message>
