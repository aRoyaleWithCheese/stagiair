@extends('layouts/log')

@section('title')
Login
@endsection

@section('content')

<form action="" method="post">
    {{csrf_field()}}

    <div class="form-total">
        <h2>Registreer als bedrijf</h2>
        <form>
            <div class="form-group">
                <label for="name">Bedrijfsnaam</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Geef jouw bedrijfsnaam in...">
            </div>

            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Geef jouw mail in...">
            </div>

            <div class="form-group">
                <label for="name">Sector</label>
                <input type="text" name="sector" class="form-control" id="name" placeholder="Geef jouw sector in...">
            </div>

            <div class="form-group">
                <label for="name">Plaats</label>
                <input type="text" name="city" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Geef de plaats van jouw bedrijf in...">
            </div>

            <!--<div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>-->

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Geef jouw wachtwoord in...">
            </div>

            <button type="submit" class="btn btn-primary">Registreer</button>
    </div>
</form>

@endsection