@extends('layouts.plantilla')

    @section('title','Contacto - Perfumería')
    
    @section('head')
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    
@endsection()

@section('content')


<div class="html">

    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


    

    <div class="body">
        


            <div class="formu">
                <div class="contact-info">
                    <h3 class="title">Let's get in touch</h3>
                    <p class="text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                        dolorum adipisci recusandae praesentium dicta!
                    </p>

                    <div class="info">
                        <div class="information">
                            <img src="img/localizacion.png" class="icon" alt="" />
                            <p>92 Cherry Drive Uniondale, NY 11553</p>
                        </div>
                        <div class="information">
                            <img src="img/correo.png" class="icon" alt="" />
                            <p>lorem@ipsum.com</p>
                        </div>
                        <div class="information">
                            <img src="img/telefono.png" class="icon" alt="" />
                            <p>123-456-789</p>
                        </div>
                    </div>

                    <div class="social-media">
                        <p>Connect with us :</p>
                        <div class="social-icons">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <span class="circle one"></span>
                    <span class="circle two"></span>

                    <form action="index.html" autocomplete="off">
                        <h3 class="title">Contact us</h3>
                        <div class="input-container">
                            <input type="text" name="name" class="input" placeholder="Usuario" />

                            <span>Username</span>
                        </div>
                        <div class="input-container">
                            <input type="email" name="email" class="input" placeholder="Email" />

                            <span>Email</span>
                        </div>
                        <div class="input-container">
                            <input type="tel" name="phone" class="input" placeholder="Telefono" />

                            <span>Phone</span>
                        </div>
                        <div class="input-container textarea">
                            <textarea name="message" class="input" placeholder="Mensage"></textarea>

                            <span>Message</span>
                        </div>
                        <input type="submit" value="Send" class="btn" />
                    </form>
                </div>
            </div>
       

        <script src="{{ asset('css/contact.js') }}"></script>
    </div>

</div>

@endsection()