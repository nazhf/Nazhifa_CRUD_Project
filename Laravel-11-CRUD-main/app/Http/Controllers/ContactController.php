<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Menampilkan daftar kontak
    public function index(Request $request)
{
    $contacts = Contact::all(); // Mengambil semua data kontak

    // Cek apakah ada parameter 'edit' di URL
    $editingContact = null;
    if ($request->has('edit')) {
        $editingContact = Contact::find($request->input('edit')); // Ambil kontak yang ingin diedit
    }

    return view('contacts.index', compact('contacts', 'editingContact')); // Kirim data kontak dan kontak yang sedang diedit ke view
}
    

    // Menampilkan form untuk menambahkan kontak baru
    public function create()
    {
        return view('contacts.create'); // Pastikan Anda memiliki view untuk form tambah kontak
    }

    // Menampilkan detail kontak
    public function show($id)
    {
        $contact = Contact::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan otomatis
        return view('contacts.show', compact('contact')); // Pastikan Anda memiliki view untuk menampilkan detail kontak
    }

    // Menangani penyimpanan kontak baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
        ]);

        // Simpan data kontak baru ke database
        Contact::create($validatedData);

        // Kembali ke halaman daftar kontak dengan pesan sukses
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan!');
    }

    // Memperbarui kontak di database
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
        ]);

        // Cari kontak berdasarkan ID, lalu update data
        $contact = Contact::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan otomatis
        $contact->update($validatedData);

        // Kembali ke halaman daftar kontak dengan pesan sukses
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diperbarui!');
    }

    // Menghapus kontak dari database
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id); // Menggunakan findOrFail untuk menangani kesalahan otomatis
        $contact->delete(); // Hapus kontak dari database

        // Kembali ke halaman daftar kontak dengan pesan sukses
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus!');
    }
}
