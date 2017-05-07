@extends('backend.backend')

@section('content')
    <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">{{@$title}}</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                    @if($message = Session::get('danger'))
                            <div id="error" class="message">
                                <a id="close" title="Message"  href="#" onClick="document.getElementById('error').setAttribute('style','display: none;');">&times;</a>
                                <span>{{$message}}</span>
                            </div>
                        @elseif($message = Session::get('success'))
                            <div id="success" class="message">
                                <a id="close" title="Message"  href="javascript::void(0);" onClick="document.getElementById('success').setAttribute('style','display: none;');">&times;</a>
                                <span>{{$message}}</span>
                            </div>
                        @endif
                        <div class="panel panel-default">
                            <div class="panel-heading panel-header">
                                <div><i class="icon-list pos-icon"> </i> <i class="table-cap">Categories List</i>
                                    <button class="btn btn-primary btn-sm pull-right" title="Add category" onclick="location.href='{{route('backend.categories.add')}}'"><i class="icon-plus icon-white"></i> Add</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div id="dataTables-categories-wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-categories" aria-describedby="dataTables-categories-info">
                                        <thead>
                                            <tr class="head-table-row" role="row">
                                                <th class="sorting_desc" tabindex="0" aria-controls="dataTables-categories" rowspan="1" colspan="1" style="width: auto;" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-categories" rowspan="1" colspan="1" style="width: 150px;" aria-label="Platform(s): activate to sort column ascending">Create Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-categories" rowspan="1" colspan="1" style="width: 150px;" aria-label="Platform(s): activate to sort column ascending">Update Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-categories" rowspan="1" colspan="1" style="width: 90px;" aria-label="Browser: activate to sort column ascending">Orders
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-categories" rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending" style="text-align: center;">Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count = count($categories) > 0)
                                            @foreach($categories as $category)
                                                <tr class="gradeA">
                                                    <td class="sorting_1">{{$category->name}}</td>
                                                    <td class="center">{{formatDate($category->created_at,'-')}}</td>
                                                    <td class="center">{{formatDate($category->updated_at,'-')}}</td>
                                                    <td class="center" style="text-align: center;"><span class="label label-warning">{{$category->order}}</span></td>
                                                    <!-- <td class="center" style="text-align: center;"><input type="text" name="order" value="{{$category->order}}" style="text-align: center;width: 80px;"></td> -->
                                                    <td class="center" style="text-align: center;">
                                                        <button class="btn btn-info btn-sm" title="Edit" onclick="location.href='{{route('backend.categories.edit', @$category->id)}}'"><i class="icon-edit icon-white" ></i></button>
                                                        <button class="btn btn-danger btn-sm" id="btn_del" data-id="{{$category->id}}" data-toggle="modal" data-target="#CatModal" title="Delete"><i class="icon-trash icon-white"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <!-- Modal backend.contacts.del -->
                                        <div class="modal fade" id="CatModal" role="dialog">
                                            <div class="modal-dialog modal-sm" style="width: 349px;">
                                              <div class="modal-content" style="width: 330px; height: 215px;">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Deleting Confirm</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Are you sure to detele this item?</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" id="yes_del"><i class="icon-ok icon-white"></i> Yes</button>
                                                  <button type="button" class="btn btn-info" data-dismiss="modal"><i class="icon-remove icon-white"></i>&nbsp;No&nbsp;</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    <!-- /Modal -->

                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script type="text/javascript">
            $(document).on("click", "#btn_del", function () {
             var Id = $(this).data('id');
             $('#yes_del').click(function(){
                window.location.href = "{{url('/')}}/admin/categories/del/"+Id;
             });
        });
        </script>
    <!--END PAGE CONTENT -->
@endsection