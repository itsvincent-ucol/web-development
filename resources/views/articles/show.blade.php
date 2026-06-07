<!DOCTYPE html>
<html>
<head><title>{{ $article->title }}</title></head>
<body style="font-family: sans-serif; padding: 20px;">

    <a href="{{ route('articles.index') }}">Kembali ke Daftar</a>
    
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
    
    <hr>
    
    <h3>Komentar ({{ $article->comments->count() }})</h3>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif

    @foreach($article->comments as $comment)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <strong>{{ $comment->author_name }}</strong>
            <p>{{ $comment->content }}</p>
            
            @if($comment->created_at->ne($comment->updated_at))
                <small style="color: gray;">(Diedit pada: {{ $comment->updated_at->format('d M Y, H:i') }})</small>
            @endif

            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" style="color: red;">Hapus</button>
                </form>

                <button type="button" onclick="toggleEdit('edit-form-{{ $comment->id }}')">Edit</button>
            </div>

            <form id="edit-form-{{ $comment->id }}" action="{{ route('comments.update', $comment->id) }}" method="POST" style="display: none; margin-top: 10px;">
                @csrf
                @method('PUT')
                <input type="text" name="content" value="{{ $comment->content }}" style="width: 80%; padding: 5px;">
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    @endforeach

    <script>
        function toggleEdit(formId) {
            var form = document.getElementById(formId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>