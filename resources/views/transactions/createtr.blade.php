<!-- resources/views/transactions/create.blade.php -->
@extends('layouts.app')

@section('title', 'Create Transaction')

@section('contents')
    <h1 class="mb-0">Create Transaction</h1>
    <hr />

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->title }} - ${{ $product->price }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
        </div>

        <!-- Tambahkan input lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Create Transaction</button>
    </form>
@endsection
