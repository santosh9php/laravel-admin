<div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">

                   <div class="row">
                       <div class="col-lg-4">
                           @can('newsletter-delete')
                               <form id="bulk_delete_form" method="GET" action="{{ route('admin_news_subs_show') }}">
                                  <label class="form-label">Bulk Delete </label>
                                  <div>
                                      <select class=" form-control wide" id="bulk_delete" name="status" >
                                          <option value="">Choose Action</option>
                                          <option value="bulk_delete" >Bulk Delete</option>
                                      </select>
                                      <input type="hidden" name="news_subs_bulk_delete_ids" id="news_subs_bulk_delete_ids" value="">
                                  </div>
                               </form>
                           @endcan
                       </div>
                       <div class="col-lg-4">
                           <form method="GET" action="{{ route('admin_news_subs_show') }}">
                              <label class="form-label"> Search By Email</label>
                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Name" value="{{app('request')->input('search_by_name')}}" name="search_by_name" >
                                <button type="submit" class="btn btn-primary">Search</button>
                             </div>
                          </form>
                       </div>
                   </div>
                  


                  


               </div>
               <div class="card-body">
                  <div class="table-responsive" style="border:1px solid #eee">
                     <table class="table table-responsive-md table-bordered table-striped ">
                        <thead>
                           <tr>
                              <th class="check">
                                <input class="form-check-input" type="checkbox" name="news_all_check" id="news_all_check" value="all"  > 
                              </th>
                              <th class="sno"><strong>S No.</strong></th>
                              <th><strong>Email</strong></th>
                              <th style="width:280px;"><strong>Date</strong></th>
                              <th class="edit_delete"><strong>Delete</strong></th>
                                
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                              session(['news_subs_counter' => 1]);
                           @endphp
                            @foreach($news_subss as $news_subs)

                              <tr>
                                 <td>
                                    <div class="form-check">
                                         <input class="form-check-input news_check" type="checkbox" name="news_subs_ids" id="news_subs_ids" value="{{$news_subs->id}}"  >
                                     </div> 
                                 
                                 </td>
                                 <td style="text-align:center;">

                                    {{ session('news_subs_counter')}}
                                    @php 
                                       session(['news_subs_counter' => session('news_subs_counter')+1]);
                                    @endphp
                                 </td>

                                 <td>
                                    <div class="d-flex align-items-center">{{$news_subs->email}}</div>
                                 </td>

                                 <td>
                                    <div class="d-flex align-items-center">{{date('j F, Y h:i:s A',strtotime($news_subs->created_at))}}</div>
                                 </td>
                                 
                                 <td style="text-align:center;">

                                    @can('newsletter-delete') 
                                       
                                       <a href=""  data-news_subs="{{ $news_subs->id }}" data-toggle="modal" data-target="#delete_news_subs" class="btn btn-danger shadow btn-xs sharp news_subs_delete"><i class="fa fa-trash"></i></a>

                                    @endcan
                                   
                                 </td>
                              </tr>

                           @endforeach
                           <tr><td colspan="10">
                                 <div class="d-flex justify-content-center">
                                     {{ $news_subss->links() }}
                                 </div>
                           </td></tr>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
