
@extends('layouts.app')

    <div class="container mt-5">
        <h1>Welcome to the Dashboard</h1>
        <!-- first example -->
        <!-- <a href="/logout" class="btn btn-primary">logout</a> -->

        <!-- second example -->
        <form action="{{Route("logout")}}" method="get">
            <button type="submit" class="btn btn-primary" name="logout">logout</button>
        </form>
    </div>
