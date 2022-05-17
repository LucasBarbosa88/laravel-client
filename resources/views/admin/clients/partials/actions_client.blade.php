<a href="#deleteClientModal{{$client->id}}" data-toggle="modal" class="btn btn-warning">Delete</a>
<a class="btn btn-info" id="editButton" data-toggle="modal" href="#editClientModal{{$client->id}}">Edit</a>
@extends('admin/clients/partials/edit')
@extends('admin/clients/partials/delete_client')