@extends('user.master')
@section("title")
<title>Gymitless | GymOwner</title>
@endsection


@section("content")
<div class="wrapper gymowners-page"
style="background-image: linear-gradient(to bottom, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.335)),url({{asset('assets/frontend/img/GymOwners.jpg')}});background-size: cover;">
<div class="landing-header">
    <div class="container">
        <div class="motto">

            <h2 class="title-uppercase">What is Gymitless?</h2>
            <h5>Gymitless is a fitness network that is designed to give non-franchised gyms the same
                amenities as franchised gyms.
            </h5>
            <br />
            <h2 class="title">How does Gymitless benefit your members?</h2>
            <h5>Gymitless gives your members nationwide access to fitness facilities. No longer
                do your members have to be stuck using hotel gyms or paying day passes at
                locations when they are traveling.
            </h5>
            <br>
            <h2 class="title">How does Gymitless benefit my gym?</h2>
            <h5>Gymitless gives your members one more reason to love your gym with increases
                loyalty.
            </h5>
            <h5>Gymitless is zip code exclusive! That is right, we will not let any of your
                competitors in the same zip code join the Gymitless network! Do what your
                competitors can’t, give your members nationwide access to fitness facilities!
            </h5>
            <h5>Monetization! Although many of our partners give Gymitless to their members
                for free, we made Gymitless so cheap that it is easy for you to not only see a
                return on your investment, but to make money off Gymitless!</h5>
            <h5>Price Guarantee! What we charge you for your locations will never go up as long
                as you keep those locations with us!</h5>
            <br>
            <h2 class="title">How does Gymitless work?</h2>
            <h5>Your gym joins the network... Your members get access to fitness facilities...
                Members provide valid ID at paticipating locations... your member gets to work
                out for free!
            </h5>
            <br>
            <a class="btn btn-danger get-directions" href="#">Contact us to get started</a>


            <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn"><i class="fa fa-play"></i>Watch video</a>
            <a class="btn">Download</a> -->
        </div>
    </div>
</div>
<div class="main">

</div>
</div>

@endsection