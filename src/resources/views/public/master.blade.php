<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>

    @include('core::public._google_analytics_code')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:site_name" content="{{ $websiteTitle }}">
    <meta property="og:title" content="@yield('ogTitle')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::full() }}">
    <meta property="og:image" content="@yield('ogImage')">

    @if (config('typicms.twitter_site') !== null)
    <meta name="twitter:site" content="{{ config('typicms.twitter_site') }}">
    <meta name="twitter:card" content="summary_large_image">
    @endif

    @if (config('typicms.facebook_app_id') !== null)
    <meta property="fb:app_id" content="{{ config('typicms.facebook_app_id') }}">
    @endif

    <link href="{{ App::environment('production') ? mix('css/public.css') : asset('css/public.css') }}" rel="stylesheet">

    @include('core::public._feed-links')

    @stack('css')

</head>

<body class="body-{{ $lang }} @yield('bodyClass') @if ($navbar)has-navbar @endif" id="top">

    @include('core::public._google_tag_manager_code')

    @section('skip-links')
    <a href="#main" class="skip-to-content">@lang('Skip to content')</a>
    @show

    @include('core::_navbar')

    <div class="site-container">

        @section('site-header')
        <header class="site-header" id="site-header">
            <div class="site-header-container">
                @section('site-title')
                <div class="site-title">@include('core::public._site-title')</div>
                @show
                <div class="site-header-offcanvas" id="navigation">
                    <button class="d-flex d-lg-none btn-offcanvas btn-offcanvas-close" data-toggle="offcanvas" title="@lang('Close navigation')" aria-label="@lang('Close navigation')">
                        <svg width="2.5rem" height="2.5rem" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                    @section('site-nav')
                    <nav class="site-nav" id="site-nav">
                        @menu('main')
                    </nav>
                    @show
                    @include('search::public._form')
                    @section('lang-switcher')
                        @include('core::public._lang-switcher')
                    @show
                </div>
                <a href="#site-nav" class="d-flex d-lg-none btn-offcanvas" data-toggle="offcanvas" title="@lang('Open navigation')" aria-label="@lang('Open navigation')" role="button" aria-controls="navigation" aria-expanded="false">
                    <svg width="2.5rem" height="2.5rem" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </a>
            </div>
        </header>
        @show

        @if (session('verified'))
            <div class="alert alert-success">@lang('Your email address has been verified.')</div>
        @endif

        <main class="main" id="main">
            @yield('content')
        </main>

        <a href="#top" class="smooth-scroll anchor-top disabled" id="anchor-top" aria-label="@lang('Back to top')">⇧</a>

        @section('site-footer')
        <footer class="site-footer">
            <div class="site-footer-container">
                <nav class="site-footer-nav">
                    @menu('social')
                </nav>
                <nav class="site-footer-nav">
                    @menu('footer')
                </nav>
                <nav class="site-footer-nav">
                    @menu('legal')
                </nav>
            </div>
        </footer>
        @show

    </div>

    <script src="{{ App::environment('production') ? mix('js/public.js') : asset('js/public.js') }}"></script>
    @if (request('preview'))
    <script src="{{ asset('js/previewmode.js') }}"></script>
    @endif

    @stack('js')

</body>

</html>
