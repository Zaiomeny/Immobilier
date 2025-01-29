<form class="mt-4"
    wire:submit.prevent="{{ isset($commentForm->comment->id)? 'save' : 'store'}}">
    @error('commentForm.*')
        <span class="alert alert-danger py-2">{{ $message }}</span>
    @enderror
    <div class="form-group">
        <textarea class="form-control" wire:model.defer='commentForm.body' required></textarea>
    </div>
    <div class="form-group">
        <button type="submit"
            class="btn btn-primary w-100">
            {{ isset($commentForm->comment->id) ? 'Modifier' : 'Envoyer'}}
        </button>
    </div>
</form>
