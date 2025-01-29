<div>
    @forelse ($comments as $comment)
        <livewire:comments.comment-item :$comment :key="Now().'-'.$comment->id"/>
    @empty
        <div class="w-100 bg-info text-center mt-2 p-3 rounded">
            {{__("Soyez le premier à commenter !!!")}}
        </div>
    @endforelse
</div>
