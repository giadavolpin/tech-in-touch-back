@extends('layouts.admin')

@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success my-5">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="mt-3 px-5">
        <h1 class="my-5 backoffice_title">{{ $professionist->name }} {{ $professionist->surname }}</h1>
        <div class="row border-bottom">
            <div class="col-lg-6 border-end d-flex flex-column gap-3">
                @if ($professionist->profile_image)
                    <div class="py-4">
                        <img width="300" src="{{ asset('storage/' . $professionist->profile_image) }}">
                    </div>
                @else
                    <img class="d-block mb-2" id="uploadPreview" width="300" src="https://via.placeholder.com/300x200">
                @endif
                @if ($professionist->nickname)
                    <h2><span class="fs-4 me-3">Nickname:</span>{{ $professionist->nickname }}
                    </h2>
                @endif
                @if ($professionist->job_address)
                    <h3> Indirizzo : {{ $professionist->job_address }}</h3>
                @endif

                @if ($professionist->phone_number)
                    <h3>
                        Telefono : {{ $professionist->phone_number }}
                    </h3>
                @endif
                @if ($professionist->technologies && count($professionist->technologies) > 0)
                    <div class="d-flex mb-4">
                        <span>I miei linguaggi:</span>
                        <ul class="list-unstyled d-flex gap-2 ms-3">
                            @foreach ($professionist->technologies as $technology)
                                <li>{{ $technology->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-6 ps-5">
                @if ($professionist->cv_path)
                    <div class="mb-5 ">
                        <img width="200" src="{{ asset('storage/' . $professionist->cv_path) }}">
                    </div>
                @else
                    <img class="d-block mb-2" id="uploadPreview" width="200" src="https://via.placeholder.com/300x390">
                @endif
                @if ($professionist->github)
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="fs-3"><i class="fa-brands fa-github"></i></span>
                        <a href="{{ $professionist->github }}" target="_blank">{{ $professionist->github }}</a>
                    </div>
                @endif

                @if ($professionist->linkedin)
                    <div class="d-flex align-items-center gap-3">
                        <span class="fs-3"><i class="fa-brands fa-linkedin"></i></span>
                        <a href="{{ $professionist->linkedin }}" target="_blank">{{ $professionist->linkedin }}</a>
                    </div>
                @endif
            </div>
        </div>

        @if ($professionist->bio)
            <div class="py-5">
                <span class="text-center d-block py-3 backoffice_title">Descrizione</span>
                <p class="fs-4 text-center "><span class="me-3"><i
                            class="fa-solid fa-quote-left backoffice_title"></i></span>{!! $professionist->bio !!}<span
                        class="ms-3"><i class="fa-solid fa-quote-right backoffice_title"></i></span></p>
            </div>
        @endif

        <div class="text-end mt-5">
            <a href="{{ route('admin.professionists.index') }}" class="btn dev_btn">Gestisci
                Profilo</a>
        </div>
    </div>
    <section id="sponsorship_pubblicità">
        <div class="subscription_plans py-5 px-5">
            <h2 class="text-center">Fatti Notare!</h2>
            <p>Con i nostri piani di sponsorizzazione sarai sempre in <span>testa</span></p>
            {{-- <form action="{{ route('admin.braintree') }}" method="POST" id="payment-form">
                @csrf
                SELECT PER I PIANI --}}
            {{-- <select name="plan" id="plan">
                    @foreach ($plans as $plan)
                        <option value="{{ $plan->id }}">{{ $plan->name }} - {{ $plan->price }} €</option>
                    @endforeach
                    <input type="hidden" id="nonce" name="payment_method_nonce">
                </select> --}}
            {{-- DIV PER L UI DI BRAINTREE --}}
            {{-- <div id="dropin-container"></div> --}}
            {{-- <button type="submit" id="submit-button" class="button button--small button--green">Purchase</button> --}}
            {{-- <input type="submit" />
            </form> --}}
            <div class="d-flex justify-content-center mt-5"><a href="{{ route('admin.generatetoken') }}"
                    class="btn">Scopri i Piani</a></div>
        </div>
    </section>

    {{-- <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.js"></script>
    <script>
        // var button = document.querySelector('#submit-button');

        // braintree.dropin.create({
        //     authorization: '{{ $token }}',
        //     container: '#dropin-container',
        //     card: {
        //         cardholderName: true,
        //     }
        // }, function(createErr, instance) {
        //     button.addEventListener('click', function(event) {
        //         // event.preventDefault();
        //         instance.requestPaymentMethod(function(err, payload) {
        //             document.getElementById('nonce').value = payload.nonce;
        //             // console.log('sono partito')
        //         });
        //     });
        // });

        const form = document.getElementById('payment-form');

        braintree.dropin.create({
            authorization: '{{ $token }}',
            container: '#dropin-container',
            card: {
                cardholderName: true,
            }
        }, (error, dropinInstance) => {
            if (error) console.error(error);

            form.addEventListener('submit', event => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);

                    // Step four: when the user is ready to complete their
                    //   transaction, use the dropinInstance to get a payment
                    //   method nonce for the user's selected payment method, then add
                    //   it a the hidden field before submitting the complete form to
                    //   a server-side integration
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script> --}}
@endsection
