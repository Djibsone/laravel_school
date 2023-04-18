@extends('base')
@section('main')
<?php global $i; ?>
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1 class="display-3">Contacts</h1>
            <div>
                <a style="margin: 19px; margin-left: 90%" href="{{ route('contacts.create')}}" class="btn btn-success"><i class="fa fa-plus" title="New Contact"></i> New contact</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>SL No</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Job Title</td>
                        <td>City</td>
                        <td>Country</td>
                        <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $i+=1 }}</td>
                            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->job_title}}</td>
                            <td>{{$contact->city}}</td>
                            <td>{{$contact->country}}</td>
                            <td>
                                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary"><i class="fa fa-edit" title="Edit"></i> Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash" title="Delete"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
    </div>
@endsection
