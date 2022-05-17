<div class="modal fade" id="deleteClientModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteClientModalLabel">Delete Client ID #{{$client->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-boody alert-danger">
                <h4>Are you sure to delete client <b>{{$client->name}}</b>?</h4>
            </div>
            <div class="modal-footer alert-danger">
                <a class="btn btn-warning" href="{{URL::action('Admin\ClientController@destroy', $client->id )}}">Delete</a>
            </div>
        </div>
    </div>
</div>