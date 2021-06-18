@if ($paginator->lastPage() > 1)
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ $paginator->currentPage() == 1 ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}"><span aria-hidden="true">&laquo;</span></a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item {{ $paginator->currentPage() == $i ? ' active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage() + 1) }}"><span aria-hidden="true">&raquo;</span></a>
        </li>
    </ul>
</nav>
@endif
