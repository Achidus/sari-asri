<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\MediaArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::paginate(10);
        return view('pages.admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('pages.admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_postingan' => 'required|string|max:255',
            'isi_postingan' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'media.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $artikel = Artikel::create([
            'judul_postingan' => $request->judul_postingan,
            'isi_postingan' => $request->isi_postingan,
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('public/thumbnail', $thumbnailName);
            $artikel->thumbnail = $thumbnailName;
            $artikel->save();
        }

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $mediaName = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/media', $mediaName);

                MediaArtikel::create([
                    'artikel_id' => $artikel->id,
                    'file_gambar' => $mediaName,
                ]);
            }
        }

        Alert::success('Berhasil!', 'Artikel berhasil ditambahkan.')->autoclose(3000);
        return redirect()->route('admin.artikel.index');
    }

    public function show(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('pages.admin.artikel.show', compact('artikel'));
    }

    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('pages.admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul_postingan' => 'required|string|max:255',
            'isi_postingan' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'media.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $artikel->judul_postingan = $request->judul_postingan;
        $artikel->isi_postingan = $request->isi_postingan;

        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail && Storage::exists('public/thumbnail/' . $artikel->thumbnail)) {
                Storage::delete('public/thumbnail/' . $artikel->thumbnail);
            }


            $thumbnailPath = $request->file('thumbnail')->storeAs('public/thumbnail', uniqid() . '.' . $request->file('thumbnail')->extension());
            $artikel->thumbnail = basename($thumbnailPath);
        }

        if ($request->hasFile('media')) {
            foreach ($artikel->media as $media) {
                if (Storage::exists('public/media/' . $media->file_gambar)) {
                    Storage::delete('public/media/' . $media->file_gambar);
                }
                $media->delete();
            }

            $mediaFiles = $request->file('media');
            $count = 0;
            foreach ($mediaFiles as $mediaFile) {
                if ($count >= 5) break;

                $mediaPath = $mediaFile->storeAs('public/media', uniqid() . '.' . $mediaFile->extension());
                $artikel->media()->create([
                    'file_gambar' => basename($mediaPath),
                ]);
                $count++;
            }
        }

        $artikel->save();

        Alert::success('Berhasil!', 'Artikel berhasil diperbarui.')->autoclose(3000);

        return redirect()->route('admin.artikel.index');
    }


  public function destroy($id)
{
    $artikel = Artikel::with('media')->findOrFail($id);

    // Hapus thumbnail jika ada
    if ($artikel->thumbnail && Storage::disk('public')->exists('thumbnail/' . $artikel->thumbnail)) {
        Storage::disk('public')->delete('thumbnail/' . $artikel->thumbnail);
    }

    // Hapus semua file media terkait
    foreach ($artikel->media as $media) {
        if ($media->file_gambar && Storage::disk('public')->exists('media/' . $media->file_gambar)) {
            Storage::disk('public')->delete('media/' . $media->file_gambar);
        }
        $media->delete();
    }

    // Hapus data artikel
    $artikel->delete();

    Alert::success('Sukses!', 'Artikel berhasil dihapus!')->autoclose(3000);
    return redirect()->route('admin.artikel.index');
}


}
