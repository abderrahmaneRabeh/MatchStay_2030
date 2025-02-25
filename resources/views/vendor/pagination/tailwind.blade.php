@if ($paginator->hasPages())
    <nav role="navigation" class="flex justify-center mt-8">
        <ul class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    Précédent
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-4 py-2 text-white transition duration-300 rounded-lg bg-primary hover:bg-secondary">
                        Précédent
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="px-4 py-2 text-gray-400">{{ $element }}</li>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 text-white transition duration-300 rounded-lg bg-secondary">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-4 py-2 text-gray-700 transition duration-300 bg-gray-100 rounded-lg hover:bg-primary hover:text-white">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-4 py-2 text-white transition duration-300 rounded-lg bg-primary hover:bg-secondary">
                        Suivant
                    </a>
                </li>
            @else
                <li class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                    Suivant
                </li>
            @endif
        </ul>
    </nav>
@endif