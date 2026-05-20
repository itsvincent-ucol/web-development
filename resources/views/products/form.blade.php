<x-layout>
    <h2>Tambah Produk Baru</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</x-layout>