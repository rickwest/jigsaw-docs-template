@extends('_layouts.master')

@section('body')
@component('_partials.header', ['page' => $page])
    <input id="docsearch" class="bg-grey-lighter outline-none px-4r py-2 rounded-full text-grey-darker search-field" type="text" name="docsearch" value="">

    <a href="#" class="bg-grey-lighter flex justify-center lg:hidden ml-4 px-4 py-2 rounded-full" @click="showMobileNav = !showMobileNav;">
        <svg class="fill-current flex h-6 items-center text-grey-dark" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
        </svg>
    </a>
@endcomponent

<section class="container mx-auto px-4">
    <div class="flex flex-col lg:flex-row">
        <responsive-navigation :show-mobile="showMobileNav">
            @include('_partials.nav')
        </responsive-navigation>

        <div class="markdown w-full lg:w-3/4 lg:pl-4">
            @yield('documentation_content')
        </div>
    </div>
</section>
@endsection

@section('scripts')
@if ($page->docsearchApiKey && $page->docsearchIndexName)
    <script type="text/javascript">
        docsearch({
            apiKey: '{{ $page->docsearchApiKey }}',
            indexName: '{{ $page->docsearchIndexName }}',
            inputSelector: '#docsearch'
        });
    </script>
@endif
@endsection
