@php
use App\Models\Komplain;

$komplains = Komplain::orderBy('created_at', 'desc')->limit(5)->get();

@endphp

<!-- Trending Box -->
<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-line-chart"></i>
        <h3 class="box-title">Terpopuler</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            @if(count($komplains) > 0 )
                @foreach($komplains as $item)
                    <li><a href="{{ route('sistem-komplain.komplain', $item->slug) }}"><i class="fa fa-comment"></i> {{ $item->judul }}</a></li>
                @endforeach
            @else
                <li><a href="#"><i class="fa fa-comment"></i> Data tidak ditemukan.</a></li>
            @endif
        </ul>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->