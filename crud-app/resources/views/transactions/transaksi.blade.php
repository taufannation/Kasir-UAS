@extends('layouts.app')

@section('title', 'Transactions')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Transactions</h1>
        <a href="{{ route('transactions.createtr') }}" class="btn btn-primary">Add Transaction</a>
    </div>
    <hr />

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>
                        {{ optional($transaction->product)->title }}
                    </td>
                    <td>
                        {{ $transaction->quantity }}
                    </td>
                    <td>
                        @if($transaction->product)
                            {{ $transaction->quantity * $transaction->product->price }}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
