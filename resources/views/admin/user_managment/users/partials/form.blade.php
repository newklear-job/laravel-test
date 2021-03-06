@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>
    </div>
@endif
<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя"
       value="@if (old('name')) {{old('name')}} @else{{$user->name ?? ""}}@endif" required>

<label for="">Email</label>
<input type="text" class="form-control" name="email" placeholder="Email"
       value="@if (old('email')) {{old('email')}} @else{{$user->email ?? ""}}@endif" required>

<label for="">Пароль</label>
<input type="password" class="form-control" name="password" placeholder="Пароль">

<label for="">Подтверждение пароля</label>
<input type="password" class="form-control" name="password_confirmation" placeholder="Подтверждение Пароля">

<label for="">Роль пользователя</label>
<select class="form-control " name="roles[]" multiple>
    @foreach($roles as $role)
        <option value="{{$role}}"
                @isset ($user->id)
                @foreach ($user->roles->pluck("name") as $user_role)
                @if ($user_role == $role)
                selected
                @endif
                @endforeach
                @if ($user->id === \Auth::user()->id)
                disabled
            @endif
        @endisset
            >
            {{$role}}
        </option>
    @endforeach
</select>
<hr/>

<input class="btn btn-primary" type="submit" value="Сохранить">
