@csrf
<div class="form-group">
    <input type="text" value="{{ $client->name == '' ? '' : $client->name }}"  class="form-control @error("name") is-invalid @enderror" name="name" placeholder="entrez votre pseudo">
    @error('name')
        <div class="invalid-feedback">
            {{ $errors->first("name") }}
        </div>
    @enderror
</div>
<div class="form-group">
    <input type="text" value="{{ $client->email == '' ? '' : $client->email }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="entrer votre email">
    @error('email')
        <div class="invalid-feedback">
            {{ $errors->first("email") }}
        </div>
    @enderror
</div>
<div class="form-group">
    <select class="custom-select @error('status') is-invalid @enderror " name="status">
        <option value="1">Actif</option>
        <option value="0">Inactif</option>
    </select>
    @error('status')
        <div class="invalid-feedback">
            {{$errors->first("status")}}
        </div>
    @enderror
</div>
<div class="form-group">
    <select class="custom-select @error('entreprise') is-invalid @enderror " name="entreprise_id">
        @if ( !isset($client->entreprise->name))
            @foreach ($entreprises as $entreprise)
                <option value="{{$entreprise->id}}">{{$entreprise->name}}</option>
            @endforeach
        @else
            @foreach ($entreprises as $entreprise)
                <option value="{{$entreprise->id}}" {{$entreprise->id == $client->entreprise->id ? 'selected' : '' }}>{{$entreprise->name}}</option>
            @endforeach
        @endif
    </select>
    @error('entreprise')
        <div class="invalid-feedback">
            {{$errors->first("entreprise_id")}}
        </div>
    @enderror
</div>