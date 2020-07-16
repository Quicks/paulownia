@if ($paginator->lastPage() > 1)
    <div class="row">
        <div class="col-12 mt-3 mt-lg-4">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}" tabindex="-1"><i class="ion-ios-arrow-thin-left"></i></a>
                </li>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="ion-ios-arrow-thin-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
@endif