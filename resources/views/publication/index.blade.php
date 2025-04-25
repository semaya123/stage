<x-master  title="Liste des profils"><h3>publications</h3>
<div class="container  w-75  mx-auto">
  <div class="row">
   @foreach ($publications as $publication)
   <x-publication   :publication="$publication"/>
   
   @endforeach
  </div>
</div>
  

</x-master>
