<x-master  title="P'age d'accueil">
    <h3>Request/response</h3>
    @csrf
    <form method="post"  action="{{route('form')}}">
        
        <input type="text" name="input_field"  class="form-contro">
        <input type="submit"  name="Envoyer"  class="btn btn-sm btn-primary">
    </form>
</x-master>