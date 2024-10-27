@extends('layout')

@section('content')
    <h1>Edit Kontak</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route(contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Ini penting untuk metode PUT -->

        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required>

        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $contact->phone_number) }}" required>

        <button type="submit">Update Kontak</button>
    </form>
@endsection
