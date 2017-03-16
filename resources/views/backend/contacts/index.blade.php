@extends('backend.backend')

@section('content')
<!--PAGE CONTENT -->
<div id="content">
<div class="inner" style="min-height:1200px;">
<div class="row">
    <div class="col-lg-12">
        <h2>Contact List</h2>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <div id="dataTables-users-wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-users" aria-describedby="dataTables-users-info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" style="min-width: 52px;" aria-label="CSS grade: activate to sort column ascending" style="text-align: center;">Read
                                </th>
                                <th class="sorting_desc" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" style="min-width: 52px;" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Title
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" style="width: auto;" aria-label="Browser: activate to sort column ascending">Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" style="width: auto;" aria-label="Platform(s): activate to sort column ascending">Content
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" style="width: 9%;" aria-label="CSS grade: activate to sort column ascending">Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTables-users" rowspan="1" colspan="1" style="width: 8%;" aria-label="CSS grade: activate to sort column ascending" style="text-align: center;">Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($count = count($contacts) > 0)
                            @foreach($contacts as $contact)
                            <tr class="gradeA">
                                <td class="sorting_1" style="text-align: center; vertical-align:middle;" @if($contact->read == 1) title="Unread" @else title="Read" @endif>
                                    <a href="{{route('backend.contacts.view', $contact->id)}}" class="flag-contact">
                                    @if($contact->read == 1)
                                    <!-- <i class="icon-envelope"></i> -->
                                    <i class="icon-flag icon-2x pull-left flag-unread-color"></i>
                                    @else
                                    <!-- i class="icon-envelope-alt"></i> -->
                                    <i class="icon-flag icon-2x pull-left flag-read-color"></i>
                                    @endif
                                    </a>
                                </td>
                                <td class="center"><a href="{{route('backend.contacts.view', $contact->id)}}">{{$contact->title}}</a></td>
                                <td class="center">{{$contact->email}}</td>
                                <td class="center">{{$contact->content}}</td>
                                <td class="center" style="text-align: center;">{{formatDate($contact->created_at,'-')}}</td>
                                <td class="center" style="text-align: center;">
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#IiModal" title="Delete"><i class="icon-trash icon-white"></i></button>
                                </td>

                                <!-- Modal backend.contacts.del -->
                                <div class="modal fade" id="IiModal" role="dialog">
                                    <div class="modal-dialog modal-sm" style="width: 349px;">
                                      <div class="modal-content" style="width: 330px; height: 215px;">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Deleting Confirm...</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>Are you sure to detele this item?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" onclick="location.href='{{route('backend.contacts.del', @$contact->id)}}'"><i class="icon-ok icon-white"></i> Yes</button>
                                          <button type="button" class="btn btn-info" data-dismiss="modal"><i class="icon-remove icon-white"></i>&nbsp;No&nbsp; </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- /Modal -->
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    </div>
                </div>
               
            </div>

        </div>
    </div>
</div>

</div>
</div>
<!--END PAGE CONTENT -->
@endsection