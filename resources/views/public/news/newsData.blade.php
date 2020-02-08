@foreach($allNews as $news)
    @if($loop->first && $allNews->currentPage() == 1)
        <div class="row">
            <div class="col-lg-1 col-md-12 mx-auto" style="max-width: 70px">
                <span class="important-news-date">{{date("d.m", strtotime($news->publish_date))}}</span>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="important-news-title d-inline">{{$news->title}}</div>
                <div class="important-news-text d-flex mt-3">{{html_entity_decode(substr(strip_tags($news->text), 0, 200))}}...</div>
                <div>
                    <a class="news-link"
                       href="{{route('public.news.show', [mb_strtolower(class_basename($news)), $news->id])}}">
                        @lang('news.more')
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mb-5 d-flex justify-content-end">
                @if(!empty($news->video))
                    <div class="player">
                        <iframe width="300" height="150"
                                src="{{ $news->video }}"
                                frameborder="0"
                                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                @elseif(!empty ($news->files[0]))
                    <div>
                        <a href="{{asset('storage/'.$news->files[0]->file)}}" target="_blank">
                            <button class="news-file-button"> {{basename($news->files[0]->file)}}</button>
                        </a>
                    </div>
                @elseif(!empty($news->images[0]))
                    <img data-src="{{asset('storage/'.$news->images[0]->image)}}" class="player lazyload">
                @else
                    <img data-src="{{asset('/images/slider-news-1.png')}}" class="player lazyload">
                @endif
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 mt-3" style="margin-left: -1.7%;">
                <div class="row">
                    <div class="col-2">
                        <img width="51" height="45" data-src="{{asset('/images/left-quote.png')}}"
                             class="img-rad lazyload">
                    </div>
                    <div class="col-10">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 position-relative">
                <span class="news-date-small">{{date("F Y", strtotime($news->publish_date))}}</span>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="news-title">{{$news->title}}</div>
                <div class="mt-5">{{html_entity_decode(substr(strip_tags($news->text), 0, 110))}}...</div>
                <div>
                    <a class="news-link"
                       href="{{route('public.news.show', [mb_strtolower(class_basename($news)), $news->id])}}">
                        @lang('news.more')
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 d-flex justify-content-end">
                @if(!empty($news->video))
                    <div class="player-small">
                        <iframe width="200" height="100"
                                src="{{ $news->video }}"
                                frameborder="0"
                                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                @elseif(!empty ($news->files[0]))
                    <div>
                        <a href="{{asset('storage/'.$news->files[0]->file)}}" target="_blank">
                            <button class="news-file-button"> {{basename($news->files[0]->file)}}</button>
                        </a>
                    </div>
                @elseif(!empty($news->images[0]))
                    <img data-src="{{asset('storage/'.$news->images[0]->image)}}" class="img-news-small lazyload">
                @else
                    <img data-src="{{asset('/images/slider-news-1.png')}}" class="img-news-small lazyload">
                @endif
            </div>
        </div>
    @endif
@endforeach