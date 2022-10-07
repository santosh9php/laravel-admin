<?php $dash.='&nbsp;&nbsp;>&nbsp;&nbsp;'; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" @if(app('request')->input('search_by_category') == $subcategory->id) selected @endif>{!!$dash!!}{{$subcategory->name}}</option>
    @if(count($subcategory->subCategory))
        @include('admin.product.subCategory_search',['subcategories' => $subcategory->subCategory])
    @endif
@endforeach