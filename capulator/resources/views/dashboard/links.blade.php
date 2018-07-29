@extends('layouts.dashboard')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Links</li>
    </ol>

    <div class="card">
        <div class="card-header">
            Here's some helpful links for your academic information!
        </div>
        <div style="line-height:50px"class="card-body">
            <h4>
                <a href="http://www.nus.edu.sg/">NUS homepage</a> - Why not right?
            </h4>
            <p>
                    <a href="https://www.comp.nus.edu.sg/">NUS Computing</a> 
                    <br>
                    <a href="https://law.nus.edu.sg/">NUS Law</a>
                    <br>
                    <a href="https://nusmedicine.nus.edu.sg/admissions">NUS Medicine</a>
                    <br>
                    <a href="http://www.dentistry.nus.edu.sg/">NUS Dentistry</a>
                    <br>
                    <a href="http://www.science.nus.edu.sg/">NUS Science</a>
                    <br>
                    <a href="https://www.fas.nus.edu.sg/">NUS FASS</a>
                    <br>
                    <a href="https://bschool.nus.edu.sg/">NUS Business</a>
                    <br>
                    <a href="https://www.eng.nus.edu.sg/">NUS Engineering</a>
                    <br>
                    <a href="http://www.sde.nus.edu.sg/">NUS School of Design and Environment</a>
                    <br>
                    <a href="https://www.ystmusic.nus.edu.sg/">NUS YST</a>
                    <br>

                    
                    
            </p>
        </div>
        <div class="card-footer">
        </div>
    </div>
@endsection