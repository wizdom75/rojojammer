@extends('layouts.app')
@section('title', 'Contact us')
@section('content')
<div class="container-fluid col-md-9 col-lg-8 col-xl-8">
    <!-- Breadcrumbs -->
    @include('inc.breadcrumb')
    <h1 class="text-muted">Contact us</h1>
    <div class="row">
   
            <div class="col-xl-8 offset-xl-2 py-5">
              <form method="POST" action="/contact" accept-charset="UTF-8">
                @csrf

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_name">Name <strong class="text-danger">*</strong></label>
                                    <input id="form_name" type="text" name="name" class="form-control rounded-0" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_email">Email <strong class="text-danger">*</strong></label>
                                    <input id="form_email" type="email" name="email" class="form-control rounded-0" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_need">Please specify your need <strong class="text-danger">*</strong></label>
                                    <select id="form_need" name="title" class="form-control rounded-0" required="required" data-error="Please specify your need.">
                                        <option value=""></option>
                                        <option value="Request quotation">Request quotation</option>
                                        <option value="Request order status">Request order status</option>
                                        <option value="Request copy of an invoice">Request copy of an invoice</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Message <strong class="text-danger">*</strong></label>
                                    <textarea id="form_message" name="body" class="form-control rounded-0" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-outline-primary btn-send rounded-0" value="Send message">
                                <input type="hidden" name="is_read" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong class="text-danger">*</strong> These fields are required.</p>
                            </div>
                        </div>
                    </div>

                    </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->
</div>
@endsection