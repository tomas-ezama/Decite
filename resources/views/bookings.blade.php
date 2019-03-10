@extends('layouts.app')

@section('content')
    <h1 style="margin-left: 40px">Reservas</h1>
    <ul>
        @forelse (App\Booking::where('user_id', Auth::user()->id)->get() as $booking)
            <li style="background-color: #f3f3f3; padding: 10px; width: 95%; margin-top: 10px;">
                Reserva con: {{App\User::find($booking->professor_id)->name}}
                <br>
                Fecha: {{ $booking->start }}
            </li>
        @empty
            <li>No tienen ninguna reserva</li>
        @endforelse
    </ul>
@endsection