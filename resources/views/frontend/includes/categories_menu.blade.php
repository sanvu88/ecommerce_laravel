@foreach($categories as $category)
    @if(count($category->children) > 0)
        <li class="has-child">
            <a href="#">{{ $category->name }} <span class="arrow-right"><i class="ti-angle-right"></i></span></a>
            <ul class="sub-ul-menu sub-ul-menu-child">
                @include('frontend.includes.categories_menu',['categories' => $category->children])
            </ul>
        </li>
    @else
        <li><a href="#">{{ $category->name }}</a></li>
    @endif
@endforeach
