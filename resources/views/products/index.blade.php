@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">{{ __('Product List') }}</div>

   <div class="card-body">



      <!-- Button trigger modal -->
      @can('product_create')
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId">
         Add New Product
      </button>

      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Add New Peoduct</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">


                  <form action="{{route('product.store')}}">

                     @csrf()

                     <div class="form-group">
                        <label for="">Name: </label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <label for="">Description: </label>
                        <input type="text" class="form-control" name="description" placeholder="Description">
                     </div>
                     <div class="form-group">
                        <label for="">Price: </label>
                        <input type="text" class="form-control" name="price" placeholder="Price">
                     </div>

                     <button type="submit" class="btn btn-primary">Save</button>


                  </form>

               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      @endcan


      <br /><br />



      <table class="table table-borderless table-hover">
         <tr class="bg-info text-light">
            <th class="text-center">ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>
               &nbsp;
            </th>
         </tr>
         @forelse ($data as $d)
         <tr>
            <td class="text-center">{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->description}}</td>
            <td>$. {{number_format($d->price, 2)}}</td>
            <td>

               @can('product_show')
               <a class="btn btn-sm btn-success" href="{{ route('product.show', ['id' => $d->id]) }}">Show</a>
               @endcan

               <a href="" class="btn btn-sm btn-warning">Edit</a>


            </td>
         </tr>
         @empty
         <tr>
            <td colspan="100%" class="text-center text-muted py-3">No Products Found</td>
         </tr>
         @endforelse
      </table>



   </div>
</div>

@endsection