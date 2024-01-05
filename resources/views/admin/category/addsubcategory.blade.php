@extends('layouts.admin_master')
@section('admin_main_content')

<section id="addSubcategory">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Insert a sub category</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf 

                        <label for="">enter sub</label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection