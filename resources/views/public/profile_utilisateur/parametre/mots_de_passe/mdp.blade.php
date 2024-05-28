@extends('client')

@section('titre', 'Parametre de mon compte')

@section('contenu')
<main id="main" style=" background-color:rgba(6, 101, 183, 0.9)">
    <div class="container" style="padding-top: 140px">
        <div class="card" style="padding: 20px; margin-bottom:20px;">
                <div class="card-body">
                    <section>
                        <h3>Modification de mon mots de passe</h3>
                        <p>
                            Avant de modifier votre mots de passe, ..... blabla
                        </p>
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="current_password" :value="__('Mots de passe actuelle')" />
                                <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" style="color: red" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('Nouveau mots de passe')" />
                                <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" style="color: red" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('confirmer le mots de passe')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" style="color: red" />
                            </div>

                            <div class="flex items-center gap-4">
                                <input type="submit" value="Sauvgarder" class="btn btn-primary" style="margin-top: 20px; width:100%">

                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                    <!-- Session succes ou erreur -->
                @if (session('succes'))
                    <p style="color: green">
                        {{session('succes')}}
                    </p>
                @endif
                @if (session('erreur'))
                    <p style="color: rgb(255, 0, 0)">
                        {{session('erreur')}}
                    </p>
                @endif
                </div>
        </div>
    </div>
@endsection
