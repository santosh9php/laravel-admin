<?php $dash.='&nbsp;&nbsp;>&nbsp;&nbsp;'; ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" @if(app('request')->input('search_category') == $subcategory->id) selected @endif>{!!$dash!!}{{$subcategory->name}}</option>
    @if(count($subcategory->subCategory))
        @include('admin.subCategory.subCategory_search',['subcategories' => $subcategory->subCategory])
    @endif
@endforeach