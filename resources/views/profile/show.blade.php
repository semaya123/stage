<x-master title="Mon profile"><h3>Profile</h3>
  <div class="container-fluid">
    <div class="row">
     <div class="card  my-4">
      <img class="card-img-top w-25  mx-auto"   src="{{ asset('storage/'.$profile->image)}}" alt="Title" />
      <div class="card-body">
        <h4 class="card-title  text-center"> #{{$profile->id}}   {{$profile->name}} </h4>
        <p class="card-text  text-center">{{$profile->created_at->format('d-m-Y')}}</p>
        <p class="card-text  text-center"> Email:<a href="mailto {{$profile->email}}" >{{$profile->email}}</a></p>
        <p class="card-text">{{$profile->bio}}</p>
      </div>
     </div>
     
  
    </div>
    <div class="row">
        <h3>Publications</h3>
        <div class="row">
          @foreach ($profile->publications as $publication)
          <x-publication  :publication="$publication"/>
          
          @endforeach
         </div>

    </div>
  </div>
  

</x-master>
