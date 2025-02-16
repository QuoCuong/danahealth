@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/assets/css/prescription.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="text-dark font-weight-medium">Invoice #2365546</h2>
                <div class="btn-group">
                    <button class="btn btn-sm btn-secondary">
                        <i class="mdi mdi-content-save"></i> Save</button>
                    <button class="btn btn-sm btn-secondary">
                        <i class="mdi mdi-printer"></i> Print</button>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-xl-3 col-lg-4">
                    <p class="text-dark mb-2">From</p>
                    <address>
                        Company Name
                        <br> 47 Holmes Green, Sophiebury, WP9M 3ZZ
                        <br> Email: example@gmail.com
                        <br> Phone: +91 5264 251 325
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <p class="text-dark mb-2">To</p>
                    <address>
                        Company Name
                        <br> 58 Jamie Ways, North Faye, Q5 5ZP
                        <br> Email: example@gmail.com
                        <br> Phone: +91 5264 521 943
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <p class="text-dark mb-2">Details</p>
                    <address>
                        Invoice ID:
                        <span class="text-dark">#2365546</span>
                        <br> March 25, 2018
                        <br> VAT: PL6541215450
                    </address>
                </div>
            </div>
            <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit Cost</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Platinum Support</td>
                        <td>1 year subcription 24/7</td>
                        <td>1</td>
                        <td>$3.999,00</td>
                        <td>$3.999,00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Custom Services</td>
                        <td>Instalation and Customization (cost per hour)</td>
                        <td>10</td>
                        <td>$250,00</td>
                        <td>$250,000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Origin License</td>
                        <td>Extended License</td>
                        <td>1</td>
                        <td>$799,00</td>
                        <td>$799,00</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Hosting</td>
                        <td>1 year subcription</td>
                        <td>1</td>
                        <td>$599,00</td>
                        <td>$599,00</td>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
                    <ul class="list-unstyled mt-4">
                        <li class="mid pb-3 text-dark"> Subtotal
                            <span class="d-inline-block float-right text-default">$7.897,00</span>
                        </li>
                        <li class="mid pb-3 text-dark">Vat(10%)
                            <span class="d-inline-block float-right text-default">$789,70</span>
                        </li>
                        <li class="pb-3 text-dark">Total
                            <span class="d-inline-block float-right">$8.686,70</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-block mt-2 btn-lg btn-primary btn-pill"> Procced to Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
