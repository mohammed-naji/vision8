<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $post->title }}" />
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control" />
    @if ($post->image)
    <img width="80" src="{{ asset('uploads/posts/'.$post->image) }}">
    @endif
</div>

<div class="mb-3">
    <label>Content</label>
    <textarea id="mytextarea" name="content" placeholder="Content" class="form-control" rows="5">{{ $post->content }}</textarea>
</div>
