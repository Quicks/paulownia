<div class="aside-news">
    <ul>
        @if(bouncer()->hasPermission('news'))
            <li>
                <a href="{{route('news.index')}}"
                    @if(Request::is('admin/news*'))
                        class="aside-news-active"> News
                        <i class="aside-icon"></i>
                    @else >News @endif
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('articles'))
            <li>
                <a href="{{route('articles.index')}}"
                    @if(Request::is('admin/articles*'))
                        class="aside-news-active">Articles
                        <i class="aside-icon"></i>
                    @else  >Articles @endif
                </a>
            </li>
        @endif
        @if(bouncer()->hasPermission('treatises'))
            <li>
                <a href="{{route('treatises.index')}}"
                    @if(Request::is('admin/treatises*'))
                        class="aside-news-active">Treatises
                        <i class="aside-icon"></i>
                    @else >Treatises @endif
                </a>
            </li>
        @endif
    </ul>
</div>