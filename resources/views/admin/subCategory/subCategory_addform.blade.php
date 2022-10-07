
    @foreach($subcategories as $subcategory)
        @if(count($subcategory->subCategory))
            <li>
                 
                <div class="caret open @if(in_array($subcategory->id,$cat_parents)) caret-down @endif">
                    <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="{{$subcategory->id}}" @if(old('parent_id') == $subcategory->id) checked @endif> {{$subcategory->name}}
                </div>
                @if(count($category->subCategory))
                <ul class="nested @if(in_array($subcategory->id,$cat_parents)) active @endif">
                     @include('admin.subCategory.subCategory_addform',['subcategories' => $subcategory->subCategory,'cat_parents'=>$cat_parents])
                </ul>
                @endif
            </li>
        @else 
        <li>
            <div class="uncaret item">
                <input type="checkbox" id="html" class="radio-btn" name="parent_id" value="{{$subcategory->id}}" @if(old('parent_id') == $subcategory->id) checked @endif> {{$subcategory->name}}
            </div>
        </li>
         @endif
    @endforeach


