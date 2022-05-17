@extends('layouts/app')

@section('content')

<div class="container note-details">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block card-stretch">
                <div class="card-body custom-notes-space mb-4">
                    <h3 class="">Admin | {{$title}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-info mt-2" data-toggle="modal" data-target="#createClientModal"> New Client</button>
    </div>
    <div class="card card-block card-stretch mt-2">
        <div class="row">
            <div class="col ml-2 mr-2">
                <table class="table table-striped tbl-server-info mt-4 responsive">
                    <thead>
                        <tr class="ligth">
                            <th style="color: black!important">ID</th>
                            <th style="color: black!important">Name</th>
                            <th style="color: black!important">Email</th>
                            <th style="color: black!important">Phone</th>
                            <th style="color: black!important">Actions</th>
                        </tr>
                    </thead>
                    @foreach($clients as $client)
                    <tbody>
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{'(' . substr($client->phone, 0, 2) . ')' . substr($client->phone, 2, 4) . '-' . substr($client->phone, 6)}}</td>
                            <td>@include('admin/clients/partials/actions_client')</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="ml-3" style="margin-right: 2px;padding-top: 15px;float: right;">
                    {{ $clients->appends(request()->all())->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="createClientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClientModalLabel">Create a new Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{URL::action('Admin\ClientController@store')}}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class=" row align-items-center">
                            <div class="form-group col-6">
                                <label for="fname">Name:</label>
                                <input type="text" class="form-control" id="fname" name="name" placeholder="Name of client">
                            </div>
                            <div class="form-group col-6">
                                <label for="femail">Email:</label>
                                <input type="email" class="form-control" id="femail" name="email" placeholder="Email of client">
                            </div>
                            <div class="form-group col-6">
                                <label for="fphone">Phone:</label>
                                <input type="text" class="form-control phone" id="fphone" name="phone" placeholder="Phone of client">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection