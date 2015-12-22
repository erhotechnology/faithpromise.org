@extends('layouts.default', ['title' => 'Sermons'])

@section('content')

    @include('partials.hero_video', [
        'video' => $latest_sermon,
        'heading' => 'Latest Sermon:'
    ])

    <div class="Content">

        <div class="SeriesSection">
            <div class="SeriesSection-container">
                <h2 class="SeriesSection-title text-left">Past Sermon Series</h2>
                <p class="SeriesSection-podcastLink">Watch past sermons here, or subscribe to our <a href="http://itunes.apple.com/WebObjects/MZStore.woa/wa/viewPodcast?id=75485008">podcast on iTunes</a>.</p>
                <div class="SeriesGallery">
                    <ul class="SeriesGallery-list">
                        <?php $next_series_starts = null; ?>
                        @foreach($series as $item)
                            <li class="SeriesGallery-item">
                                <a id="to_series_{{ $item->slug }}_from_sermons" class="SeriesGallery-link" href="{{ route('series', $item->slug) }}">
                                    <img
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            class="SeriesGallery-thumb b-lazy"
                                            data-src-sm="{{ cdn_image('sm', 'quarter', $item->image, 'square') }}"
                                            data-src-md="{{ cdn_image('md', 'quarter', $item->image, 'square') }}"
                                            data-src-lg="{{ cdn_image('lg', 'quarter', $item->image, 'square') }}"
                                            data-src="{{ cdn_image('xl', 'quarter', $item->image, 'square') }}">

                                    <div class="SeriesGallery-titles">
                                        <h3 class="SeriesGallery-title">{{ $item->title }}</h3>
                                        <h4 class="SeriesGallery-subtitle">
                                            @if ($item->starts_at->isFuture() OR $latest_sermon->Series->slug === $item->slug)
                                                {{ $item->getDate($next_series_starts) }}
                                            @else
                                                {{ $item->when }}
                                            @endif
                                        </h4>
                                    </div>
                                </a>
                            </li>
                            <?php $next_series_starts = $item->starts_at; ?>
                        @endforeach
                    </ul>

                </div>

            </div>
        </div>

    </div>

@endsection