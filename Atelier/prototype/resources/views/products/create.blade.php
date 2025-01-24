<form action="{{route('products.store')}}" method="POST" id="addProduct">
    @csrf
    {{-- <div class="form-group">
      <label for="exampleInputEmail1">Product title</label>
      <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Product title" name="name">
      <input type="number" name="price" class="form-control" id="price" aria-describedby="emailHelp" placeholder="Price" name="price">
      <input type="text area" class="form-control" id="description" aria-describedby="emailHelp" placeholder="description" name="description"> --}}
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    {{-- </div> --}}

    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Product Title</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <div class="invalid-feedback"></div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="price" class="form-label">Price</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            <div class="invalid-feedback"></div>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save Product</button>
    </div>
</form>