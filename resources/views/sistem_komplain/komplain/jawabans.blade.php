@foreach($jawabans as $jawab)
<div class="media well well-sm">
    <div class="media-left">
        <a href="#">
            <img class="media-object" src="http://placehold.it/32x32" alt="...">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading">Dijawab oleh: {{ $jawab->penjawab }}</h4>

        <p>{{ $jawab->jawaban }}</p>
    </div>
</div>
@endforeach