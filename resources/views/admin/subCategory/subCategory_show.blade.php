<?php $dash.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
@foreach($subcategories as $subcategory)
    <tr>
      <td style="text-align:center;">
          <div class="form-check">
                <input class="form-check-input cat_check" type="checkbox" name="cat_ids" id="cat_ids" value="{{$subcategory->id}}" >
          </div>
      </td>
     <td style="text-align:center;">
        {{ session('cat_counter')}}
         @php 
            session(['cat_counter' => session('cat_counter')+1]);
         @endphp
     </td>
     <td>
        <div class="d-flex align-items-center">&nbsp;</div>
     </td>
     <td>
        <div class="d-flex align-items-center"><div class="d-flex align-items-center">{!!$dash!!} <i class="fa fa-arrow-right"></i> &nbsp; {{$subcategory->name}}</div></div>
     </td>

      <td align="center">
         @php
          echo count($subcategory->noOfproducts);
         @endphp
      </td>
     
     <td align="center"><a href=""  data-category="{{ $category->id }}" data-toggle="modal" data-target="#viewCategoryModal{{ $subcategory->id }}" title="view details"><i class="fa fa-eye" aria-hidden="true"></i></a></td>


     <td style="text-align:center;">
        <div class="align-items-center"><i class="fa fa-circle text-success me-1"></i> {{$subcategory->status}}</div>
     </td>
     <td style="text-align:center;"> 

        @can('category-edit')

           <a href="{{route('admin_category_edit',[$subcategory->id])}}"  class="btn btn-primary shadow btn-xs sharp me-1 editModal"><i class="fas fa-pencil-alt"></i></a>

        @endcan


        @can('category-delete')

           <a href=""  data-category="{{ $subcategory->id }}" data-toggle="modal" data-target="#delete_cat" class="btn btn-danger shadow btn-xs sharp category_delete"><i class="fa fa-trash"></i></a>

        @endcan
       
     </td>
  </tr>

    @include('admin.model.view_category_for_subcategory')

    @if(count($subcategory->subCategory))

        @include('admin.subCategory.subCategory_show',['subcategories' => $subcategory->subCategory,])
    
    @endif

@endforeach
