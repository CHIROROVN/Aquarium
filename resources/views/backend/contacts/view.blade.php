@extends('backend.backend')
@section('content')
    <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner" style="min-height:1200px;">
                

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Contact View</h2>
                    </div>
                </div>
                <hr />
                <div class="col-lg-12"> 
                    <div class="body">
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Contact Detail</strong></div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="15%"></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <td>{{$contact->title}}</td>
                                            </tr>
                                            <tr>
                                                <th>Full Name</th>
                                                <td>{{$contact->full_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{$contact->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Content</th>
                                                <td><?php echo nl2br($contact->content);?></td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{$contact->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>IP Address</th>
                                                <td>{{$contact->last_ip}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-9" style="text-align: center;">
                            <a href="{{route('backend.contacts.index')}}" class="btn btn-default" id="cp4" data-color-format="hex" data-color="rgb(255, 255, 255)">Contact List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--END PAGE CONTENT -->
@endsection