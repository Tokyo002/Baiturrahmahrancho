<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Throwable;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog', [
            'title' => 'Pengumuman',
            'blogPosts' => BlogPost::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'event_date' => ['nullable', 'date'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:10240'],
        ], [
            'title.required' => 'Judul acara wajib diisi.',
            'image.required' => 'Gambar kegiatan wajib diupload.',
            'image.image' => 'File yang dipilih harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, png, webp, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 10MB.',
        ]);

        try {
            $path = $request->file('image')->store('blog', 'public');

            BlogPost::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'event_date' => $validated['event_date'] ?? null,
                'image_path' => $path,
            ]);

            return redirect()->route('blog.index')->with('success', 'Kegiatan berhasil ditambahkan ke blog.');
        } catch (Throwable $e) {
            Log::error('Gagal menambah kegiatan blog.', ['error' => $e->getMessage()]);

            return back()
                ->withErrors(['blog' => 'Kegiatan gagal ditambahkan. Silakan coba lagi.'])
                ->withInput();
        }
    }

    public function update(Request $request, BlogPost $blogPost): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'event_date' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:10240'],
        ], [
            'title.required' => 'Judul acara wajib diisi.',
            'image.image' => 'File yang dipilih harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpg, jpeg, png, webp, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 10MB.',
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'event_date' => $validated['event_date'] ?? null,
        ];

        try {
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($blogPost->image_path);
                $data['image_path'] = $request->file('image')->store('blog', 'public');
            }

            $blogPost->update($data);

            return redirect()->route('blog.index')->with('success', 'Kegiatan blog berhasil diperbarui.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui kegiatan blog.', ['id' => $blogPost->id, 'error' => $e->getMessage()]);

            return back()->withErrors(['blog' => 'Kegiatan gagal diperbarui. Silakan coba lagi.']);
        }
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        Storage::disk('public')->delete($blogPost->image_path);
        $blogPost->delete();

        return redirect()->route('blog.index')->with('success', 'Kegiatan blog berhasil dihapus.');
    }
}
