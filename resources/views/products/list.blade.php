<x-layout>
    <h2>Daftar Produk</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add new product</a>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">Harga: Rp {{ $product['price'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>