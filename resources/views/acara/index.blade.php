@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kalender Acara</h1>
        <a href="{{ route('acara.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
            + Tambah Acara
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div id="calendar" class="p-4"></div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Daftar Acara Mendatang</h2>
        <div class="space-y-4">
            @forelse($acara as $item)
                <div class="bg-white rounded-lg shadow p-4 border-l-4" style="border-color: {{ $item->getColor() }}">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $item->nama_acara }}</h3>
                            <p class="text-gray-600">{{ $item->getFormattedDate() }} • {{ $item->lokasi ?? 'Online' }}</p>
                            @if($item->deskripsi)
                                <p class="mt-2 text-gray-700">{{ Str::limit($item->deskripsi, 100) }}</p>
                            @endif
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('acara.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </a>
                            <form action="{{ route('acara.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus acara ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow p-4 text-center text-gray-500">
                    Tidak ada acara yang dijadwalkan.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/id.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: {
            url: "{{ route('acara.index') }}",
            method: 'GET',
            extraParams: {
                ajax: true
            },
            failure: function() {
                alert('Gagal memuat acara!');
            }
        },
        eventClick: function(info) {
            // Redirect ke halaman detail acara saat diklik
            window.location.href = "{{ route('acara.index') }}/" + info.event.id;
        },
        eventDisplay: 'block',
        eventTimeFormat: { // Format waktu
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        }
    });
    calendar.render();
});
</script>
@endpush