@extends('admin_layout')

@section('title','Admin|All_Category')

@push('css')

@endpush

@section('admin_content')
    <a href="{{route('add_category')}}"><div class="btn btn-success"><h2>Add Category</h2></div></a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h2 class="card-title ">Category Table</h2>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="table"  class="table table-striped table-bordered" style="width:100%">
                                {{--for Bootstrap-4
                                <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                <thead class="text-primary">
                                <th>ID</th>
                                <th>Category-Name</th>
                                <th>Category_Description</th>
                                <th>Category_Status</th>

                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($all_category_info as $key=>$category)
                                    <tr>
                                        <td >{{ $key + 1 }}</td>
                                        <td ><h4>{{ $category->category_name }}</h4></td>
                                        <td width="570px"><h4>{{ $category->category_description }}</h4></td>
                                        <td >
                                            @if($category->publication_status==1)
                                                <span class="btn btn-success">Active</span>
                                                <a class="btn btn-danger"   href="{{URL::to('/unactive_category/'.$category->category_id)}}">
                                                        <span >
                                                            <i class="material-icons">thumb_down</i>
                                                        </span>
                                                </a>
                                            @else
                                                <span class="btn  btn-danger">UnActive</span>
                                                <a class="btn btn-success" href="{{URL::to('/active_category/'.$category->category_id)}}">
                                                        <span >
                                                            <i class="material-icons">thumb_up</i>
                                                        </span>
                                                </a>
                                            @endif
                                        </td>

                                        <td class="center"><h4><a href="{{URL::to('/edit_category/'.$category->category_id)}}" class="btn btn-info "><i class="material-icons">mode_edit</i></a>
                                            <form method="GET" id="delete_form-{{$category->category_id}}" action="{{URL::to('/delete_category/'.$category->category_id)}}" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger " onclick="if (confirm('Are you Sure? you want delete this? ')){
                                                    event.preventDefault();
                                                    document.getElementById('delete_form-{{$category->category_id}}').submit();
                                                    }else{
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                            </h4> </td>
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
@endsection

@push('scripts')

@endpush

