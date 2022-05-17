<div class="modal fade" id="editClientModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editClientModalLabel">Edit Client ID #{{$client->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{URL::action('Admin\ClientController@update')}}">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$client->id}}">
               <div class=" row align-items-center">
                  <div class="form-group col-sm-9">
                     <label for="fname">Name:</label>
                     <input type="text" class="form-control" id="fname" name="name" value="{{$client->name}}">
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="femail">Email:</label>
                     <input type="email" class="form-control" id="femail" name="email" value="{{$client->email}}">
                  </div>
                  <div class="form-group col-sm-9">
                     <label for="fphone">Phone:</label>
                     <input type="text" class="form-control phone" id="fphone" name="phone" value="{{$client->phone}}">
                  </div>
               </div>
               <button type="submit" class="btn btn-primary mr-2">Submit</button>
               <a href="{{URL::action('Admin\ClientController@index')}}" class="btn iq-bg-danger">Cancel</a>
            </form>
         </div>
      </div>
   </div>
</div>