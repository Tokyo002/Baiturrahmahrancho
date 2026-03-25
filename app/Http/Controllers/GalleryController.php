<?php

namespace App\Http\Controllers;

use App\Models\EventImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('gallery', [
            'title' => 'Galeri',
            'galleryItems' => EventImage::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:10240'],
        ]);

        $path = $request->file('image')->store('events', 'public');

        EventImage::create([
            'title' => $validated['title'] ?? null,
            'image_path' => $path,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gambar galeri berhasil ditambahkan.');
    }

    public function update(Request $request, EventImage $galleryItem): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:10240'],
        ]);

        $data = [
            'title' => $validated['title'] ?? null,
        ];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($galleryItem->image_path);
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        $galleryItem->update($data);

        return redirect()->route('gallery.index')->with('success', 'Gambar galeri berhasil diperbarui.');
    }

    public function destroy(EventImage $galleryItem): RedirectResponse
    {
        Storage::disk('public')->delete($galleryItem->image_path);
        $galleryItem->delete();

        return redirect()->route('gallery.index')->with('success', 'Gambar galeri berhasil dihapus.');
    }
}
