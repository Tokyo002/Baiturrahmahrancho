<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>THEMosque - Mosque Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
      .calendar-grid .calendar-day a.event-pill {
        display: block;
        padding: 2px 4px;
        margin-top: 2px;
        font-size: 0.65rem;
        line-height: 1.2;
        border-radius: 4px;
        white-space: normal;
        word-break: break-word;
        color: white;
        text-decoration: none;
      }
      .calendar-grid .calendar-day a.event-routine,
      .calendar-grid .calendar-day a.event-normal {
        background-color: #ffc107;
        color: #212529;
      }
      .calendar-grid .calendar-day a.event-holiday {
        background-color: #dc3545;
      }
      .calendar-grid .calendar-day a.event-islamic {
        background-color: #198754;
      }
      .holiday-card {
        transition: transform 0.3s;
      }
      .holiday-card:hover {
        transform: translateY(-5px);
      }
      .admin-section-title {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
      }
    </style>
  </head>

  <body>
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <x-navbar></x-navbar>
    <x-header><x-slot:title>{{ $title }}</x-slot:title></x-header>

    <div class="container-fluid event py-5">
      <div class="container py-5">
        <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Kalender <span class="text-primary">Acara</span></h1>

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <strong>Validasi gagal:</strong>
            <ul class="mb-0 mt-2">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="calendar card p-4 mb-4">
          <div class="calendar-header">
            <div>
              <button id="prevBtn" class="btn btn-outline-secondary btn-sm me-2"><i class="fa fa-chevron-left"></i></button>
              <button id="nextBtn" class="btn btn-outline-secondary btn-sm"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div>
              <h4 id="monthYear" class="mb-0"></h4>
              <small class="text-muted" id="todayLabel"></small>
            </div>
            <div>
              <button id="todayBtn" class="btn btn-outline-primary btn-sm">Hari Ini</button>
            </div>
          </div>

          <div class="calendar-grid bg-white p-2 rounded">
            <div class="text-center fw-bold py-2">Min</div>
            <div class="text-center fw-bold py-2">Sen</div>
            <div class="text-center fw-bold py-2">Sel</div>
            <div class="text-center fw-bold py-2">Rab</div>
            <div class="text-center fw-bold py-2">Kam</div>
            <div class="text-center fw-bold py-2">Jum</div>
            <div class="text-center fw-bold py-2">Sab</div>
          </div>

          <div class="legend text-muted">
            <span class="me-3"><span class="event-indicator" style="background:#ffc107;"></span> Acara Masjid</span>
            <span class="me-3"><span class="event-indicator" style="background:#198754;"></span> Hari Besar Islam</span>
            <span class="me-3"><span class="event-indicator" style="background:#dc3545;"></span> Hari Libur Nasional</span>
            <span class="me-3"><span class="today-indicator"></span> Hari Ini</span>
          </div>
        </div>

        @if (auth()->check() && auth()->user()->is_admin)
          <div class="card p-4 mb-4">
            <h5 class="mb-3">Panel Admin: Tambah Acara</h5>
            <form method="POST" action="{{ route('events.store') }}">
              @csrf
              <div class="row g-3">
                <div class="col-md-4">
                  <label for="event_name" class="form-label">Nama Acara</label>
                  <input type="text" class="form-control" id="event_name" name="event_name" required>
                </div>
                <div class="col-md-3">
                  <label for="event_date" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="event_date" name="event_date" required>
                </div>
                <div class="col-md-2">
                  <label for="start_time" class="form-label">Jam Mulai</label>
                  <input type="time" class="form-control" id="start_time" name="start_time" required>
                </div>
                <div class="col-md-3">
                  <label for="speaker" class="form-label">Pemateri</label>
                  <input type="text" class="form-control" id="speaker" name="speaker">
                </div>
                <div class="col-md-6">
                  <label for="location" class="form-label">Lokasi</label>
                  <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="col-md-6">
                  <label for="description" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="is_routine" name="is_routine">
                    <label class="form-check-label" for="is_routine">Acara rutin</label>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-success">Simpan Acara</button>
                </div>
              </div>
            </form>
          </div>

          <div class="card p-4 mb-4">
            <h5 class="mb-3">Panel Admin: Edit/Hapus Acara</h5>
            @if ($events->isEmpty())
              <p class="text-muted mb-0">Belum ada acara tersimpan.</p>
            @else
              <div class="row g-3">
                @foreach ($events as $event)
                  <div class="col-12">
                    <div class="border rounded p-3">
                      <form method="POST" action="{{ route('events.update', $event) }}" class="row g-2 align-items-end">
                        @csrf
                        @method('PUT')
                        <div class="col-md-3">
                          <label class="form-label small">Nama</label>
                          <input type="text" class="form-control form-control-sm" name="event_name" value="{{ $event->event_name }}" required>
                        </div>
                        <div class="col-md-2">
                          <label class="form-label small">Tanggal</label>
                          <input type="date" class="form-control form-control-sm" name="event_date" value="{{ \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-2">
                          <label class="form-label small">Jam</label>
                          <input type="time" class="form-control form-control-sm" name="start_time" value="{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}" required>
                        </div>
                        <div class="col-md-2">
                          <label class="form-label small">Pemateri</label>
                          <input type="text" class="form-control form-control-sm" name="speaker" value="{{ $event->speaker }}">
                        </div>
                        <div class="col-md-3">
                          <label class="form-label small">Lokasi</label>
                          <input type="text" class="form-control form-control-sm" name="location" value="{{ $event->location }}">
                        </div>
                        <div class="col-md-9">
                          <label class="form-label small">Deskripsi</label>
                          <input type="text" class="form-control form-control-sm" name="description" value="{{ $event->description }}">
                        </div>
                        <div class="col-md-3">
                          <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="1" name="is_routine" {{ $event->is_routine ? 'checked' : '' }}>
                            <label class="form-check-label small">Acara rutin</label>
                          </div>
                        </div>
                        <div class="col-12 d-flex gap-2">
                          <button type="submit" class="btn btn-sm btn-primary">Update</button>
                      </form>
                      <form method="POST" action="{{ route('events.destroy', $event) }}" onsubmit="return confirm('Hapus acara ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                        </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        @endif

        @if (auth()->check() && auth()->user()->is_admin)
          <div class="card p-4 mb-4">
            <h5 class="mb-3">Panel Admin: Kelola Hari Besar/Libur</h5>
            <form method="POST" action="{{ route('events.holidays.store') }}" class="row g-3 mb-4">
              @csrf
              <div class="col-md-3">
                <label class="form-label">Jenis</label>
                <select name="type" class="form-select" required>
                  <option value="islamic">Hari Besar Islam</option>
                  <option value="national">Hari Libur Nasional</option>
                </select>
              </div>
              <div class="col-md-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="holiday_date" class="form-control" required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required>
              </div>
              <div class="col-md-3">
                <label class="form-label">Tanggal Hijriyah</label>
                <input type="text" name="hijri_date" class="form-control">
              </div>
              <div class="col-12">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="description" class="form-control">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-success">Tambah Hari Libur</button>
              </div>
            </form>

            @php
              $allHolidays = $islamicHolidays->concat($nationalHolidays)->sortBy('holiday_date');
            @endphp

            @if ($allHolidays->isNotEmpty())
              <div class="row g-3">
                @foreach ($allHolidays as $holiday)
                  <div class="col-12">
                    <div class="border rounded p-3">
                      <form method="POST" action="{{ route('events.holidays.update', $holiday) }}" class="row g-2 align-items-end">
                        @csrf
                        @method('PUT')
                        <div class="col-md-2">
                          <label class="form-label small">Jenis</label>
                          <select name="type" class="form-select form-select-sm" required>
                            <option value="islamic" {{ $holiday->type === 'islamic' ? 'selected' : '' }}>Islam</option>
                            <option value="national" {{ $holiday->type === 'national' ? 'selected' : '' }}>Nasional</option>
                          </select>
                        </div>
                        <div class="col-md-2">
                          <label class="form-label small">Tanggal</label>
                          <input type="date" name="holiday_date" class="form-control form-control-sm" value="{{ \Carbon\Carbon::parse($holiday->holiday_date)->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3">
                          <label class="form-label small">Judul</label>
                          <input type="text" name="title" class="form-control form-control-sm" value="{{ $holiday->title }}" required>
                        </div>
                        <div class="col-md-2">
                          <label class="form-label small">Hijriyah</label>
                          <input type="text" name="hijri_date" class="form-control form-control-sm" value="{{ $holiday->hijri_date }}">
                        </div>
                        <div class="col-md-3">
                          <label class="form-label small">Deskripsi</label>
                          <input type="text" name="description" class="form-control form-control-sm" value="{{ $holiday->description }}">
                        </div>
                        <div class="col-12 d-flex gap-2">
                          <button type="submit" class="btn btn-sm btn-primary">Update</button>
                      </form>
                      <form method="POST" action="{{ route('events.holidays.destroy', $holiday) }}" onsubmit="return confirm('Hapus hari libur ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                      </form>
                        </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        @endif
      </div>
    </div>

    <div class="container-fluid py-5 bg-light">
      <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
          <p class="fs-4 text-uppercase text-primary">Kalender</p>
          <h1 class="display-5 mb-4">Hari Besar Islam & Libur Nasional</h1>
          <p class="text-muted">Semua data di bawah ini diambil dari database dan bisa diubah dari panel admin.</p>
        </div>

        <h4 class="mb-4 text-primary"><i class="fa fa-mosque me-2"></i>Hari Besar Islam</h4>
        <div class="row g-4 mb-5">
          @forelse ($islamicHolidays as $holiday)
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow rounded-3 holiday-card h-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center mb-3">
                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width:50px;height:50px;min-width:50px;">
                      <i class="fa fa-star text-white"></i>
                    </div>
                    <div>
                      <h6 class="mb-0 text-success">{{ \Carbon\Carbon::parse($holiday->holiday_date)->translatedFormat('d F Y') }}</h6>
                      @if ($holiday->hijri_date)
                        <small class="text-muted">{{ $holiday->hijri_date }}</small>
                      @endif
                    </div>
                  </div>
                  <h5 class="card-title">{{ $holiday->title }}</h5>
                  @if ($holiday->description)
                    <p class="text-muted mb-0">{{ $holiday->description }}</p>
                  @endif
                </div>
              </div>
            </div>
          @empty
            <p class="text-muted">Belum ada data hari besar Islam.</p>
          @endforelse
        </div>

        <h4 class="mb-4 text-danger"><i class="fa fa-flag me-2"></i>Hari Libur Nasional</h4>
        <div class="row g-4">
          @forelse ($nationalHolidays as $holiday)
            <div class="col-lg-4 col-md-6">
              <div class="card border-0 shadow rounded-3 holiday-card h-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center mb-3">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center me-3" style="width:50px;height:50px;min-width:50px;">
                      <i class="fa fa-calendar-day text-white"></i>
                    </div>
                    <h6 class="mb-0">{{ \Carbon\Carbon::parse($holiday->holiday_date)->translatedFormat('d F Y') }}</h6>
                  </div>
                  <h5 class="card-title">{{ $holiday->title }}</h5>
                  @if ($holiday->description)
                    <p class="text-muted mb-0">{{ $holiday->description }}</p>
                  @endif
                </div>
              </div>
            </div>
          @empty
            <p class="text-muted">Belum ada data hari libur nasional.</p>
          @endforelse
        </div>
      </div>
    </div>

    <x-footer></x-footer>
    <a href="#" class="btn btn-primary border-3 border-light back-to-top"><i class="fa fa-arrow-up"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>

    <script>
      let fetchedEvents = {};
      let fetchedHolidays = {};
      let current = new Date();
      const now = new Date();
      const todayISO = isoDate(now);

      function renderCalendar(date) {
        fetchAndRenderEvents(date);
      }

      function fetchAndRenderEvents(date) {
        const year = date.getFullYear();
        const month = date.getMonth();
        const startDate = buildISO(year, month, 1);
        const endDate = buildISO(year, month + 1, 0);

        $.ajax({
          url: '{{ route('events.fetch') }}',
          type: 'GET',
          data: { start: startDate, end: endDate },
          success: function(response) {
            fetchedEvents = {};
            fetchedHolidays = {};

            response.forEach(item => {
              const dateKey = item.start.substring(0, 10);
              if (item.kind === 'event') {
                if (!fetchedEvents[dateKey]) fetchedEvents[dateKey] = [];
                fetchedEvents[dateKey].push(item);
              }
              if (item.kind === 'holiday') {
                if (!fetchedHolidays[dateKey]) fetchedHolidays[dateKey] = [];
                fetchedHolidays[dateKey].push(item);
              }
            });

            reRenderCalendarLayout(date);
          },
          error: function(xhr) {
            console.error('Gagal ambil data:', xhr.responseText);
          }
        });
      }

      function reRenderCalendarLayout(date) {
        const grid = document.querySelector('.calendar-grid');
        const existingDays = grid.querySelectorAll('.calendar-day');
        existingDays.forEach(n => n.remove());

        const year = date.getFullYear();
        const month = date.getMonth();
        const firstDay = new Date(year, month, 1);
        const startDay = firstDay.getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        document.getElementById('monthYear').textContent = date.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });
        document.getElementById('todayLabel').textContent = now.toLocaleDateString('id-ID');

        for (let i = 0; i < startDay; i++) {
          appendDayCell(year, month - 1, new Date(year, month, 0).getDate() - (startDay - 1) + i, true);
        }

        for (let d = 1; d <= daysInMonth; d++) {
          appendDayCell(year, month, d, false);
        }

        const totalCells = grid.querySelectorAll('.calendar-day').length;
        const trailing = 42 - totalCells;
        for (let i = 1; i <= trailing; i++) {
          appendDayCell(year, month + 1, i, true);
        }
      }

      function appendDayCell(y, m, d, otherMonth) {
        const grid = document.querySelector('.calendar-grid');
        const cell = document.createElement('div');
        cell.className = 'calendar-day' + (otherMonth ? ' other-month' : '');
        const dateStr = buildISO(y, m, d);

        const dateEl = document.createElement('div');
        dateEl.className = 'date fw-bold';
        dateEl.textContent = new Date(y, m, d).getDate();
        cell.appendChild(dateEl);

        if (dateStr === todayISO) cell.classList.add('today');

        if (fetchedHolidays[dateStr]) {
          fetchedHolidays[dateStr].forEach(holiday => {
            const h = document.createElement('a');
            h.href = '#';
            h.className = 'event-pill ' + (holiday.type === 'islamic' ? 'event-islamic' : 'event-holiday');
            h.textContent = holiday.title;
            h.onclick = e => {
              e.preventDefault();
              const label = holiday.type === 'islamic' ? 'Hari Besar Islam' : 'Hari Libur Nasional';
              alert(label + ': ' + holiday.title + '\nTanggal: ' + dateStr + (holiday.description ? '\nKeterangan: ' + holiday.description : ''));
            };
            cell.appendChild(h);
          });
        }

        if (fetchedEvents[dateStr]) {
          fetchedEvents[dateStr].forEach(ev => {
            const a = document.createElement('a');
            a.href = '#';
            a.className = 'event-pill ' + (ev.is_routine ? 'event-routine' : 'event-normal');
            const eventTime = new Date(ev.start).toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            a.textContent = ev.title + ' • ' + eventTime;
            a.onclick = e => {
              e.preventDefault();
              alert(
                'Acara: ' + ev.title +
                '\nTanggal: ' + dateStr +
                '\nWaktu: ' + eventTime +
                '\nUstadz: ' + (ev.speaker || 'N/A') +
                '\nLokasi: ' + (ev.location || 'N/A')
              );
            };
            cell.appendChild(a);
          });
        }

        grid.appendChild(cell);
      }

      function buildISO(y, m, d) {
        return isoDate(new Date(y, m, d));
      }

      function isoDate(dt) {
        const yyyy = dt.getFullYear();
        const mm = String(dt.getMonth() + 1).padStart(2, '0');
        const dd = String(dt.getDate()).padStart(2, '0');
        return `${yyyy}-${mm}-${dd}`;
      }

      document.getElementById('prevBtn').onclick = () => { current.setMonth(current.getMonth() - 1); renderCalendar(current); };
      document.getElementById('nextBtn').onclick = () => { current.setMonth(current.getMonth() + 1); renderCalendar(current); };
      document.getElementById('todayBtn').onclick = () => { current = new Date(); renderCalendar(current); };

      renderCalendar(current);
    </script>
  </body>
</html>
