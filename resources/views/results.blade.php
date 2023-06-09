@extends('layout', [$title = 'Search Results'])

@section('content')

    {{-- Show renew notification if administrative term ended --}}
    @if($renew)
        <x-modal.renew-notification :term="$current_term"/>
    @endif
    
    {{-- Navigation Bar --}}
    <x-navbar :barangay="$barangay" :municipality="$municipality"/>

    {{-- Top Accent --}}
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="fixed -z-10 top-12 right-0">

    {{-- Category Drawer --}}
    <x-drawer :barangay="$barangay" :municipality="$municipality" :logo="$logo" :terms="$terms"/>

    {{-- Upload FAB --}}
    <button id="upload-fab" title="Upload" class="fixed z-90 bottom-10 right-8 bg-[#425B71] w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-[#346A90] hover:drop-shadow-2xl">
        <img src="{{ asset('/images/upload.svg') }}" alt="" class="h-9 w-9 translate-x-[18px]">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </button>

    {{-- Back to To FAB --}}
    <a href="#" id="top-fab" title="Back to Top" class="hidden fixed z-90 bottom-10 right-8 bg-white w-[72px] h-[72px] overflow-clip rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:shadow-lg">
        <img src="{{ asset('/images/arrow-head.svg') }}" alt="" class="h-9 w-9 translate-x-[18px] rotate-180">
        <svg width="68" height="44" viewBox="0 0 68 44" fill="none" xmlns="http://www.w3.org/2000/svg" class="scale-150 translate-x-1 translate-y-3">
            <path d="M80 7.22399V49C80 52.866 77.3303 56 74.0371 56H0C3.63886 24.3779 26.7231 0 54.6576 0C63.7941 0 72.4118 2.60782 80 7.22399Z" fill="#797979" fill-opacity="0.34"/>
        </svg>
    </a>

    {{-- Upload Modal --}}
    <x-modal.upload :terms="$terms"/>

    {{-- Search --}}
    <x-search class="mt-16" :terms="$terms"/>

    {{-- Titleholder --}}
    <div class="relative flex flex-row mt-12 mx-36 justify-between items-center md:mx-60">
        <div class="flex justify-start">
            <p id="breakpoint" class="text-xl text-[#181313] font-bold font-sans ">
                Search Results
                <span class="text-[#909090] font-normal">({{count($documents)}} matches for "{{$query}}")</span>
            </p>
        </div>
        <div class="flex space-x-4 justify-end">
            <img src="{{ asset('/images/print.svg') }}" id="print-report" alt="Print Report" title="Print Report" class="cursor-pointer">
            <x-modal.report-viewer/>
            <x-sort/>
        </div>
    </div>

    {{-- Document Cards --}}
    @if(count($documents) == 0)
        <div class="div flex flex-col mt-9 mx-4 justify-center items-center space-y-6">
            <p class="font-sans font-bold text-5xl text-gray-600 text-center">No Documents Found</p>
        </div>
    @else
        <div class="flex flex-col space-y-8 items-center py-8 mx-36 md:mx-60">
            @foreach($documents as $document)
                <x-card :document="$document"/>
            @endforeach
        </div>
    @endif

    {{-- PDF Viewer --}}
    <x-modal.document-viewer/>

    {{-- Update Modal --}}
    <x-modal.update :authors="$authors" :terms="$terms"/>

    {{-- Confirm Modal --}}
    <x-modal.confirm-delete/>

    {{-- Bottom Accent --}}
    <img src="{{ asset('/images/accent-1.svg') }}" alt="" class="fixed -z-10 bottom-0 left-0 rotate-180">

    <script src="{{ asset('/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('/js/flowbite.js') }}"></script>
    <script src="{{ asset('/js/datepicker.js') }}"></script>
    <script src="{{ asset('/js/fab.js') }}"></script>

@endsection