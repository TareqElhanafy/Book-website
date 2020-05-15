@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">


            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <!-- <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li> -->
                            <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">{{ $page }}</a></li>

                        @else
                            <!-- <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li> -->
                            <li class="paginate_button "><a  href="{{ $url }}" aria-controls="example2" data-dt-idx="2" tabindex="0">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
    </nav>
@endif
