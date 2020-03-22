@if ($paginator->hasPages())
    <nav>
        <ul class="page-nav">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-nav__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-nav__item__link disabled"><i class="fa fa-angle-double-left"></i></span>
                </li>
            @else
                <li class="page-nav__item" aria-label="@lang('pagination.previous')">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-nav__item disabled" aria-disabled="true">
                        <span href="#" class="page-nav__item__link disabled">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-nav__item" aria-current="page">
                                <span class="page-nav__item__link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-nav__item" aria-label="@lang('pagination.previous')">
                                <a href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-nav__item" aria-label="@lang('pagination.next')">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a>
                </li>
            @else
                <li class="page-nav__item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-nav__item__link disabled"><i class="fa fa-angle-double-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
