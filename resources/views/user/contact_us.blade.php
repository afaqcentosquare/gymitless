@extends('user.master')
@section("title")
<title>Gymitless | ContactUs</title>
@endsection


@section("content")
<div class="wrapper gymowners-page" style="background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.589), rgba(255, 255, 255, 0.335)),url('{{asset('assets/frontend/img/Contact.jpg')}}');background-size: cover;">
    <div class="landing-header">
        <div class="container">
            <div class="motto">
                <h2 class="title">Need more information?</h2>
                <h5>Submit the below form and one of our awesome team members will reach
                    out to you as soon as possible!
                </h5>
                <br />
                <h3 class="title">Contact us now!</h3>
                <br>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form class="contact-form contact-page">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name:</label>
                                <input class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <label>Business Name:</label>
                                <input class="form-control" placeholder="Business Name">
                            </div>
                            <div class="col-md-6">
                                <label>Contact Number:</label>
                                <input class="form-control" placeholder="+123456789">
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input class="form-control" placeholder="abc@abc.com">
                            </div>
                            <div class="col-md-6">
                                <label>Zip Code</label>
                                <input class="form-control" placeholder="0070">
                            </div>
                            <div class="col-md-6">
                                <label>Subject</label>
                                <input class="form-control" placeholder="XYZ">
                            </div>
                        </div>
                        <label>Comments</label>
                        <textarea class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <button class="btn btn-danger btn-block btn-lg btn-fill">Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="main">

    </div>
</div>
@endsection