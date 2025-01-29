<div class="main-comment">
    <div class="comment-header">
        <div class="comment-header-left">
            <img class="img-40 img-circle cimCS_img_loaded" src="{{ $comment->user->profile_photo_url }}"
                alt="User-Profile">
            <div class="comment-user-details">
                <span>{{ $comment->user->getName() }}</span>
                <span>{{ ucfirst(formatDate($comment->updated_at)) }}</span>
            </div>
        </div>
        <div x-data={show:false} class="comment-header-right">
            <i class="ti-more" id="show-action" @click='show=!show'>
                <div x-show="show" x-on:click.outside="show = false" class="comment-actions" id="actions">
                    <div class="arrow-right"></div>
                    <ul>
                        @can('update', $comment)
                            <li x-data="{ commentId : {{$comment->id}}}">
                                <a x-on:click="$wire.dispatchTo('comments.form-comment','defineId',{'commentId':commentId})"
                                    class="text-primary">Modifier</a>
                            </li>
                        @endcan
                        <li>
                            <a class="text-warning">Signaler</a>
                        </li>
                        @can('delete', $comment)
                            <li>
                                <a wire:click='delete({{ $comment->id }})' class="text-danger">
                                    Supprimer</a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </i>
        </div>
    </div>
    <p class="comment-content">{{ $comment->body }}</p>
</div>
