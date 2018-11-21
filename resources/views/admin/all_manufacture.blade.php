@extends('admin_layout')

@section('title','Admin | All Manufacture')

@push('css')
@endpush

@section('admin_content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{URL::to('/add_manufacture')}}" class="btn btn-info"><h2>Add NEW Manufacture</h2></a>

                    <p class="alert-success">
                        {{--@include('pages.msg')--}}
                    </p>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h2 class="card-title ">All Manufacture</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                                    {{--for Bootstrap-4
                                    <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                    <thead class="text-primary">
                                    <th>ID</th>
                                    <th>Manufacture-Name</th>
                                    <th>Manufacture-Description</th>
                                    <th>Publication-Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($all_manufacture_info as $key=>$manufacture)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $manufacture->manufacture_name }}</td>
                                            <td width="600px"><h4>{{ $manufacture->manufacture_description }}</h4></td>
                                            <td>
                                                @if($manufacture->publication_status==true)
                                                    <span class="btn btn-success">Active</span>
                                                    <a class="btn btn-danger"   href="{{URL::to('/unactive_manufacture/'.$manufacture->manufacture_id)}}">
                                                        <span >

                                                            <i class="material-icons">thumb_down</i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <span class="btn  btn-danger">UnActive</span>
                                                    <a class="btn btn-success" href="{{URL::to('/active_manufacture/'.$manufacture->manufacture_id)}}">
                                                        <span >
                                                            <i class="material-icons">thumb_up</i>
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>
                                            <h2>
                                            <td ><a href="{{URL::to('/edit_manufacture/'.$manufacture->manufacture_id)}}" class="btn btn-info "><i class="material-icons">mode_edit</i></a>
                                                    <form method="GET" id="delete_form-{{$manufacture->manufacture_id}}" action="{{URL::to('/delete_manufacture/'.$manufacture->manufacture_id)}}" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger " onclick="if (confirm('Are you Sure? you want delete this? ')){
                                                            event.preventDefault();
                                                            document.getElementById('delete_form-{{$manufacture->manufacture_id}}').submit();
                                                            }else{
                                                            event.preventDefault();
                                                            }"><i class="material-icons">delete</i></button>
                                            </td></h2>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush