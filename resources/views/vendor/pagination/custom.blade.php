@if ($paginator->hasPages())
    <nav class="flex justify-between items-center py-4">
        {{-- ปุ่ม Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Previous</a>
        @endif

        {{-- แสดงเลขหน้าปัจจุบัน --}}
        <span class="text-sm text-gray-600">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </span>

        {{-- ปุ่ม Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Next</a>
        @else
            <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">Next</span>
        @endif
    </nav>
@endif
