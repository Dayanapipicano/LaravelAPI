@extends('layouts.plantilla')

@section('title','Conocenos')

@section('head')
    
    <link rel="shortcut icon" href="IMG/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/conocenos.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Libre+Baskerville&family=Quicksand:wght@300&display=swap" rel="stylesheet">
@endsection()

@section('content')
    <header>
        <div class="Principal"> 
            <h1 class="titulo1">Quienes somos</h1>
        </div>
        <div class="ola" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill:#fff"></path></svg></div>
        
    </header>
    <section class="nosotros">
        <div class="texto">
            <h2 class="titulo"> Mis<span>ion</span></h2>
            <p class="parrafo">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, 
                dolorum maxime recusandae distinctio voluptatum quam id placeat veniam obcaecati 
                et accusantium delectus corporis repellendus assumenda porro 
                blanditiis nobis natus doloribus.</p>
            <p class="parrafo">Lorem ipsum dolor sit 
                amet consectetur, adipisicing elit. Ipsam, 
                dolorum maxime recusandae distinctio voluptatum quam id 
                placeat veniam obcaecati et accusantium delectus corporis
                 repellendus assumenda porro blanditiis nobis natus doloribus.</p>
        </div>

        <figure class="imagen">
            <img src="IMG/perfume6.jpg" class="imagenes">
        </figure>

        <figure class="imagen2">
            <img src="IMG/perfume7.jpg" class="imagenes">
        </figure>

        <div class="texto">
            <h2 class="titulo"> Vis<span>ion</span></h2>
            <p class="parrafo">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam, 
                dolorum maxime recusandae distinctio voluptatum quam id placeat veniam obcaecati 
                et accusantium delectus corporis repellendus assumenda porro 
                blanditiis nobis natus doloribus.</p>
            <p class="parrafo">Lorem ipsum dolor sit 
                amet consectetur, adipisicing elit. Ipsam, 
                dolorum maxime recusandae distinctio voluptatum quam id 
                placeat veniam obcaecati et accusantium delectus corporis
                repellendus assumenda porro blanditiis nobis natus doloribus.</p>
        </div>
    </section>



    <link rel="stylesheet" href="{{ asset('css/inte.css') }}">


        <div class="container__cards">
    
            <div class="cards">
                <div class="covers">
                    <img src="IMG/p1.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>Dayana Pipicano</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>
    
            <div class="cards">
                <div class="covers">
                    <img src="IMG/p2.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>Robinson Puliche</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>
    
            <div class="cards">
                <div class="covers">
                    <img src="IMG/p3.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>Valentina Narvaez</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>
            <div class="cards">
                <div class="covers">
                    <img src="IMG/p3.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>Diana Rebolledo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>
    
        </div>
        
 
@endsection()

</html>