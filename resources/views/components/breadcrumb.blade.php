<div class="breadcrumb">
    <h1>Sistem Pengurusan Perakuan BOMBA</h1>
    <ul>
        @if(sizeof($breadcrumbs) > 0)
            @foreach($breadcrumbs as $breadcrumb)
                <li>{{ $breadcrumb }}</li>
            @endforeach
        @endif
    </ul>
</div>
