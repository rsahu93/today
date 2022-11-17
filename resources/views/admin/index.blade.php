@extends('admin.admin_master')
@section('admin')

    <div class="content_wrapper">
        <!--middle content wrapper-->

        @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{ session::get('error') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h4>Login Admin Name : {{ Auth::guard('admin')->user()->name }} </h4>
        <h4>Login Admin Email : {{ Auth::guard('admin')->user()->email }} </h4>

        <div class="middle_content_wrapper">
            <!-- counter_area -->
            <section class="counter_area">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter">
                            <div class="counter_item">
                                <span><i class="fa fa-code"></i></span>
                                <h2 class="timer count-number" data-to="300" data-speed="1500"></h2>
                            </div>

                            <p class="count-text ">SomeText GoesHere</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter">
                            <div class="counter_item">
                                <span><i class="fa fa-coffee"></i></span>
                                <h2 class="timer count-number" data-to="1700" data-speed="1500"></h2>
                            </div>
                            <p class="count-text ">SomeText GoesHere</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter">
                            <div class="counter_item">
                                <span><i class="fas fa-user"></i></span>
                                <h2 class="timer count-number" data-to="11900" data-speed="1500"></h2>
                            </div>
                            <p class="count-text ">SomeText GoesHere</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter">
                            <div class="counter_item">
                                <span><i class="fa fa-bug"></i></span>
                                <h2 class="timer count-number" data-to="157" data-speed="1500"></h2>
                            </div>
                            <p class="count-text ">SomeText GoesHere</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ counter_area -->
            <!-- table area -->

        </div>
        <!--/middle content wrapper-->
    </div>
    <!--/ content wrapper -->

@endsection
