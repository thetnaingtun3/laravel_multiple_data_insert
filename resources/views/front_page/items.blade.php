@extends('layouts.master')
@section('title','View Items')
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sl</th>
            <th>Product name</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Budget</th>
            <th>Total Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key=> $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->brand}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->budget}}</td>
                <td>{{$item->amount}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection
