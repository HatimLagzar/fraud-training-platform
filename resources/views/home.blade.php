@extends('layouts.noauth-template')
@section('title')
    Home
@endsection
@section('content')
    <header id="header">
        <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">{{ env('APP_NAME', 'Fraud Training') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="hero">
            <h1>
                Protect the money on<br>
                your credit card FROM FRAUD NOW
            </h1>

            <p>Protect yourself and your money from scammers on the internet by using our training to level up your knowledge of internet security and get our daily notifications about trending scams types and ways to protect against them.</p>

            <a href="#" class="btn btn-primary">Train Now</a>
        </div>
    </header>

    <section id="you-are-next">
        <h2 class="section-title">You’re next in the list</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col">
                    <img src="{{ asset('images/target.png') }}" alt="" width="256" height="256">
                </div>
                <div class="col-lg-7 col-12 section-content">
                    <p>Internet scams that target victims through online services account for millions of dollars worth of fraudulent activity every year. And the figures continue to increase as internet usage expands and cyber-criminal techniques become more sophisticated. Here are some facts:</p>
                    <ul>
                        <li>According to the Aite-Novarica Group, 47 percent of Americans experienced financial identity theft in 2020.</li>
                        <li>Credit card fraud is among the top 5 types of identity theft in 2021.</li>
                        <li>California counts as the number 1 with more than $1,228 Million losses.</li>
                        <li>In 2021, $323 million was reported lost in scams.</li>
                    </ul>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </section>

    <section id="knowledge-first">
        <h2 class="section-title">Knowledge before anything</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col">
                    <img src="{{ asset('images/shield.png') }}" alt="" width="256" height="256">
                </div>
                <div class="col-lg-7 col-12 section-content">
                    <p>Protect yourself and your money from scammers on the internet by using our training to level up your knowledge of internet security and get our daily notifications about trending scams types and ways to protect against them.</p>

                    <p class="mb-0">Our training includes the following:</p>
                    <ul>
                        <li>Quick training compress to take you less than 5 minutes.</li>
                        <li>Daily notifications about trending scams and types of frauds.</li>
                        <li>Get certified by our company.</li>
                    </ul>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>

    <section id="contact">
        <h2 class="section-title">Get in touch</h2>
        <div class="container">
            <form action="#" method="POST">
                <div class="input-group mb-2">
                    <input type="text" placeholder="Name" class="form-control">
                </div>
                <div class="input-group mb-2">
                    <input type="text" placeholder="Subject" class="form-control">
                </div>
                <div class="input-group mb-2">
                    <input type="email" placeholder="Email Address" class="form-control">
                </div>
                <div class="input-group mb-2">
                    <textarea placeholder="Message" class="form-control"></textarea>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>All rights reserved &copy; {{ date('Y') }}</p>
        </div>
    </footer>
@endsection