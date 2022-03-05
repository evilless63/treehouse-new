@extends('user.layouts.main')
@section('content')
<h2>Текущий баланс</h2>
<br>
<div>
    @if(cache()->has('balance'))
        {{cache()->get('balance')}}
    @else
        0
    @endif
</div>
<br>
<h2>Пополнить баланс</h2>
<br>
{{--@php--}}
{{--    phpinfo()--}}
{{--@endphp--}}
<form method="post" action="{{route('payment.create')}}">


    @csrf
    <p>сумма</p>
    <input type="number" name="amount">
    <br>
    <p>описание</p>
    <input type="text" name="description">
    <br>
    <button type="submit">Оплатить</button>
</form>
<br>
<h2>список транзакций</h2>
<table>
    <thead>
        <th>#id</th>
        <th>Сумма</th>
        <th>Описание</th>
        <th>Статус</th>
        <th>Дата</th>
    </thead>
    <tbody>
        @forelse($transactions as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->amount}}</td>
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->status}}</td>
                <td>{{$transaction->updated_at->format('d-m-Y H:i')}}</td>
            </tr>
        @empty
            Транзакций нет
        @endforelse
    </tbody>
</table>
@stop
