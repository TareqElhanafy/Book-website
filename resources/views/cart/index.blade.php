@extends('layouts.welcome')
@section('content')
<!-- Header -->
<header class="header bg-gray" style="background-color: #b9a0c9;">
  <div class="container">
    <h1 class="display-4">Cart Overview</h1>
    <p class="lead-2 mt-6">Take a look inside your cart. Make sure you have everything you needed.</p>
  </div>
</header><!-- /.header -->


<!-- Main Content -->
<main class="main-content">

  <section class="section">
    <div class="container">

      <form class="row gap-y" action="{{route('cart.store',$pbook->id)}}" method="post">
        @csrf
        <div class="col-lg-8">

          <table class="table table-cart">
            <tbody valign="middle">
              <tr>
                <td>
                  <a class="item-remove" href="{{route('pbookshow',$pbook->id)}}"><i class="ti-close"></i></a>
                </td>

                <td>
                  <a href="item.html">
                    <img class="rounded" src="{{asset('/storage/'.$pbook->image)}}" alt="...">
                  </a>
                </td>

                <td>
                  <h5>{{$pbook->name}}</h5>
                  <p>{{$pbook->writer_name}}</p>
                </td>

                <td>
                  <label>Quantity</label>
                  <input class="form-control form-control-sm" type="text" name="quantity" placeholder="Quantity" value="1">
                </td>

                <td>
                  <h4 class="price">{{$pbook->price}}</h4>
                </td>
              </tr>

            </tbody>
          </table>

        </div>


        <div class="col-lg-4">
          <div class="cart-price">
            <div class="flexbox">
              <div>
                <p><strong>Subtotal:</strong></p>
              </div>

              <div>
                <p>{{$pbook->price}}</p>

              </div>
            </div>

            <hr>

          </div>

          <div class="row">
            <div class="col-6">
              <a class="btn btn-block btn-secondary" href="{{route('paidbooks')}}">Shop more</a>
            </div>

            <div class="col-6">
              <button class="btn btn-block btn-primary" type="submit">Proceed <i class="ti-angle-right fs-9"></i></button>
            </div>
          </div>

        </div>
      </form>



    </div>
  </section>

</main>



@endsection
