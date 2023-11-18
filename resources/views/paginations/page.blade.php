<div class="single-wrap d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-start">
            @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link py-2 px-3 rounded mr-1 border" href="#"><i class="fa-solid fa-angles-left fs-16"></i></a></li>
            <li class="page-item disabled"><a class="page-link py-2 px-3 rounded mr-1 border" href="#"><i class="fa-solid fa-angle-left fs-16"></i></a></li>
            @else
            <li class="page-item"><a class="page-link py-2 px-3 rounded mr-1 border" href="{{$paginator->url(1)}}"><i class="fa-solid fa-angles-left fs-16"></i></a></li>
            <li class="page-item"><a class="page-link py-2 px-3 rounded mr-1 border" href="{{$paginator->previousPageUrl()}}"><i class="fa-solid fa-angle-left fs-16"></i></a></li>
            @endif
            @foreach ($elements as $element)
            @if (is_string($element))
            <li class="disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
            @foreach ($element as $page => $url)
            <li class="page-item {{$page == $paginator->currentPage() ? 'active' : ''}}">
                <a class="page-link py-2 px-3 rounded mr-1 border" href="{{$page == $paginator->currentPage() ? '#' : $url}}">{{$page}}</a>
            </li>
            @endforeach
            @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link py-2 px-3 rounded mr-1 border" href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-angle-right fs-16"></i></a></li>
            <li class="page-item"><a class="page-link py-2 px-3 rounded mr-1 border" href="{{ $paginator->url($paginator->lastPage()) }}"><i class="fa-solid fa-angles-right fs-16"></i></a></li>
            @else
            <li class="page-item disabled"><a class="page-link py-2 px-3 rounded mr-1 border" href="#"><i class="fa-solid fa-angle-right fs-16"></i></a></li>
            <li class="page-item disabled"><a class="page-link py-2 px-3 rounded mr-1 border" href="#"><i class="fa-solid fa-angles-right fs-16"></i></a></li>
            @endif
        </ul>
    </nav>
</div>