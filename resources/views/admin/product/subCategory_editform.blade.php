
@foreach($subcategories as $subcategory)
    @if(count($subcategory->subCategoryProduct))
        <li>
            <div class="caret open @if(in_array($subcategory->id,$cat_parents)) caret-down @endif">
                <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="{{$subcategory->id}}" onchange="category_click(this,'{{$subcategory->name}}')"  @if(in_array($subcategory->id,getCategoryFormEditValue($product,$product->id))) checked @endif> &nbsp;{{$subcategory->name}}
            </div>
            @if(count($subcategory->subCategoryProduct))
            <ul class="nested @if(in_array($subcategory->id,$cat_parents)) active @endif">

                @include('admin.product.subCategory_editform',['subcategories' => $subcategory->subCategoryProduct,'cat_parents'=>$cat_parents])
            </ul>
            @endif
        </li>
    @else 
    <li>
        <div class="uncaret item">
            <input type="checkbox" id="html" class="radio-btn" name="category_id[]" value="{{$subcategory->id}}" onchange="category_click(this,'{{$subcategory->name}}')"  @if(in_array($subcategory->id,getCategoryFormEditValue($product,$product->id))) checked @endif>&nbsp; {{$subcategory->name}}
        </div>
    </li>
     @endif
@endforeach
