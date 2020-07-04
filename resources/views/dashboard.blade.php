<style>
  @media (min-width: 730px) {


          }
         @media (max-width: 730px) {
            .imgd{


            }

          }
a{
    text-decoration: none!important;
    color: black!important
}
</style>
@extends('layouts.admin')
@section('render')
@if ($user_state == 1)
<div class="container pt-lg-5 ">
    @include('common.alert')
    <div class="jumbotron bg-info mx-0">

<div class="row py-2">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="/inventory/dashboard">
            <div>
                <img src="{{asset('icons/product_in_stock.png')}}" alt="" class=" imgd">
            </div>
            <div class="pt-2">
                    prouct in stock
             </div>
            </div>
        </a>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="/stock-status">
            <div>
                <img src="{{asset('icons/out.png')}}" alt="" class=" imgd">
            </div>
            <div class="pt-2">
                    prouct out of stock
             </div></a>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="/sales">
            <div>
                <img src="{{asset('icons/pay.png')}}" alt="" class=" imgd">
            </div>
            <div class="pt-2">
                    prouct Sales
             </div></a>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="/orders">
        <div>
            <img src="{{asset('icons/incoming_order.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
              Incoming Order
         </div></a>
    </div>
</div>

<div class="row py-2">
    <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="/products">
                <div>
                    <img src="{{asset('icons/product.png')}}" alt="" class=" imgd">
                </div>
                <div class="pt-2">
                     View product in stores
                 </div>
            </a>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="/customers">
            <div>
                <img src="{{asset('icons/incoming_order.png')}}" alt="" class=" imgd">
            </div>
            <div class="pt-2">
                    Out going orders
                    <br>
                    (Exporter)
             </div></a>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div>
            <img src="{{asset('icons/bill.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
               View Issued Reciept
         </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div>
            <img src="{{asset('icons/cancel.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
          View Returned Produts
         </div>
    </div>
</div>

<div class="row py-2">
    <div class="col-lg-3 col-md-4 col-sm-6">
    <div>
        <img src="{{asset('icons/mail.png')}}" alt="" class=" imgd">
    </div>
    <div class="pt-2">
        SMS Customers and
        <br>
        Suppliers
     </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div>
            <img src="{{asset('icons/dashboard.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
              Product and Sales
              <br>
              Distribution
         </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <a href="/backup-index">  <div>
        <img src="{{asset('icons/memory.png')}}" alt="" class=" imgd">
    </div>
    <div class="pt-2">
       Create Backup
     </div></a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="/transaction-history">
            <div>
                <img src="{{asset('icons/transaction.png')}}" alt="" class=" imgd">
            </div>
            <div class="pt-2">
           View transaction
           <br> History
             </div>
        </a>

    </div>
</div>

<div class="row py-2">
    <div class="col-lg-3 col-md-4 col-sm-6">
         <a href="/admin/user-accounts-index">
            <div>
                <img src="{{asset('icons/user.png')}}" alt="" class=" imgd">
            </div>
            <div class="pt-2">
           Create new
                <br>
                System User
             </div>
         </a>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div>
            <img src="{{asset('icons/balance.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
             Cutomer Balance
         </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div>
            <img src="{{asset('icons/wharehouse.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
         Warehouse Management
         </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div>
            <img src="{{asset('icons/info.png')}}" alt="" class=" imgd">
        </div>
        <div class="pt-2">
      System Information
         </div>
    </div>
</div>
</div>
</div>
@else
@include('customer.dashboard')
@endif


@endsection
