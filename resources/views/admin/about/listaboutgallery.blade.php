@extends('layouts.admin_master')
@section('admin_main_content')

<section id="list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All gallery list</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Sn.</th>
                                <th>Context</th>
                                <th>Images</th>
                                <th>Action</th>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection