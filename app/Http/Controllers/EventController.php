<?php
namespace App\Http\Controllers;

use App\Models\EventImage;
use App\Models\Holiday;
use App\Models\PostKajianAcara;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $holidays = Holiday::orderBy('holiday_date')->get();

        return view('event', [
            'title' => 'Acara',
            'events' => PostKajianAcara::orderByDesc('event_date')->orderByDesc('start_time')->get(),
            'eventImages' => EventImage::latest()->get(),
            'islamicHolidays' => $holidays->where('type', 'islamic')->values(),
            'nationalHolidays' => $holidays->where('type', 'national')->values(),
        ]);
    }

    private function validateEvent(Request $request): array
    {
        $validated = $request->validate([
            'event_name' => ['required', 'string', 'max:255'],
            'event_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'speaker' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'is_routine' => ['nullable', 'boolean'],
        ]);

        $validated['is_routine'] = $request->boolean('is_routine');

        return $validated;
    }

    public function store(Request $request)
    {
        $validated = $this->validateEvent($request);

        PostKajianAcara::create($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'Acara masjid berhasil ditambahkan.');
    }

    public function update(Request $request, PostKajianAcara $event): RedirectResponse
    {
        $event->update($this->validateEvent($request));

        return redirect()->route('events.index')->with('success', 'Acara berhasil diperbarui.');
    }

    public function destroy(PostKajianAcara $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Acara berhasil dihapus.');
    }

    public function storeImage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $path = $request->file('image')->store('events', 'public');

        EventImage::create([
            'title' => $validated['title'] ?? null,
            'image_path' => $path,
        ]);

        return redirect()->route('events.index')->with('success', 'Gambar acara berhasil ditambahkan.');
    }

    public function updateImage(Request $request, EventImage $image): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $data = ['title' => $validated['title'] ?? null];

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($image->image_path);
            $data['image_path'] = $request->file('image')->store('events', 'public');
        }

        $image->update($data);

        return redirect()->route('events.index')->with('success', 'Gambar acara berhasil diperbarui.');
    }

    public function destroyImage(EventImage $image): RedirectResponse
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->route('events.index')->with('success', 'Gambar acara berhasil dihapus.');
    }

    public function storeHoliday(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'holiday_date' => ['required', 'date'],
            'type' => ['required', 'in:islamic,national'],
            'hijri_date' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        Holiday::create($validated);

        return redirect()->route('events.index')->with('success', 'Hari libur berhasil ditambahkan.');
    }

    public function updateHoliday(Request $request, Holiday $holiday): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'holiday_date' => ['required', 'date'],
            'type' => ['required', 'in:islamic,national'],
            'hijri_date' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        $holiday->update($validated);

        return redirect()->route('events.index')->with('success', 'Hari libur berhasil diperbarui.');
    }

    public function destroyHoliday(Holiday $holiday): RedirectResponse
    {
        $holiday->delete();

        return redirect()->route('events.index')->with('success', 'Hari libur berhasil dihapus.');
    }

    public function fetch(Request $request)
    {
        $start = $request->query('start');
        $end   = $request->query('end');

        $events = PostKajianAcara::whereBetween('event_date', [$start, $end])
            ->orderBy('event_date')
            ->orderBy('start_time')
            ->get();

        $holidays = Holiday::whereBetween('holiday_date', [$start, $end])
            ->orderBy('holiday_date')
            ->get();

        $formattedEvents = $events->map(function ($event) {
            return [
                'id'        => $event->id,
                'kind'      => 'event',
                'title'     => $event->event_name,
                'start'     => $event->event_date->format('Y-m-d') . 'T' . ($event->start_time ?? '00:00:00'),
                'speaker'   => $event->speaker,
                'location'  => $event->location,
                'is_routine'=> $event->is_routine ?? false,
            ];
        });

        $formattedHolidays = $holidays->map(function ($holiday) {
            return [
                'id' => $holiday->id,
                'kind' => 'holiday',
                'type' => $holiday->type,
                'title' => $holiday->title,
                'start' => $holiday->holiday_date->format('Y-m-d') . 'T00:00:00',
                'description' => $holiday->description,
            ];
        });

        return response()->json($formattedEvents->concat($formattedHolidays)->values());
    }
}