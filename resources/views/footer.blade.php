
</div>
</main>

<footer class="site-footer container small">
    @foreach( Config::get('language') as $lang => $language )
        <a href="{{ url('lang', $lang) }}" class="text-muted">
            @if( $lang == App::getlocale() )
                <strong>{{ $language }}</strong>
            @else
                {{ $language }}
            @endif
        </a>
    @endforeach
</footer>



<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>