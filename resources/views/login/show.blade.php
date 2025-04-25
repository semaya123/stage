
<x-master title="Se connecter">

    <div class="container w-75 my-2 bg-light p-5">

        <h3>Authentification</h3>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Email</label>
                <input type="text" name="login" id="login" class="form-control"  value="{{ old('login')}}">
                @error('login')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
   </div>
   
    </x-master>
    
    
      
    
    
    