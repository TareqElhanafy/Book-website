@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header bg-gray" style="background-color: #b9a0c9;">
      <div class="container">
        <h1 class="display-4">Checkout</h1>
        <p class="lead-2 mt-6">Seems you're done! Let us know where should we send your order.</p>
      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">

      <section class="section">
        <div class="container">
@foreach(Cart::session(auth()->user()->id)->getContent() as $row)
          <form class="row gap-y">
            <div class="col-lg-8">

              <table class="table table-cart">
                <tbody valign="middle">

                  <tr>
                    <td>
                      <a href="item.html">
                        <img class="rounded" src="{{asset('/storage/'.$row->model->image)}}" alt="...">
                      </a>
                    </td>

                    <td style="width: auto">
                      <h5>{{$row->name}}</h5>
                      <p>{{$row->model->writer_name}}</p>
                    </td>

                    <td>
                      <h4 class="price">{{$row->price}}</h4>
                    </td>
                  </tr>



                </tbody>
              </table>

              <hr class="my-2">


            </div>
</form>

            <div class="col-lg-4">
              <div class="cart-price">


                <div class="flexbox">
                  <div>
                    <p><strong>Total:</strong></p>
                  </div>

                  <div>
                    <p class="fw-600">{{Cart::getTotal()}}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <a class="btn btn-block btn-secondary" href="{{route('cart.index',$row->model->id)}}">Revise Cart</a>
                </div>

                <div class="col-6">
                  <button class="btn btn-block btn-primary" type="submit">Checkout <i class="ti-angle-right fs-9"></i></button>
                </div>
              </div>

            </div>





        </div>
        @endforeach

      </section>

    </main>
@endsection
