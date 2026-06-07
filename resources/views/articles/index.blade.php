<!DOCTYPE html>
<html>
<head><title>Daftar Artikel</title></head>
<body style="font-family: sans-serif; padding: 20px;">

    <h1>Daftar Artikel</h1>

    <form action="{{ route('articles.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari artikel..." value="{{ request('search') }}" style="padding: 5px;">
        
        <select name="sort" style="padding: 5px;">
            <option value="">Urutkan (Default)</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Nama A-Z</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Nama Z-A</option>
        </select>
        
        <button type="submit" style="padding: 5px 10px;">Cari / Urutkan</button>
    </form>

    <hr>

    <ul>
        @forelse($articles as $article)
            <li>
                <h3><a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></h3>
                <p>{{ Str::limit($article->content, 100) }}</p>
            </li>
        @empty
            <p>Tidak ada artikel yang ditemukan.</p>
        @endforelse
    </ul>

    <div>{{ $articles->links() }}</div>

</body>
</html>