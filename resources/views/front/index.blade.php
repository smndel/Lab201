@extends('layouts.master')

@section('content')

<h1>services</h1>
{{$services->links()}}
<ul class="list-group">
    @forelse($services as $service)
    <li class="list-group-item">
        <h2>{{$service->title}}</h2>
        <div class="row">
            
            <div class="img-thumbnail col-md-4" style="margin-left: 10px">
            
                <a>
                <div class="text-center">
                @if(count($service->picture)>0)
                <img class="" src="{{url('images', $service->picture->link)}}" style="width: 200px">
                @endif
                </a>
                </div>
            </div>
            
            <div class="col-md-7">
            <p>{{$service->description}}</p>
            <p>type : {{$service->type}}</p>
            <p>Catégorie : {{$service->category}}</p>
            </div>
        </div>
    </li>
@empty
@endforelse
</ul>

@endsection