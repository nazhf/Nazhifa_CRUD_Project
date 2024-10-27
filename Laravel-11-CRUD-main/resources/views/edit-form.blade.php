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

    <form action="{{ route($contacts->id, 'contacts.update') }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Hidden input untuk menyimpan ID kontak -->
    <input type="hidden" name="id" value="{{ $id }}">

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ old('name', $name) }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email', $email) }}" required>

    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number" value="{{ old('phone_number', $phone_number) }}" required>

    <button type="submit">Update Contact</button>
</form>
