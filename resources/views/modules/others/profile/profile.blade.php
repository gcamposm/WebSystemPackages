@extends('layouts.app')

@section('content')             
<div class="main app form" id="main"><!-- Main Section-->
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-dark text-white">
                    <img src="{{ asset('template/img/gallery/gallery-1.jpg') }}" style="opacity: 0.35; !important;" class="card-img" alt="">
                    <div class="card-img-overlay">
                        <h1 class="username font-weight-bold font-italic">{{ $user->name }}</h1>
                        <img class="rounded-circle user-avatar" src="{{ $user->imgurl }}" alt="User Avatar">
                    </div>
                </div>
            </div>

            <!-- tab -->
            <div class="col-md-8">
                <div class="card profile-card bottom-profile-card">
                    <nav>
                        <div class="nav nav-tabs profile-nav" id="nav-tab" role="tablist">
                            <a 
                            class="nav-item nav-link active"
                            id="historial-tab"
                            data-toggle="tab"
                            href="#historial" 
                            role="tab" 
                            aria-controls="historial" 
                            aria-selected="true"
                            >
                                Historial de Ventas
                            </a>
                            <a 
                            class="nav-item nav-link"
                            id="historialCambios-tab"
                            data-toggle="tab"
                            href="#historialCambios" 
                            role="tab" 
                            aria-controls="historialCambios" 
                            aria-selected="true"
                            >
                                Historial de Cambios
                            </a>
                            <a 
                            class="nav-item nav-link"
                            id="configuraciones-tab" 
                            data-toggle="tab" 
                            href="#configuraciones" 
                            role="tab" 
                            aria-controls="configuraciones" 
                            aria-selected="false"
                            >
                                Configuraciones
                            </a>
                        </div>
                    </nav>

                    <div class="card-body" style="color: white;">
                        <div class="tab-content" id="nav-tabContent">
                    
                        <div 
                        class="tab-pane fade show active"
                        id="historial"
                        role="tabpanel" 
                        aria-labelledby="historial-tab"
                        >
                            @include('modules.others.profile.buyrecord')
                        </div>

                        <div 
                        class="tab-pane fade"
                        id="historialCambios"
                        role="tabpanel" 
                        aria-labelledby="historialCambios-tab"
                        >
                            @include('modules.others.profile.changeRecord')
                        </div>

                        <div 
                        class="tab-pane fade"
                        id="configuraciones" 
                        role="tabpanel" 
                        aria-labelledby="configuraciones-tab"
                        >
                            <form class="form-horizontal" action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-4 col-form-label control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input 
                                            id="name"
                                            name="name"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ $user->name }}" 
                                            autofocus
                                            required
                                            >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-4 col-form-label control-label">Correo Electrónico</label>

                                    <div class="col-md-6">
                                        <input 
                                            id="email" 
                                            name="email"
                                            type="email" 
                                            class="form-control" 
                                            value="{{ $user->email }}"
                                            autofocus
                                            required
                                            >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="img" class="col-sm-4 col-form-label control-label">Foto de Perfil</label>
                                    <div class="col-md-6">
                                        <div class="custom-file">
                                            <input id="img" 
                                                name="img" 
                                                type="file"
                                                class="custom-file-input"
                                                autofocus
                                                required
                                                lang="es">
                                            <label class="custom-file-label" for="customFileLang">Seleccione un archivo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-success btn-galaxy">Acutalizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                    </div>
                      
                </div>
            </div>
            <!-- end tabs -->

        </div>
    </div>    
</div>
@endsection
