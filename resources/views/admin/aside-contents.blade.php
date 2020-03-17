<div class="aside-news">
    <ul>
        <li>
            <a href="{{route('contents.index')}}"
               @if(Request::is('admin/contents*'))
               class="aside-news-active"> Content
                <i class="aside-icon"></i>
                @else >Content @endif
            </a>
        </li>
        <li>
            <a href="{{route('f-a-q.index')}}"
               @if(Request::is('admin/f-a-q*'))
               class="aside-news-active">FAQ
                <i class="aside-icon"></i>
                @else  >FAQ @endif
            </a>
        </li>
    </ul>
</div>