@include('layouts.header')

<div id="app">
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>

@include('layouts.footer')