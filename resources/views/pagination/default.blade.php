@if ($paginator->hasPages())
<div class="col-lg-12 text-center">
    <div class="pagination__option">
        @if ($paginator->onFirstPage())
        <a href="javascript:void(0)" class="disabled"><i class="fa fa-angle-left"></i></a>
        @else
        <a href="{{$paginator->previousPageUrl()}}" class=""><i class="fa fa-angle-left"></i></a>
        @endif

        @foreach ($elements as $element)
            @if(is_string($element))
            <a href="javascript:void(0)">{{$element}}</a>
            @endif
            @if(is_array($element))
                @foreach ($element as $page=>$url)
                    @if($page == $paginator->currentPage())
                    <a href="javascript:void(0)">{{$page}}</a>
                    @else
                    <a href="{{$url}}">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <a href="{{$paginator->nextPageUrl()}}"><i class="fa fa-angle-right"></i></a>
        @else
        <a href="javascript:void(0)" class="disabled"><i class="fa fa-angle-right"></i></a>
        @endif
    </div>
</div>
@endif