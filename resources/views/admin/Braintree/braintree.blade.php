@extends('layouts.admin')

@section('content')
    @if ($professionist)
        <div class="subscription_plans py-5 container">
            <h3 class="text-center">Sponsorizzazioni</h3>
            <h4 class="py-5 text-center">Ecco i piani disponibili</h4>
            <div class="row gap-4 justify-content-center">
                <div class="col-lg-3">
                    <div class="my_card">
                        <h4>Standard</h4>
                        <p>Compari in Homepage nella sezione dedicata ai nostri professionisti sponsorizzati </p>
                        <p>24h di Sponsorizzazione</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="my_card">
                        <h4>Plus</h4>
                        <p>Compari in Homepage nella sezione dedicata ai nostri professionisti sponsorizzati </p>
                        <p>48h di Sponsorizzazione</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="my_card">
                        <h4>Ultra</h4>
                        <p>Compari in Homepage nella sezione dedicata ai nostri professionisti sponsorizzati </p>
                        <p>72h di Sponsorizzazione</p>
                    </div>
                </div>

            </div>


            <div class="form_payment">
                <h4 class="py-5 text-center">Scegli il piano ed entra a far parte dei nostri <span
                        class="backoffice_title">Professionisti
                        Sponsorizzati</span></h4>
                <form action="{{ route('admin.braintree') }}" method="POST" id="payment-form" class="mt-3">
                    @csrf
                    {{-- SELECT PER I PIANI --}}
                    <select name="plan" id="plan">
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endforeach
                        <input type="hidden" id="nonce" name="payment_method_nonce">
                    </select>
                    {{-- DIV PER L UI DI BRAINTREE --}}
                    <div id="dropin-container"></div>
                    {{-- <button type="submit" id="submit-button" class="button button--small button--green">Purchase</button> --}}
                    <input type="submit" class="btn dev_btn" />
                </form>
            </div>
        </div>
        </div>
    @else
        <div class="subscription_plans py-5 container">
            <h3 class="text-center">Sponsorizzazioni</h3>
            <h2 class="text-center py-5">A quanto pare hai già un abbonamento attivo</h2>
            <p class="fs-4 text-center">Il tuo abbonamento scade: <span
                    class="mx-1 backoffice_title">{{ $plans_end }}</span>
            </p>
        </div>
    @endif


    <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.js"></script>
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
    </script>
@endsection
