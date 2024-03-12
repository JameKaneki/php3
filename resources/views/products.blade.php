@extends('wrapper.header');
@section('header');

<div>
  <table>
    <thead>
      <th>nane</th>
      <th>category</th>
      <th>price</th>
      <th>image</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td><a href='product/detail/{{$product->id}}'>{{$product->name}}</a></td> 
          <td>{{$product->category_name}}</td>
          <td><img url='{{$product->image}}' alt='#'></td>
          <td>
            <button><a href='products/remove/{{$product->id}}'>Remove</a></button>
            <button>Add</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>