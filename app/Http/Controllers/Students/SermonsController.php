<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Series;
use FaithPromise\Shared\Models\Video;
use Illuminate\Routing\Controller as BaseController;

class SermonsController extends BaseController {

    public function index() {

        $latest_sermon = Video::with('series')->where('type', '=', 'sermon')->orderBy('publish_at', 'desc')->first();

        $series = Series::has('videos')->where('is_official', '=', 1)->orderBy('publish_at', 'desc')->get();

        return view('students/sermons', [
            'series'        => $series,
            'latest_sermon' => $latest_sermon,
            'permalink'     => route('fpStudents_seriesVideo', $latest_sermon->Series->slug, $latest_sermon->slug)
        ]);
    }

    public function series($series) {

        $videos = Video::with('Series')->with('Speaker')->where('series_id', '=', $series->id)->orderBy('sermon_date', 'asc')->get();

        return view('students/series', [
            'series' => $series,
            'videos' => $videos
        ]);

    }

    public function video($series, $video) {

        $videos = Video::with('Series')->where('series_id', '=', $series->id)->orderBy('sermon_date', 'asc')->get();

        return view('students/series_video', [
            'series' => $series,
            'video' => $video,
            'videos' => $videos
        ]);

    }

}