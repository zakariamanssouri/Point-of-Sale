@extends('layouts.baselayout')


@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/css/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">

@endsection

@section('content')
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
        <div class="col s12">
            <div class="container">
                <!-- invoice list -->
                <section class="invoice-list-wrapper section">
                    <!-- create invoice button-->
                    <!-- Options and filter dropdown button-->
                    <div class="invoice-filter-action mr-3">
                        <a href="#" class="btn waves-effect waves-light invoice-export border-round z-depth-4">
                            <i class="material-icons">picture_as_pdf</i>
                            <span class="hide-on-small-only">Export to PDF</span>
                        </a>
                    </div>
                    <!-- create invoice button-->
                    <div class="invoice-create-btn">
                        <a href="{{route('clients.orders.create')}}"
                           class="btn waves-effect waves-light invoice-create border-round z-depth-4">
                            <i class="material-icons">add</i>
                            <span class="hide-on-small-only">Create Order</span>
                        </a>
                    </div>
                    {{--   <div class="filter-btn">
                           <!-- Dropdown Trigger -->
                           <a class='dropdown-trigger btn waves-effect waves-light purple darken-1 border-round' href='#'
                              data-target='btn-filter'>
                               <span class="hide-on-small-only">Filter Invoice</span>
                               <i class="material-icons">keyboard_arrow_down</i>
                           </a>
                           <!-- Dropdown Structure -->
                           <ul id='btn-filter' class='dropdown-content'>
                               <li><a href="#!">Paid</a></li>
                               <li><a href="#!">Unpaid</a></li>
                               <li><a href="#!">Partial Payment</a></li>
                           </ul>
                       </div>--}}
                    <div class="responsive-table">
                        <table class="table invoice-data-table white border-radius-4 pt-1">
                            <thead>
                            <tr>
                                <!-- data table responsive icons -->
                                <th></th>
                                <!-- data table checkbox -->
                                <th></th>
                                <th>
                                    <span>Order#</span>
                                </th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Customer phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="{{route('clients.orders.show',$order->id)}}">Order-{{$order->id}}</a>
                                    </td>
                                    <td><span class="invoice-amount">${{$order->total_price}}</span></td>
                                    <td>
                                        <small>{{$order->created_at}}</small>
                                    </td>
                                    <td><span class="invoice-customer">{{$order->client->name}}</span></td>
                                    <td>
                                        <small>{{$order->client->phone ?$order->client->phone : '-' }}</small>
                                    </td>
                                    <td>
                                        <span class="chip lighten-5 red red-text">UNPAID</span>
                                    </td>
                                    <td>
                                        <div class="invoice-action">
                                            @if(auth()->user()->hasPermission('delete_orders'))
                                                <a href="{{route('clients.orders.show',$order->id)}}"
                                                   class="invoice-action-view mr-4">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="invoice-action-view mr-4 disabled">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                            @endif
                                            @if(auth()->user()->hasPermission('update_orders'))
                                                <a href="{{route('clients.orders.edit',$order->id)}}" class="invoice-action-edit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            @else
                                                <a href="#" class="invoice-action-edit disabled">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                            @endif

                                                <form action="{{route('clients.orders.destroy',$order->id)}}" method="post"  id="deletee-order-form" class="display-inline">
                                                    @csrf
                                                    {{method_field('delete')}}

                                                    @if(auth()->user()->hasPermission('delete_orders'))
                                                        <a href="javascript:void(0)" onclick="submit_delete_form()"><i class="material-icons">delete</i></a>
                                                    @else
                                                        <a href="javascript:void(0)" class="disabled"><i class="material-icons">delete</i></a>
                                                    @endif
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
@endsection




@section('js')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/app-invoice.js')}}"></script>
@endsection