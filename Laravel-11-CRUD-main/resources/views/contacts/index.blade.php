<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center">Manajemen Kontak</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Tombol untuk mengarahkan ke halaman tambah kontak -->
    <div class="text-end mb-3">
        <a href="{{ route('contact-form') }}" class="btn btn-success">Tambah Kontak</a>
    </div>

    <h2 class="mt-5">Daftar Kontak</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone_number }}</td>
                    <td>
                        <!-- Tombol Edit yang mengarahkan ke halaman yang sama dengan parameter edit -->
                        <a class="btn btn-primary btn-sm" href="{{ route('contacts.index', ['edit' => $contact->id]) }}">Edit</a>
                        <a class="btn btn-info btn-sm" href="{{ route('contacts.show', $contact->id) }}">Show</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada kontak.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Form untuk Edit Kontak (hanya ditampilkan jika sedang mengedit kontak) -->
    @if(isset($editingContact))
    <h2>Edit Kontak</h2>
    <form action="{{ route('contacts.update', $editingContact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $editingContact->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $editingContact->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Nomor Telepon:</label>
            <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $editingContact->phone_number }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Kontak</button>
    </form>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
