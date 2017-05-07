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
                                <div><i class="icon-list pos-icon"> </i> <i class="table-cap">Products List</i>
                                    <button class="btn btn-primary btn-sm pull-right" title="Add category" onclick="location.href='{{route('backend.products.add')}}'"><i class="icon-plus icon-white"></i> Add</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div id="dataTables-Products-wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-Products" aria-describedby="dataTables-Products-info">
                                        <thead>
                                            <tr role="row" class="head-table-row">
                                                <th class="sorting_desc" tabindex="0" aria-controls="dataTables-Products" rowspan="1" colspan="1" style="width: auto;" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-Products" rowspan="1" colspan="1" style="width: auto;" aria-label="Platform(s): activate to sort column ascending">Create Date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-Products" rowspan="1" colspan="1" style="width: auto;" aria-label="Browser: activate to sort column ascending">Orders
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTables-Products" rowspan="1" colspan="1" style="min-width: 9%;" aria-label="CSS grade: activate to sort column ascending" style="text-align: center;">Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count = count($products) > 0)
                                            @foreach($products as $product)
                                                <tr class="gradeA">
                                                    <td class="sorting_1">{{$product->name}}</td>
                                                    <td class="center">{{formatDate($product->created_at,'-')}}</td>
                                                    <td class="center" style="text-align: center;"><span class="label label-warning">{{$product->order}}</span></td>
                                                    <td class="center" style="text-align: center;">
                                                        <button class="btn btn-info btn-sm" title="Edit" onclick="location.href='{{route('backend.products.edit', $product->id)}}'"><i class="icon-edit icon-white" ></i></button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#IiModal" title="Delete"><i class="icon-trash icon-white"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <td colspan="4" style="text-align: center; font-weight: bold;font-style: italic;">No Data</td>
                                            @endif
                                        </tbody>
                                    </table>

                                <!-- Modal backend.contacts.del -->
                                <div class="modal fade" id="IiModal" role="dialog">
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
                                          <button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.products.del', @$product->id)}}'"><i class="icon-ok icon-white"></i> Yes</button>
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
            $('.btn-info').change(function(e) {
                $('input[type=button]').focus();
            });
        </script>
    <!--END PAGE CONTENT -->
@endsection