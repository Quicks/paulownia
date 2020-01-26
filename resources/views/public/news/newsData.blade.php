@foreach($allNews as $news)
    @if($loop->first && $allNews->currentPage() == 1)
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="d-inline">
                    <span class="important-news-title">{{date("d.m", strtotime($news->created_at))}}</span>
                </div>
                <div class="important-news-title d-inline"> {{$news->title}}</div>
                <div class="important-news-text">{{substr(strip_tags($news->text), 0, 250)}}</div>
                <div><a class="news-link"
                        href="{{route('public.news.show', [class_basename($news), $news->id])}}">Read more</a></div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5">
                @if(!empty($news->video))
                    <div class="player">
                        <iframe width="300" height="150"
                                src="{{ $news->video }}"
                                frameborder="0"
                                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                @elseif(!empty ($news->files))
                    @foreach($news->files as $file)
                        <div>
                            <a href="{{asset('storage/'.$file->file)}}" target="_blank">
                                <button class="news-file-button"> {{basename($file->file)}}</button>
                            </a>
                        </div>
                    @endforeach
                @elseif(!empty($news->images[0]))
                    <img data-src="{{asset('storage/'.$news->images[0]->image)}}" class="img-rad lazyload">
                @else
                    <img data-src="{{asset('/images/slider-news-1.png')}}" class="img-rad lazyload">
                @endif
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 mb-3 mt-5" style="margin-left: -1.7%;">
                <div class="row">
                    <div class="col-1">
                        <img width="51" height="45" data-src="{{asset('/images/left-quote.png')}}" class="img-rad lazyload">
                    </div>
                    <div class="col-11">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 mt-5">
                <div class="important-news-title"> {{$news->title}}</div>
                <div>{{substr(strip_tags($news->text), 0, 200)}}</div>
                <div><a class="news-link"
                        href="{{route('public.news.show', [class_basename($news), $news->id])}}">Read more</a></div>
            </div>
            <div class="col-lg-4 col-md-12 mt-5">
                @if(!empty($news->video))
                    <div class="player-small">
                        <iframe width="200" height="100"
                                src="{{ $news->video }}"
                                frameborder="0"
                                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                @elseif(!empty ($news->files))
                    @foreach($news->files as $file)
                    <div>
                        <a href="{{asset('storage/'.$file->file)}}" target="_blank">
                            <button class="news-file-button"> {{basename($file->file)}}</button>
                        </a>
                    </div>
                    @endforeach
                @elseif(!empty($news->images[0]))
                    <img data-src="{{asset('storage/'.$news->images[0]->image)}}" class="img-news-small lazyload">
                @else
                    <img data-src="{{asset('/images/slider-news-1.png')}}" class="img-news-small lazyload">
                @endif
            </div>
        </div>
    @endif
@endforeach