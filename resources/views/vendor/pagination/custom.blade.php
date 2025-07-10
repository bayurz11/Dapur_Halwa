@if ($paginator->hasPages())
    <ul class="pagination d-flex align-items-center justify-content-center mt-4" role="navigation"
        style="padding-left: 0; list-style: none;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-page disabled" aria-disabled="true" style="margin: 0 4px;">
                <span class="pagination-page_link d-flex align-items-center justify-content-center"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #999; font-weight: 500;">&laquo;</span>
            </li>
        @else
            <li class="pagination-page" style="margin: 0 4px;">
                <a class="pagination-page_link d-flex align-items-center justify-content-center"
                    href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #333; text-decoration: none; font-weight: 500;">&laquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="pagination-page disabled" aria-disabled="true" style="margin: 0 4px;">
                    <span class="pagination-page_link d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #999; font-weight: 500;">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-page active" aria-current="page" style="margin: 0 4px;">
                            <span class="pagination-page_link d-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px; background-color: #419937; border: 1px solid #419937; color: #fff; border-radius: 4px; font-weight: 600;">{{ $page }}</span>
                        </li>
                    @else
                        <li class="pagination-page" style="margin: 0 4px;">
                            <a class="pagination-page_link d-flex align-items-center justify-content-center"
                                href="{{ $url }}"
                                style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #333; text-decoration: none; font-weight: 500;">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-page" style="margin: 0 4px;">
                <a class="pagination-page_link d-flex align-items-center justify-content-center"
                    href="{{ $paginator->nextPageUrl() }}" rel="next"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #333; text-decoration: none; font-weight: 500;">&raquo;</a>
            </li>
        @else
            <li class="pagination-page disabled" aria-disabled="true" style="margin: 0 4px;">
                <span class="pagination-page_link d-flex align-items-center justify-content-center"
                    style="width: 36px; height: 36px; border: 1px solid #ddd; border-radius: 4px; color: #999; font-weight: 500;">&raquo;</span>
            </li>
        @endif
    </ul>
@endif
